<?php
if (!defined('BASEPATH'))
    die();

class Curiosos extends CI_Controller
{
	static $seccion=3;
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
        
       $data['contenidos'] = $this->admin_model->getContenidos(10);
       $data['fotoscontenido'] = $this->admin_model->getFotosContenido();
       $data['fotocontenido'] = $this->admin_model->getFotoContenido();
       $data['seccion'] = 10;
       $data['banner'] = $this->defaultdata_model->getTable('banner');
       $data['estados']     = $this->defaultdata_model->getEstados();
       $data['paquetes'] = $this->defaultdata_model->getPaquetes();
       $data['razas'] = $this->defaultdata_model->getRazas();
       if(is_logged()){
            $cupones = $this->usuario_model->getCuponesUsuario($this->session->userdata('idUsuario'));
            $data['cupones'] = $cupones;
        }
        $data['carritoT'] = count ($this->admin_model->getCarrito($this->session->userdata('idUsuario')));
        $this->load->view('curiosos_view',$data);
    }

    function detalle($ID){
       $data['ID'] = $ID;
       $data['contenidos'] = $this->admin_model->getContenidos(10);
       $data['fotoscontenido'] = $this->admin_model->getFotosContenido();
       $data['fotocontenido'] = $this->admin_model->getFotoContenido();
       $data['seccion'] = 10;
       $data['banner'] = $this->defaultdata_model->getTable('banner');
       $data['estados']     = $this->defaultdata_model->getEstados();
       $data['paquetes'] = $this->defaultdata_model->getPaquetes();
       $data['razas'] = $this->defaultdata_model->getRazas();
       if(is_logged()){
            $cupones = $this->usuario_model->getCuponesUsuario($this->session->userdata('idUsuario'));
            $data['cupones'] = $cupones;
        }
        $data['carritoT'] = count ($this->admin_model->getCarrito($this->session->userdata('idUsuario')));
        $this->load->view('curiosos_detalle_view',$data);
    }
}
 ?>