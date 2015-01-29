<?php
if (!defined('BASEPATH'))
    die();

class Evento extends CI_Controller
{
	
	 public function __construct()
    {
        parent::__construct();
         // checamos si existe una sesión activa           

        $this->load->model('defaultdata_model');
        $this->load->model('admin_model');
        $this->load->model('venta_model');
        $this->load->model('usuario_model');
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
       $data['contenidos'] = $this->admin_model->getContenidos(9);
       $data['fotoscontenido'] = $this->admin_model->getFotosContenido();
       $data['fotocontenido'] = $this->admin_model->getFotoContenido();
       $data['seccion'] = 9;
       $data['banner'] = $this->defaultdata_model->getTable('banner');
       $data['estados']     = $this->defaultdata_model->getEstados();
       $data['paquetes'] = $this->defaultdata_model->getPaquetes();
       $data['razas'] = $this->defaultdata_model->getRazas();
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
        }
        $data['carritoT'] = count ($this->admin_model->getCarrito($this->session->userdata('idUsuario')));
        $this->load->view('eventos_view',$data);
    }


    function detalle($ID){
      $data['SYS_metaTitle'] = '';
        $data['SYS_metaKeyWords'] = '';
        $data['SYS_metaDescription'] = '';
       $data['ID'] = $ID;
       $data['contenidos'] = $this->admin_model->getContenidos(9);
       $data['fotoscontenido'] = $this->admin_model->getFotosContenido();
       $data['fotocontenido'] = $this->admin_model->getFotoContenido();
       $data['seccion'] = 9;
       $data['banner'] = $this->defaultdata_model->getTable('banner');
       $data['estados']     = $this->defaultdata_model->getEstados();
       $data['paquetes'] = $this->defaultdata_model->getPaquetes();
       $data['razas'] = $this->defaultdata_model->getRazas();
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
$data['seccion'] = 12;
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
        }

        $data['carritoT'] = count ($this->admin_model->getCarrito($this->session->userdata('idUsuario')));
        $this->load->view('evento_detalle_view',$data);
    }

    function publicarEvento(){
        $nombre = $this->input->post('nombre');
        $correo = $this->input->post('correo');
        $comentarios = $this->input->post('comentarios');
        $this->load->model('email_model');
        $mensaje = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bienvenido-QuieroUnPerro.com</title>
<link rel="stylesheet" href="http://quierounperro.com/quiero_un_perro/css/general.css" type="text/css" media="screen" />
</head>

<body>
<table width="647" align="center">
<tr>
<td width="231" rowspan="2">
<img src="http://quierounperro.com/quiero_un_perro/images/logo_mail.jpg"/>
</td>
<td height="48" colspan="6" style="font-family: "titulos"; font-size:50px; color:#72A937; margin:0px; padding:0px; margin-bottom:-10px;">
QUP Contacto
</td>
</tr>
<tr>
<td colspan="7" >
<p>&nbsp;  </p>
<font style="margin-top:100px; font-size:19px; font-weight:bold; color:#72A937;" >Hola!! </font>
</br>
</br>

<font> El usuario '.$nombre.' dejo el siguiente mensaje:</font>
</br>
</br>
<font>Correo: '.$correo.'</font>
<br/>
</br>
<font>Comentarios: '.$comentarios.'</font>
<br/>
<p> </p>
</td>
</tr>

<tr bgcolor="#6A2C91" >
<td colspan="7" >
<font style=" font-size:14px; padding-left:15px; color:#FFFFFF;">Gracias por su atención </font>
<br/>
<font style=" font-size:12px; padding-left:15px; color:#FFFFFF;"> Equipo QUP </font>
</td>
</tr>
</table>



</body>
</html>';
   
    
    if($this->email_model->send_email('', 'marthahdez2@gmail.com', 'Se ha recibido un correo desde Eventos QUP',$mensaje)){
        $data['response'] = true;
    } else {
        $data['response'] = false;
    }
       echo json_encode($data);
    
    }


}
 ?>