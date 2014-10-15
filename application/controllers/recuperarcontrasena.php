<?php
if(!defined('BASEPATH'))
	die();

class Recuperarcontrasena extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('email_model');
		$this->load->model('usuario_model');
		$this->load->model('defaultdata_model');
	}
	
	function index(){
		$data['SYS_metaTitle'] 			= ' ';
		$data['SYS_metaKeyWords'] 		= '';
		$data['SYS_metaDescription'] 	= '';
		$this->load->view('', $data);
	}
	
	function sendLink(){
		$usuario = $this->input->get('correoR');

		$data = array();
		if($this->usuario_model->is_there_emailUsuario($usuario)){
			$this->usuario_model->insertNewConfirmationCode($usuario, $this->usuario_model->getNewConfirmationCode($usuario));
			$CC = $this->usuario_model->getMyConfirmationCode($usuario);
			//var_dump($CC,$usuario);
			$mensaje = "
				Hola ".$CC->nombre.", ha solicitado un cambio de contraseña. <br/>Para efectuar el cambio, por favor, ingrese al enlace más abajo mostrado y cambie su contraseña.<br/>
				Este enlace tiene una validez de <strong>sólo 24 horas</strong>, después de esto, tendrá que solicitar otro cambio en caso de que no lo haya efectuado.
				<br>
				".base_url()."recuperarcontrasena/doChange/".$CC->codigoConfirmacion.time()."
				<br>
				<br/>En caso de que usted no haya solicitado este cambio, simplemente ignore este correo y su cuenta permancerá segura.
			";
			$this->email_model->send_email(null, $CC->correo, 'Cambio de contraseña', $mensaje);
			$data['email'] = $CC->correo;
			$data['response'] = true;
			$data['cambioContrasena'] = true;
            //$data['registro'] = false;

            } else {
               $data['response'] = false;
               $data['cambioContrasena'] = false;
            }
		echo json_encode($data);
	}
	
	function doChange($code){
		$confirmationCode = substr($code,0,25);
		$lenCodeTime = strlen(time().'');
		$codeTime = substr($code, 25, $lenCodeTime);
		$idUsuario = substr($code,(25+$lenCodeTime));
		$codeAge = time() - $codeTime;
		if($codeAge>86400){
			$data['response'] = 'expired';
		}
		elseif($this->usuario_model->is_there_activation_code($confirmationCode) == null){
			$data['response'] = 'noCode';
		}
		else{
			$data['response'] = 'ok';
			$data['gerr'] = $this->resetPassword($confirmationCode);
		}
		
	}

	function resetPassword($activationCode) {
		switch($this->usuario_model->resetPassword($activationCode)) {
			case 1 :
				if($this->session->userdata('tipoUsuario')==1){
							$this->session->set_userdata('recuperarusuario', true);
                			redirect('usuario/cuenta/myProfile');
                		} 
                		if ($this->session->userdata('tipoUsuario')==2) {
                			$this->session->set_userdata('recuperarusuario', true);
                		    redirect('negocio/principal/myProfile');
                		}
               			if ($this->session->userdata('tipoUsuario')==3) {
               				$this->session->set_userdata('recuperarusuario', true);
                		    redirect('asociaciones/principal/myProfile');
                		}
				break;
			
			case -1 :
				redirect('principal');

				break;
		}
	}

	function changePassword(){
		$this->form_validation->set_rules('contrasenaUsuario', 'Nueva contraseña', 'trim|required|xss_clean');
		$this->form_validation->set_message('required', 'El campo "%s" es requerido');
		$this->form_validation->set_message('xss_clean', 'El campo "%s" contiene un posible ataque XSS');
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
		$data = array();			
		// Ejecuto la validacion de campos de lado del servidor
		if (!$this->form_validation->run()) {
			$data['response'] = 'fail';
		} else {
			$code = $this->usuario_model->is_there_activation_code($this->input->post('code'));
			if($code!=null){
				$usr = $code->row();
				$this->usuario_model->insertNewConfirmationCode($usr->emailUsuario, $this->usuario_model->getNewConfirmationCode($usr->emailUsuario));
				$this->usuario_model->passRecover($this->input->post('contrasenaUsuario'), $this->input->post('idUsuario'));
				$data['response'] = 'true';
			}
			else{
				$data['response'] = 'fail';
			}
			if ($this->usuario_model->passRecover($this->input->post('contrasenaUsuario'), $this->input->post('idUsuario'))){
				$data['response'] = 'true';
				$data['html'] = '<form name="redirect">
										Tu contrase&ntilde;a ha sido actualizada exitosamente, ser&aacute;s redirigido al login en <label id="Segundos">  </label> segundos.
										<input name="redirect2" size="3" type="hidden" />
									</form>
										   
									<script language="javascript">
										//URL A LA QUE DIRIGIR
										var targetURL="' . base_url() . 'login"
										//SEGUNDOS A CONTAR
										var cuentaAtras=5
										var segundoActual = document.redirect.redirect2.value=cuentaAtras+1
										function contarParaRedireccionar(){
										if (segundoActual!=1){
										segundoActual-=1
										var textoSegundos = document.getElementById("Segundos");
										textoSegundos.innerHTML =segundoActual
										}
										else{
										window.location=targetURL
										return
										}
										setTimeout("contarParaRedireccionar()",1000)
										}
										contarParaRedireccionar()
										</script>';	
			}
		}
		echo json_encode($data);
	}
		
}
?>