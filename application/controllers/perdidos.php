<?php
if (!defined('BASEPATH'))
    die();

class Perdidos extends CI_Controller
{
	static $seccion=7;
	 public function __construct()
    {
        parent::__construct();
         // checamos si existe una sesión activa           

        $this->load->model('defaultdata_model');
        $this->load->model('admin_model');
        $this->load->model('venta_model');
        $this->load->model('usuario_model');
        $this->load->model('email_model');
        $this->load->helper(array('form', 'url'));
        $this->load->library('googlemaps');
        $this->load->library('cart');
        $this->load->helper('date');

        $CI = & get_instance();
        $CI->config->load("mercadopago", TRUE);
        $config = $CI->config->item('mercadopago');
        $this->load->library('Mercadopago', $config);
        $this->mercadopago->sandbox_mode(FALSE);
		$this->load->library('email');


        if (!is_authorized(array(1, 2, 3), 5, $this->session->userdata('nivel'), $this->session->userdata('rol'))) {
            $this->session->set_flashdata('error', 'userNotAutorized');
            redirect('principal');
        }

    }
	
	
    public function index()
    {
        $data['SYS_metaTitle'] = '';
        $data['SYS_metaKeyWords'] = '';
        $data['SYS_metaDescription'] = '';
        $data['estados']     = $this->defaultdata_model->getEstados();
        $data['paises']      = $this->defaultdata_model->getPaises();
        $data['paquetes']    = $this->defaultdata_model->getPaquetes();
        $data['razas']       = $this->defaultdata_model->getRazas();
        $data['giros']       = $this->defaultdata_model->getGiros();
        $data['publicaciones']       = $this->venta_model->getAnuncios(self::$seccion);
		$data['seccion']= self::$seccion;
$config = array();
$config['center'] = '19.433463102009004,-99.13711169501954';
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
$data['map'] = $this->googlemaps->create_map();


// set up the marker ready for positioning 
// once we know the users location
$marker = array();
$marker['draggable'] = true;
$marker['ondragend'] = 'updateDatabase(event.latLng.lat(), event.latLng.lng());';
//$marker['ondragend'] = 'alert(\'You just dropped me at: \' + event.latLng.lat() + \', \' + event.latLng.lng());';
$this->googlemaps->add_marker($marker);

// mapa


$data['mapaSegundo'] = 'mapa_view'; 
$data['banner'] = $this->defaultdata_model->getTable('banner');
$data['estados'] = $this->defaultdata_model->getEstados();
$data['paquetes'] = $this->defaultdata_model->getPaquetes();
$data['razas'] = $this->defaultdata_model->getRazas();
$data['zona'] = 9;
$data['carritoT'] = count ($this->admin_model->getCarrito($this->session->userdata('idUsuario')));
$data['carritoT'] = count ($this->admin_model->getCarrito($this->session->userdata('idUsuario')));
$data['paises'] = $this->defaultdata_model->getPaises();

         if(is_logged()){
         $cupones = $this->usuario_model->getCuponesUsuario($this->session->userdata('idUsuario'));
         $data['cupones'] = $cupones;
        } else {
            $data['cupones'] = null;
        }
       //var_dump($data['publicaciones']);
        $data['carritoT'] = count ($this->admin_model->getCarrito($this->session->userdata('idUsuario')));
        $this->load->view('perdidos_view', $data);
    }
    
    function lista() {

        $raza = $this->input->post('raza') === '' ? NULL : intval($this->input->post('raza'));
        $genero = $this->input->post('genero') === '' ? NULL : intval($this->input->post('genero'));
        $estado = $this->input->post('estado') === '' ? NULL : intval($this->input->post('estado'));
        $precio = $this->input->post('precio') === '' ? NULL : $this->input->post('precio');
        $palabra_clave = $this->input->post('palabra_clave') === '' ? NULL : $this->input->post('palabra_clave');
        $id_anuncio = $this->input->post('id_anuncio') === '' ? NULL : $this->input->post('id_anuncio');

        echo json_encode($this->venta_model->getPublicaciones($raza, $genero, $estado, $precio, $palabra_clave, $id_anuncio, self::$seccion));
    }

     function meh() {

        $v =$this->venta_model->getPublicaciones(null, null, null, null, null, 2, self::$seccion);
        $data = $v['data'];
        $c = $data[0]->paqueteID;
        var_dump($v,$data,$c);
    }

    function denunciar() {

        //contacto@quierounperro.com
        $directorio = $this->venta_model->getPublicaciones(null, null, null, null, null, $this->input->post('pub'), self::$seccion);
        $data = $directorio['data'];
            
        $msj = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Notificacion-QuieroUnPerro.com</title>

</head>

<body>
<table width="647" align="center">
<tr>
<td width="231" height="129" colspan="2" valign="top">
<img src="http://quierounperro.com/dsk/images/logo_mail.jpg"/>
</td>
</tr>
<!-- <tr>
<td align="center"><h4 style=" font-family:Verdana, Geneva, sans-serif; font-size:14px; padding-left:15px;">¡Bienvenido a QuieroUnPerro.com!</h4></td>
</tr> -->
<tr>
<td style="padding-left:15px;"> 
<font style=" font-family:Verdana, Geneva, sans-serif; margin-top:100px; font-size:13px; font-weight:bold; color:#6A2C91; " >Hola! </font>
<br/>
<br/>

<font style="font-family:Verdana, Geneva, sans-serif; font-size:13px;">
Te informamos que el anuncio <strong>"'.$data[0]->titulo.'"</strong>  en la secci&oacute;n <strong>"'.$data[0]->seccionNombre.'"</strong> ha sido reportado por uno(s) de nuestros usuarios por las siguientes razones.<br/><br/>
' . $this->input->post('comentarios_denuncia') . '<br/><br/>
<br/><br/>
Si tienes cualquier duda al respecto, por favor escr&iacute;benos a contacto@quierounperro.com
</font>
<p> </p>
</td>
</tr>

<tr>
<td colspan="7" >
<font style=" font-family:Verdana, Geneva, sans-serif; font-size:14px; padding-left:15px;"> ¡Muchas Gracias! </font>
<br/>
<font style=" font-family:Verdana, Geneva, sans-serif; font-size:12px; padding-left:15px;"> El Equipo de QuieroUnPerro.com </font>
<br/>
<font style=" font-family:Verdana, Geneva, sans-serif; font-size:10px; padding-left:15px;"> Todos los derechos reservados '.date('Y').' </font>
</td>
</tr>
</table>



</body>
</html>
 ';

       
        //$this->email->message($msj);
        if(!$this->email_model->send_email('', 'marthahdez2@gmail.com', 'Denuncia de anuncio', $msj)){
        
            echo "<div class='alert alert-warning'>No se ha logrado envíar el correo al dueño de este directorio. Vuelva a intentarlo o contacte al administrador del sitio.</div>";
        } else {
            echo '<div class="alert alert-success">Se ha enviado correctamente el correo electrónico.</div>';
        }

    }

    function contactar() {

        //contacto@quierounperro.com
        $directorio = $this->venta_model->getPublicaciones(null, null, null, null, null, 2, self::$seccion);

$msj = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Notificacion-QuieroUnPerro.com</title>

</head>

<body>
<table width="647" align="center">
<tr>
<td width="231" height="129" colspan="2" valign="top">
<img src="http://quierounperro.com/dsk/images/logo_mail.jpg"/>
</td>
</tr>
<!-- <tr>
<td align="center"><h4 style=" font-family:Verdana, Geneva, sans-serif; font-size:14px; padding-left:15px;">Contacto en QUP</h4></td>
</tr> -->
<tr>
<td style="padding-left:15px;"> 
<font style=" font-family:Verdana, Geneva, sans-serif; margin-top:100px; font-size:13px; font-weight:bold; color:#6A2C91; " >Hola! </font>
<br/>
<br/>

<font style="font-family:Verdana, Geneva, sans-serif; font-size:13px;">
<font> El usuario ' . $this->session->userdata('nombre') . ' ' . $this->session->userdata('apellido') . ' esta interesado en el siguiente anuncio:</font>
<font style="margin-top:100px; font-size:19px; font-weight:bold; color:#72A937;" >' . ($directorio['data'][0]->titulo).'</font>
                
            <br/><br/>
           <font > <strong> Creado por:</strong> '.$directorio['data'][0]->correo.'</font>
           <br/><br/>
           <font > <strong> Fecha de creacion: </strong>'.$directorio['data'][0]->fechaCreacion.'</font>
           <br/><br/>
           <font ><strong> Duracion:</strong> '.$directorio['data'][0]->vigencia.' ('.$directorio['data'][0]->fechaVencimiento.')</font
           <br/><br/>
           <font><strong> Descripcion:</strong> '.$directorio['data'][0]->descripcion.'</font>
        <br/><br/>
        <font color="#000066"><strong> Asunto:</strong> ' . $this->input->post('asunto_contacto') . '</font>
        <br/><br/>
        <font color="#000066"><strong>Mensaje: </strong><br/>' . $this->input->post('comentarios_contacto') . '</font>
        <br/><br/>
        <p> </p>
<br/><br/>
Si tienes cualquier duda al respecto, por favor escr&iacute;benos a contacto@quierounperro.com
</font>
<p> </p>
</td>
</tr>

<tr>
<td colspan="7" >
<font style=" font-family:Verdana, Geneva, sans-serif; font-size:14px; padding-left:15px;"> ¡Muchas Gracias! </font>
<br/>
<font style=" font-family:Verdana, Geneva, sans-serif; font-size:12px; padding-left:15px;"> El Equipo de QuieroUnPerro.com </font>
<br/>
<font style=" font-family:Verdana, Geneva, sans-serif; font-size:10px; padding-left:15px;"> Todos los derechos reservados '.date('Y').' </font>
</td>
</tr>
</table>



</body>
</html>
 ';
        
        if(!$this->email_model->send_email('', $directorio['data'][0]->correo, 'Contacto QUP', $msj)){
            echo "<div class='alert alert-warning'>No se ha logrado envíar el correo al dueño de este directorio. Vuelva a intentarlo o contacte al administrador del sitio.</div>";
        } else {
            echo '<div class="alert alert-success">Se ha enviado correctamente el correo electrónico.</div>';
        }

    }
}
 ?>