<?php
if (!defined('BASEPATH'))
    die();

class Raza extends CI_Controller
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
        $data['contenidos'] = $this->admin_model->getContenidos(8);
        $data['fotoscontenido'] = $this->admin_model->getFotosContenido();
        $data['fotocontenido'] = $this->admin_model->getFotoContenido();
        $data['seccion'] = 8;
        $data['giros']       = $this->defaultdata_model->getGiros();
        $data['banner'] = $this->defaultdata_model->getTable('banner');
       $data['estados']     = $this->defaultdata_model->getEstados();
       $data['paquetes'] = $this->defaultdata_model->getPaquetes();
       $data['razas'] = $this->defaultdata_model->getRazas();

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
        } else {
            $data['cupones'] = null;
        }
        $data['carritoT'] = count ($this->admin_model->getCarrito($this->session->userdata('idUsuario')));
        $this->load->view('raza_view',$data);
    }
}
 ?>