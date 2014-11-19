<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Principal extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('defaultdata_model');
		$this->load->model('admin_model');
		$this->load->model('usuario_model');
		$this->load->model('file_model');
		$this->load->library('googlemaps');
		$this -> load -> library('pagination');

		$CI = & get_instance();
        $CI->config->load("mercadopago", FALSE);
        $config = $CI->config->item('mercadopago');
        $this->load->library('Mercadopago', $config);
        $this->mercadopago->sandbox_mode(TRUE);

		/*if(is_logged()&&$this->session->userdata('tipoUsuario')==1){
                redirect('usuario/cuenta/activado');
                } 
                if(is_logged()&&$this->session->userdata('tipoUsuario')==2) {
                    redirect('negocio');
                }
                if(is_logged()&&$this->session->userdata('tipoUsuario')==3) {
                    redirect('asociacion');
                }
                if(is_logged()&&$this->session->userdata('tipoUsuario')==0) {
                    redirect('admin');
        		}*/

    }
	function index() {
		
		$data['SYS_metaTitle'] 			= '';
		$data['SYS_metaKeyWords'] 		= '';
		$data['SYS_metaDescription'] 	= '';  
		$this->session->set_userdata('banner', $this->defaultdata_model->getBanner());
		
		$visitas = $this->defaultdata_model->getVisitas();
		$contador = $visitas + 1;		
		$this->defaultdata_model->registroVisita($data = array('numeroVisitas' => $contador));
		$data['mapaSegundo'] = 'mapa_view';
		
		// mapa
		

		$config = array();
		$config['center'] = 'auto';
		$config['zoom'] = 'auto';
		$config['onboundschanged'] = 'if (!centreGot) {
				var mapCentre = map.getCenter();
				marker_0.setOptions({
				position: new google.maps.LatLng(mapCentre.lat(), mapCentre.lng()) 
		});
		} 
		centreGot = true;';
		$config['map_name'] = 'map';
		$config['map_div_id'] = 'map_canvas';
		$this->googlemaps->initialize($config);
   
		// set up the marker ready for positioning 
		// once we know the users location
		$marker = array();
		$marker['draggable'] = true;
		$marker['ondragend'] = 'updateDatabase(event.latLng.lat(), event.latLng.lng());';
		//$marker['ondragend'] = 'alert(\'You just dropped me at: \' + event.latLng.lat() + \', \' + event.latLng.lng());';
		$this->googlemaps->add_marker($marker);
		$data['map'] = $this->googlemaps->create_map();
		

		
		

		// mapa
		$data['estados'] 	= $this->defaultdata_model->getEstados();
		$data['paises'] 	= $this->defaultdata_model->getPaises();

        //paquetes
		$data['paquetes'] = $this->defaultdata_model->getPaquetes();
		//var_dump($data['paquetes']);

        //razas
        $data['razas'] = $this->defaultdata_model->getRazas();
        $data['banner'] = $this->defaultdata_model->getTable('banner');
        if(is_logged()){
        	$cupones = $this->usuario_model->getCuponesUsuario($this->session->userdata('idUsuario'));
        	$data['cupones'] = $cupones;
        } else {
        	$data['cupones'] = null;
        }
        $data['seccion'] = 1;
        $data['posicion'] = 1;
        $data['zona'] = 9;
        $data['carritoT'] = count ($this->admin_model->getCarrito($this->session->userdata('idUsuario')));
        $data['contenidos'] = $this->admin_model->getContenidos(8);
        $data['contenidosE'] = $this->admin_model->getContenidos(9);
        $data['contenidosD'] = $this->admin_model->getContenidos(10);
        $data['contenidosP'] = $this->defaultdata_model->getPerroPerdido();
		$data['fotocontenido'] = $this->admin_model->getFotoContenido();
        $data['carritoT'] = count ($this->admin_model->getCarrito($this->session->userdata('idUsuario')));

        //$data['preference'] = $preference;

        $this->load->view('index_view', $data);

	}

	

	function iniciado(){
		$this->load->view('sesion_correcta_view');
	}


	function mapa(){

		$config = array();
		$config['center'] = 'auto';
		$config['zoom'] = 'auto';
		$config['onboundschanged'] = 'if (!centreGot) {
				var mapCentre = map.getCenter();
				marker_0.setOptions({
				position: new google.maps.LatLng(mapCentre.lat(), mapCentre.lng()) 
		});
		} 
		centreGot = true;';
		$config['map_name'] = 'map';
		$config['map_div_id'] = 'map_canvas';
		$this->googlemaps->initialize($config);
   
		// set up the marker ready for positioning 
		// once we know the users location
		$marker = array();
		$marker['draggable'] = true;
		$marker['ondragend'] = 'updateDatabase(event.latLng.lat(), event.latLng.lng());';
		//$marker['ondragend'] = 'alert(\'You just dropped me at: \' + event.latLng.lat() + \', \' + event.latLng.lng());';
		$this->googlemaps->add_marker($marker);
		$data['map'] = $this->googlemaps->create_map();
		//var_dump($data['map']);

		
		
		// MAPA DOS
		$this->load->view('mapa_view', $data);

	}

	function mapa2(){

		$config = array();
		$config['center'] = 'auto';
		$config['zoom'] = 'auto';
		$config['onboundschanged'] = 'if (!centreGot) {
				var mapCentre = map.getCenter();
				marker_0.setOptions({
				position: new google.maps.LatLng(mapCentre.lat(), mapCentre.lng()) 
		});
		} 
		centreGot = true;';
		$config['map_name'] = 'map2';
		$config['map_div_id'] = 'map_canvas2';
		$this->googlemaps->initialize($config);
   
		// set up the marker ready for positioning 
		// once we know the users location
		$marker = array();
		$marker['draggable'] = true;
		$marker['ondragend'] = 'updateDatabase(event.latLng.lat(), event.latLng.lng());';
		//$marker['ondragend'] = 'alert(\'You just dropped me at: \' + event.latLng.lat() + \', \' + event.latLng.lng());';
		$this->googlemaps->add_marker($marker);
		$data['map2'] = $this->googlemaps->create_map();
		//var_dump($data['map']);



		$config = array();
		$config['center'] = 'auto';
		$config['zoom'] = 'auto';
		$config['onboundschanged'] = 'if (!centreGot) {
				var mapCentre = map.getCenter();
				marker_0.setOptions({
				position: new google.maps.LatLng(mapCentre.lat(), mapCentre.lng()) 
		});
		} 
		centreGot = true;';
		$config['map_name'] = 'map';
		$config['map_div_id'] = 'map_canvas';
		$this->googlemaps->initialize($config);
   
		// set up the marker ready for positioning 
		// once we know the users location
		$marker1 = array();
		$marker1['draggable'] = true;
		$marker1['ondragend'] = 'updateDatabase(event.latLng.lat(), event.latLng.lng());';
		//$marker['ondragend'] = 'alert(\'You just dropped me at: \' + event.latLng.lat() + \', \' + event.latLng.lng());';
		$this->googlemaps->add_marker($marker1);
		$data['map'] = $this->googlemaps->create_map();
		//var_dump($data['map']);



		$this->load->view('mapa2_view', $data);

	}


	function meh(){
		$this->load->model('email_model');
		$this->email_model->send_email(null, 'fraleiz17@gmail.com', 'Cambio de contraseña', 'grrrrrrrrrrr');
	}

	function uploadBanner(){
        $posicion = $this->input->post('posicion'); // '1 - superior 2 - centro - 3 abajo - 4 lateral'
        $seccionID = $this->input->post('seccionID');; // inici, venta, perros perdidos, etc.
        $zonaID = 1;
        var_dump($_POST);
        switch ($posicion) {
            case 1:
                 $alto = 93;
                 $ancho = 638;
                 $folder = 'banner_superior';
            break;

            case 2:
                 $alto = 400;
                 $ancho = 644;
                 $folder = '';
            break;

            case 3:
                 $alto = 93;
                 $ancho = 638;
                 $folder = 'banner_inferior';
            break;

            case 4:
                 $alto = 190;
                 $ancho = 215;
                 $folder = 'banner_lateral';
            break;
            
            
        }

        $file_data = array(
                'date'=>false,
                'random' => true,
                'user_id' => null,
                'width'=> $ancho,
                'height' => $alto
        );
        var_dump($file_data);

        $imagen = $this->file_model->uploadBanner($folder, $file_data, 'banner', true);
            if (is_array($imagen)) {                // $data['response'] = 'false';
                // $data['error'] = $imagen['error'];
                //$this -> session -> set_flashdata('custom_error', $imagen['error']);
                echo 'error';
                var_dump($imagen);
            }else{
                echo 'correcto';
                var_dump($imagen);
            }
    }
	
	function tienda(){
		$data['catalogo'] = $this->admin_model->getCatalogoProductos();
		$data['seccion'] = 16;
        $data['zona'] = 9;
        $data['banner'] = $this->defaultdata_model->getTable('banner');
		$data['carritoT'] = count ($this->admin_model->getCarrito($this->session->userdata('idUsuario')));
		$data['estados'] 	= $this->defaultdata_model->getEstados();
		$data['paises'] 	= $this->defaultdata_model->getPaises();
		$data['paquetes'] = $this->defaultdata_model->getPaquetes();
		$data['razas'] = $this->defaultdata_model->getRazas();
		if(is_logged()){
        	$cupones = $this->usuario_model->getCuponesUsuario($this->session->userdata('idUsuario'));
        	$data['cupones'] = $cupones;
        } else {
        	$data['cupones'] = null;
        }
		$this->load->view('tienda_view',$data);
		
		$config['base_url'] = base_url() . 'principal/tienda';
		$config['total_rows'] = count($this->admin_model->getCatalogoProductos());
		$config['uri_segment'] = 3;
		$config['per_page'] = 16;
		$config['num_links'] = 5;
		$config['first_link'] = 'Inicio';
		$config['last_link'] = 'Fin';
		$this -> pagination -> initialize($config);
		$data['seccion'] = 16;
	}


	function getDetalleProducto($productoID){
		$data['detalleAnuncio'] = $this->admin_model->getProducto($productoID);
       	$data['opciones'] = $this->admin_model->getSingleItems('productoID',$productoID,'productodetalle');
       	$data['fotos'] = $this->admin_model->getSingleItems('productoID',$productoID,'fotostienda');
       	$data['productoID'] = $productoID;
       	$this->load->view('producto_view',$data);

	}

	function miPerfil(){
		
		if($this->session->userdata('tipoUsuario')==1){
                			redirect('usuario/cuenta/myProfile');
                		} 
                		if ($this->session->userdata('tipoUsuario')==2) {
                		    redirect('negocio/principal/myProfile');
                		}
               			if ($this->session->userdata('tipoUsuario')==3) {
                		    redirect('asociaciones/principal/myProfile');
                		}
                		if ($this->session->userdata('tipoUsuario')==0) {
                		    redirect('admin');
						}

	}

	function recordatorio(){
		$anuncios = $this->db->defaultdata_model->recordatorio();
		$this->load->model('email_model');
		if ($anuncios != null){
		foreach ($anuncios as $anuncio) {
			

		$mensaje = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Notificacion-QuieroUnPerro.com</title>

</head>

<body>
<table width="647" align="center">
<tr>
<td width="231" height="129" colspan="2" valign="top">
<img src="http://quierounperro.com/quiero_un_perro/images/logo_mail.jpg"/>
</td>
</tr>
<tr>
<td>
<font style=" font-family:Verdana, Geneva, sans-serif; margin-top:100px; font-size:19px; font-weight:bold; color:#72A937;" >Hola: '.$anuncio->nombre.' </font>
<br/>
<br/>

<font style="font-family:Verdana, Geneva, sans-serif;"> Te informamos que tu anuncio "'.$anuncio->titulo.'" esta a punto de vencer. Recuerda que puedes consultar la vigencia de tus anuncios y renovarlos en caso de que lo deses, con sultando la sección de Administración de Anuncio en Mi Perfil.
<br/>

<br/> Cualquier duda escribenos a contacto@quierounperro.com
</font>
<p> </p>
</td>
</tr>

<tr bgcolor="#6A2C91" >
<td colspan="7" >
<font style=" font-family:Verdana, Geneva, sans-serif; font-size:14px; padding-left:15px; color:#FFFFFF;"> ¡Muchas Gracias! </font>
<br/>
<font style=" font-family:Verdana, Geneva, sans-serif; font-size:12px; padding-left:15px; color:#FFFFFF;"> Equipo QuieroUnPerro.com </font>
</td>
</tr>
</table>



</body>
</html>';
   
    
    $this->email_model->send_email('', $anuncio->correo, 'Tu publicación '.$anuncio->titulo.' en QUP está por caducar',$mensaje);
    $mensaje = '';
		}
	}
	

	}
	
}
