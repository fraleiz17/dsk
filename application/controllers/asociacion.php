<?php

if (!defined('BASEPATH')) {
    die();
}

class Asociacion extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('defaultdata_model');
        $this->load->model('admin_model');
        $this->load->model('usuario_model');
        $this->load->library('googlemaps');
        $this->load->helper(array('form', 'url'));

        if (!is_authorized(array(1, 2, 3), 5, $this->session->userdata('nivel'), $this->session->userdata('rol'))) {
            $this->session->set_flashdata('error', 'userNotAutorized');
            redirect('principal');
        }
    }

    public function index() {
        $data['SYS_metaTitle'] = '';
        $data['SYS_metaKeyWords'] = '';
        $data['SYS_metaDescription'] = '';
        $data['estados'] = $this->defaultdata_model->getEstados();
        $data['paises'] = $this->defaultdata_model->getPaises();
        $data['paquetes'] = $this->defaultdata_model->getPaquetes();
        $data['razas'] = $this->defaultdata_model->getRazas();
        $data['giros'] = $this->defaultdata_model->getGiros();
        $data['seccion'] = 11;
        $data['directorios'] = $this->usuario_model->getDirectorios(11);
        
        $config = array();
        $config['center'] = '19.433463102009004,-99.13711169501954';
        $config['zoom'] = 'auto';
        $config['onboundschanged'] = 'if (!centreGot) {
            var mapCentre = map.getCenter();
            marker_0.setOptions({
                position: new google.maps.LatLng(mapCentre.lat(), mapCentre.lng()) 
                );
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
        $data['paises'] = $this->defaultdata_model->getPaises();





        if(is_logged()){
            $data['user'] = $this->usuario_model->myInfo($this->session->userdata('idUsuario'));
            $data['carritoT'] = count ($this->admin_model->getCarrito($this->session->userdata('idUsuario')));
        } else {
            $data['user'] = null;
            $data['carritoT'] = 0;
        }
        $this->load->view('asociacion_view', $data);
    }

    public function lista() {

        $giro = $this->input->post('giro') === '' ? NULL : intval($this->input->post('giro'));
        $estado = $this->input->post('estado') === '' ? NULL : intval($this->input->post('estado'));
        $palabra_clave = $this->input->post('palabra_clave') === '' ? NULL : $this->input->post('palabra_clave');

        echo json_encode($this->usuario_model->getDirectorios(3, NULL, $estado, $palabra_clave));
    }
    
    function mapa(){

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
        $config['center'] = '19.433463102009004,-99.13711169501954';
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
    public function detalles($id) {

        $data['detalles'] = $this->usuario_model->getDirectorios(11,null, null, null, intval($id));
        
        $data['giros'] = $this->usuario_model->getGirosUsuario(intval($id));

        $data['seccion'] = 11;
        $this->load->view('d_directorio_view', $data);
    }

}
