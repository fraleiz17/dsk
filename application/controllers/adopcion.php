<?php
if (!defined('BASEPATH'))
    die();

class Adopcion extends CI_Controller
{
	static $seccion=6;
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
        $data['estados']     = $this->defaultdata_model->getEstados();
        $data['paises']      = $this->defaultdata_model->getPaises();
        $data['paquetes']    = $this->defaultdata_model->getPaquetes();
        $data['razas']       = $this->defaultdata_model->getRazas();
        $data['giros']       = $this->defaultdata_model->getGiros();
        $data['publicaciones']       = $this->venta_model->getAnuncios(self::$seccion);
		$data['seccion']= self::$seccion;
       //var_dump($data['publicaciones']);
        $data['carritoT'] = count ($this->admin_model->getCarrito($this->session->userdata('idUsuario')));
        $this->load->view('adopcion_view', $data);
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
}
 ?>