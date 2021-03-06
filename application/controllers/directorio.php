<?php

if (!defined('BASEPATH')) {
    die();
}

class Directorio extends CI_Controller {

    static $seccion = 4;

    public function __construct() {
        parent::__construct();

        $this->load->model('defaultdata_model');
        $this->load->model('admin_model');
        $this->load->model('usuario_model');
        $this->load->model('venta_model');
        $this->load->model('email_model');
        $this->load->helper(array('form', 'url'));
        $this->load->library('googlemaps');
        $this->load->library("UUID", true);
        $this->load->library('cart');
        $this->load->helper('date');

        $CI = &get_instance();
        $CI->config->load("mercadopago", TRUE);



        $config = $CI->config->item('mercadopago');
        //$this->load->library('Mercadopago', $config);
        //$this->mercadopago->sandbox_mode(FALSE);

        $this->load->library('email');

        if (!is_authorized(array(1, 2, 3), 5, $this->session->userdata('nivel'), $this->session->userdata('rol'))) {
            $this->session->set_flashdata('error', 'userNotAutorized');
            redirect('principal');
        }
    }

    /**
     * Se crea la tabla de giros de empresa.
     */
    public function index() {
         $data['SYS_metaTitle'] = '';
        $data['SYS_metaKeyWords'] = '';
        $data['SYS_metaDescription'] = '';
        $data['estados'] = $this->defaultdata_model->getEstados();
        $data['paises'] = $this->defaultdata_model->getPaises();
        $data['paquetes'] = $this->defaultdata_model->getPaquetes();
        $data['razas'] = $this->defaultdata_model->getRazas();
        $data['giros'] = $this->defaultdata_model->getGiros();  
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
$data['banner'] = $this->defaultdata_model->getBannerS(4);
$data['texto'] = $this->defaultdata_model->getTexto(4);
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
            $data['user'] = $this->usuario_model->myInfo($this->session->userdata('idUsuario'));
        } else {
            $data['cupones'] = null;
            $data['user'] = null;
        }
        //var_dump($data['user']);
        $data['directorios'] = $this->usuario_model->getDirectorios(4);
        
        $data['carritoT'] = count ($this->admin_model->getCarrito($this->session->userdata('idUsuario')));
        //var_dump($data['directorios']);
        if($this->session->userdata('tipoUsuario') == 2 || $this->session->userdata('tipoUsuario') == 1 || $this->session->userdata('tipoUsuario') == false){
            //$data['directorios'] = $this->usuario_model->getDirectorios(4);
            $data['planes'] = $this->defaultdata_model->getPaquetesCupon(5);
            $data['seccion'] = 4;
        } else{
        //$data['directorios'] = $this->usuario_model->getDirectorios(11);
        $data['planes'] = $this->defaultdata_model->getPaquetesCupon(4);
        $data['seccion'] = 4;
        }

        $data['girosN'] = $this->usuario_model->getGirosUsuario($this->session->userdata('idUsuarioDetalle'));

        $this->load->view('directorio_view', $data);
    }

    public function lista() {

        $giro = $this->input->post('giro') === '' ? NULL : intval($this->input->post('giro'));
        $estado = $this->input->post('estado') === '' ? NULL : intval($this->input->post('estado'));
        $palabra_clave = $this->input->post('palabra_clave') === '' ? NULL : $this->input->post('palabra_clave');

        echo json_encode($this->usuario_model->getDirectorios(4, $giro, $estado, $palabra_clave));
    }

    public function detalles($id) {

        $detalles = $this->usuario_model->getDirectorios(4, null, null, null, intval($id));
        $data['detalles'] = $detalles;
        $idUsuarioDetalle = $this->usuario_model->getIDDetalle($detalles->idUsuario);
        $data['giros'] = $this->usuario_model->getGirosUsuario($idUsuarioDetalle);
        //var_dump($data['giros'],$idUsuarioDetalle);
        if($this->session->userdata('tipoUsuario') == 3){
             $data['seccion'] = 4;
        } else {
            $data['seccion'] = 4;
        }
        
        //var_dump($data['detalles']);
        $this->load->view('d_directorio_view', $data);
    }

    public function contactar($id) {
        $directorio = $this->usuario_model->getDirectorios(4, null, null, null, intval($id));

        //$directorio = $this->venta_model->getPublicaciones(null, null, null, null, null, $this->input->post('pub'),$this->input->post('seccion'));
        //var_dump($directorio);
        //var_dump($directorio);
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
<img src="http://quierounperro.com/psk/images/logo_mail.jpg"/>
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
<font> El usuario ' . $this->session->userdata('nombre') . ' ' . $this->session->userdata('apellido') . ' est&aacute; interesado en el siguiente anuncio:</font>
<font style="margin-top:100px; font-size:19px; font-weight:bold; color:#72A937;" >' . ($directorio->titulo).'</font>
        <br/><br/>        
        <font color="#000066"><strong> Correo Contacto:</strong> ' . $this->input->post('email_contacto') . '</font>
        <br/><br/> 
        <font color="#000066"><strong> Asunto:</strong> ' . $this->input->post('asunto_contacto') . '</font>
        <br/><br/>
        <font color="#000066"><strong>Mensaje: </strong> ' . $this->input->post('comentario_contacto') . '</font>
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
        
        if(!$this->email_model->send_email('', $directorio->correo, 'Contacto QUP', $msj)){
            echo "<div class='alert alert-warning'>No se ha logrado envíar el correo al dueño de este directorio. Vuelva a intentarlo o contacte al administrador del sitio.</div>";
        } else {
            echo '<div class="alert alert-success">Se ha enviado correctamente el correo electrónico.</div>';
        }

        /*$config = array(
            'mailtype' => 'html',
            'priority' => 2,
            'useragent' => 'qup',
            'wrapchars' => '300',
            'wordwrap' => true,
            'protocol' => 'sendmail',
        );

        $this->email->initialize($config);

        $this->email->from($this->session->userdata('correo'), $this->session->userdata('nombre') . ' ' . $this->session->userdata('apellido'));
        $this->email->to($directorio->correo);

        $this->email->subject($this->input->post('asunto_contacto'));

        $msj = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
                        <img src="http://quierounperro.com/psk/images/logo_mail.jpg"/>
                    </td>
                    <td height="48" colspan="6" style="font-family: \'titulos\'; font-size:50px; color:#72A937; margin:0px; padding:0px; margin-bottom:-10px;">
                        QUP Contacto
                    </td>
                </tr>
                <tr>
                    <td colspan="7" >
                        <p>&nbsp;  </p>
                        <font style="margin-top:100px; font-size:19px; font-weight:bold; color:#72A937;" >Hola: ' . $directorio->razonSocial . '!! </font>
                    </br>
                </br>

                <font> El usuario ' . $this->session->userdata('nombre') . ' ' . $this->session->userdata('apellido') . ' quiere contactase contigo...</font>
            </br>
        </br>

        <font color="#000066"><strong> Asunto: ' . $this->input->post('asunto_contacto') . '</strong></font>
        <font color="#000066"><strong>Mensaje: </strong><br/>' . $this->input->post('comentario_contacto') . '</font>
        <br/>
        <p> </p>
    </td>
</tr>

<tr bgcolor="#6A2C91" >
    <td colspan="7" >
        <font style=" font-size:14px; padding-left:15px; color:#FFFFFF;">Gracias por tu preferencia </font>
        <br/>
        <font style=" font-size:12px; padding-left:15px; color:#FFFFFF;"> Equipo QUP </font>
    </td>
</tr>
</table>
</body>
</html>';

        $this->email->message($msj);

        if (!$this->email->send()) {
            echo "<div class='alert alert-warning'>No se ha logrado envíar el correo al dueño de este directorio. Vuelva a intentarlo o contacte al administrador del sitio.</div>";
        } else {
            echo '<div class="alert alert-success">Se ha enviado correctamente el correo electrónico.</div>';
        }*/
    }

    public function file() {
        $this->load->view('partial/file_upload', array('error' => ' '));
    }

    public function upload_file() {
        $config['upload_path'] = 'images/temp/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '999999';
        $config['max_width'] = '99999';
        $config['max_height'] = '99999';
        $config['file_name'] = UUID::v4();

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file_form')) {
            $error = array('error' => $this->upload->display_errors());

            echo json_encode($error);
        } else {
            $upload_data = $this->upload->data();
            $values['orig_name'] = 'images/temp/' . $upload_data['orig_name'];
            $values['url_logo'] = base_url() . 'images/temp/' . $upload_data['orig_name'];
            $values['file_type'] = $upload_data['file_type'];

            echo json_encode($values);
        }
    }

    public function nuevo() {
      $count_giros = count($this->defaultdata_model->getGiros());
        $giro_form = array();
        for ($i = 1; $i <= $count_giros; $i++) {
            $giro_form[$i] = $this->input->post('giro_' . $i . '_form');

            if ($giro_form[$i] == false) {
                unset($giro_form[$i]);
            } else {
               $this->defaultdata_model->deleteItem('idUsuarioDetalle',$this->session->userdata('idUsuarioDetalle'), 'giroempresa');   
               $g = array('idUsuarioDetalle' => $this->session->userdata('idUsuarioDetalle'),
                         'giroID' => $giro_form[$i] );
               $giro_form[$i];
               $this->defaultdata_model->insertItem('giroempresa', $g);
            }
        }


        $plan_form = $this->input->post('plan_form');

        $detalles_plan = $this->defaultdata_model->getPaquetesCupon(null, $plan_form);

        $myinfo = $this->usuario_model->myInfo($this->session->userdata('idUsuario'));

        $nombre_negocio = $this->session->userdata('nombre');
        $apellido_negocio = $this->session->userdata('apellido');
        $correo_negocio = $this->session->userdata('correo');
        $telefono_negocio = $this->input->post('telefono_negocio');
        $telefono_ver = $this->input->post('muestra_telefono_negocio');

        $nombre_negocio_form = $this->input->post('nombre_negocio_form');
        $horarios_negocio = $this->input->post('horarios_negocio');

        $estado_negocio = $this->input->post('estado_negocio');
        $ciudad_negocio = $this->input->post('ciudad_negocio');
        $colonia_negocio = $this->input->post('colonia_negocio');

        $calle_negocio = $this->input->post('calle_negocio');
        $numero_negocio = $this->input->post('numero_negocio');
        $vencimiento_negocio = $this->input->post('vencimiento_negocio');

        $cp_negocio = $this->input->post('cp_negocio');
        $email_negocio = $this->input->post('email_negocio');
        $pagina_web_negocio = $this->input->post('pagina_web_negocio');

        $descripcion_negocio = $this->input->post('descripcion_negocio');

        $latitud_negocio = $this->input->post('latitud_negocio');
        $longitud_negocio = $this->input->post('longitud_negocio');

        if($estado_negocio != '' && $estado_negocio != null){
        $zona_geo = $this->defaultdata_model->get_zona_geografica($estado_negocio);
        } else {
            $zona_geo = $this->defaultdata_model->get_zona_geografica(22);
        }

        $name_logo_form = $this->input->post('name_logo_form');


        //Se mueve la imagen de tmp a negocio_logo
        $name_file = explode('/', $name_logo_form);
        if (count($name_file) > 1) {

            if (!file_exists('./images/negocio_logo/' . $name_file[2])) {
                rename('./' . $name_logo_form, './images/negocio_logo/' . $name_file[2]);
            }
            $logo_form = 'images/negocio_logo/' . $name_file[2];
        } else {
            $logo_form = '';
        }


        $this->db->trans_start();

        $data['usuario'] = array();
        $data['usuariodetalle'] = array();
        $data['usuariodato'] = array();
        $data['ubicacionusuario'] = array();


        $data['usuario'] = array(
            'apellido' => $apellido_negocio,
            'correo' => $correo_negocio,
            'nombre' => $nombre_negocio,
            'telefono' => $telefono_negocio,
            //'tipoUsuario' => 3
        );

        $data['usuariodetalle'] = array(
            'calle' => $calle_negocio,
            'colonia' => $colonia_negocio,
            'correo' => $email_negocio,
            'cp' => $cp_negocio,
            'descripcion' => $descripcion_negocio,
            'giro' => NULL,
            'idEstado' => $estado_negocio,
            'logo' => $logo_form,
            'nombreContacto' => "$nombre_negocio $apellido_negocio",
            'nombreNegocio' => $nombre_negocio_form,
            'numero' => $numero_negocio,
            'horario' => $horarios_negocio,
            'paginaWeb' => $pagina_web_negocio,
            'telefono' => $telefono_negocio,
                //'tipoUsuario' => 3
        );

        $data['usuariodato'] = array(
            'calle' => $calle_negocio,
            'cp' => $cp_negocio,
            'estadoID' => $estado_negocio,
            'idPais' => 146,
            'municipio' => $ciudad_negocio,
            'noExterior' => $numero_negocio
        );


        $data['ubicacionusuario'] = array(
            'estadoID' => $estado_negocio,
            'latitud' => $latitud_negocio,
            'longitud' => $longitud_negocio,
            //'tipoUsuario' => 3,
            'zonageograficaID' => $zona_geo->zonageograficaID
        );

        $this->usuario_model->update_values('usuario', $data['usuario'], array('idUsuario' => $myinfo->idUsuario));
        $this->usuario_model->update_values('usuariodetalle', $data['usuariodetalle'], array(
            'idUsuario' => $myinfo->idUsuario));
        $this->usuario_model->update_values('usuariodato', $data['usuariodato'], array(
            'idUsuario' => $myinfo->idUsuario));
        $this->usuario_model->update_values('ubicacionusuario', $data['ubicacionusuario'], array(
            'idUsuarioDato' => $myinfo->idUsuarioDato));

        //reset
        $data = array();
        
        $obj_date = new DateTime(date('Y-m-d H:i:s'));
        $obj_date_end = new DateTime($obj_date->format('Y-m-d H:i:s'));
        $obj_date_end->add(new DateInterval('P' . $detalles_plan->vigencia . 'D'));
       

        $data['serviciocontratado'][] = array(
            'cantFotos' => $detalles_plan->cantFotos,
            'caracteres' => $detalles_plan->caracteres,
            'cupones' => $detalles_plan->cupones,
            'detalleID' => $detalles_plan->detalleID,
            'idUsuario' => $myinfo->idUsuario,
            'paqueteID' => $detalles_plan->paqueteID,
            'precio' => $detalles_plan->precio,
            'videos' => $detalles_plan->videos,
            'vigencia' => $detalles_plan->vigencia
        );

        $this->usuario_model->insert_values($data);

        $key_servicio = $this->db->insert_id();


        if( $detalles_plan->cupones != 0){
        $data = array();

        $data['cuponadquirido'][] = array(
            'cuponDetalleID' => $detalles_plan->cuponDetalleID,
            'cuponID' => $detalles_plan->cuponID,
            'descripcion' => $detalles_plan->descripcion,
            'detalleID' => $detalles_plan->detalleID,
            'paqueteID' => $detalles_plan->paqueteID,
            'servicioID' => $key_servicio,
            'tipoCupon' => $detalles_plan->tipoCupon,
            'usado' => 1,
            'valor' => $detalles_plan->valor,
            'vigencia' => $obj_date_end->format('Y-m-d'),
            'vigente' => 1
        );

        $this->usuario_model->insert_values($data);
        $key_cupon_ad = $this->db->insert_id();
        } else {
            $key_cupon_ad = '';
        }
        

        //reset
        $data = array();

        

        if($this->session->userdata('tipoUsuario') == 3){
             $data['publicaciones'][] = array(
            'seccion' => 11,
            'titulo' => 'publicacion de directorio',
            'vigente' => 1,
            'fechaCreacion' => $obj_date->format('Y-m-d H:i:s'),
            'fechaVencimiento' => $obj_date_end->format('Y-m-d H:i:s'),
            'numeroVisitas' => 0,
            'estadoID' => $estado_negocio,
            'genero' => 0,
            'razaID' => 1,
            'precioVenta' => $detalles_plan->precio,
            'descripcion' => $descripcion_negocio,
            'muestraTelefono' => $telefono_ver,
            'aprobada' => 0,
            'servicioID' => $key_servicio,
            'detalleID' => $detalles_plan->detalleID,
            'paqueteID' => $detalles_plan->paqueteID
        );
        } else {
            $data['publicaciones'][] = array(
            'seccion' => 4,
            'titulo' => 'publicacion de directorio',
            'vigente' => 1,
            'fechaCreacion' => $obj_date->format('Y-m-d H:i:s'),
            'fechaVencimiento' => $obj_date_end->format('Y-m-d H:i:s'),
            'numeroVisitas' => 0,
            'estadoID' => $estado_negocio,
            'genero' => 0,
            'razaID' => 1,
            'precioVenta' => $detalles_plan->precio,
            'descripcion' => $descripcion_negocio,
            'muestraTelefono' => $telefono_ver,
            'aprobada' => 0,
            'servicioID' => $key_servicio,
            'detalleID' => $detalles_plan->detalleID,
            'paqueteID' => $detalles_plan->paqueteID
        );
        }

        $this->usuario_model->insert_values($data);

        $key_pub = $this->db->insert_id();

        $data = array();

        $data['fotospublicacion'][$i] = array(
            'detalleID' => $detalles_plan->detalleID,
            'paqueteID' => $detalles_plan->paqueteID,
            'publicacionID' => $key_pub,
            'servicioID' => $key_servicio,
            'foto' => $logo_form,
        );

        $this->usuario_model->insert_values($data);

        $precio_total = $detalles_plan->precio - ($detalles_plan->precio * ($detalles_plan->valor / 100));

        $data = array();
        $data['compra'][] = array(
            'descuento' => $detalles_plan->valor,
            'fecha' => date('Y-m-d H:i:s'),
            'idCuponAdquirido' => $key_cupon_ad,
            'subtotal' => $detalles_plan->precio,
            'total' => $precio_total,
            'usuarioID' => $myinfo->idUsuario,
            'pagado' => 0
        );

        $this->usuario_model->insert_values($data);

        $key_compra = $this->db->insert_id();

        $data = array();

        $data['compradetalle'] = array();
        $data['compradetalle'][] = array(
            'cantidad' => 1,
            'color' => null,
            'talla' => null,
            'compraID' => $key_compra,
            'nombre' => $detalles_plan->nombrePaquete,
            'precio' => $detalles_plan->precio,
            'productoID' => NULL
        );

        if($precio_total <= 00.00){
        $this->defaultdata_model->updateItem('compraID', $key_compra, $data = array('pagado' => 1), 'compra');
        $this->defaultdata_model->updateItem('servicioID', $key_servicio, $data = array('pagado' => 1), 'serviciocontratado');
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            echo 'rollback';
        } else {
            $this->db->trans_commit();
            //TODO hay que cambiar a sandbox_init_point
            echo '<div class="registro_normal"> <!-- Contenedor morado registro -->

                <div class="titulo_registro">GRACIAS</div>
                </br>
                <div class="imagen_confirmacion">
                    <img src="'.base_url().'images/palomita.png"/>
                </div>
                <div class="contenido_confirmacion">
                    <strong> Gracias por publicar en QUP </strong>
                    </br></br>
                    <div> Tu anuncio ha pasado a la sección de aprobación, pronto recibirás un correo con la confirmación de la publicación.</div>
                    <div id="confirm">
              </div>
        
                </div>
            </div>

            <div style="margin-right:120px;margin-top:10px;"><a href="'.$this -> agent -> referrer().'" style="text-decoration:none; float:right;">Cerrar Proceso</a></div>
                  ';
        }
          

        } else {

        $preference_data = array(
            "items" => array(
                array(
                    "title" => "Publicacion en directorio",
                    "quantity" => 1,
                    "currency_id" => "MXN",
                    "unit_price" => floatval($precio_total)
                )
            ),
            "payer" => array(
                'name' => $this->session->userdata('nombre'),
                'surname' => $this->session->userdata('apellido'),
                'email' => $this->session->userdata('correo'),
                'date_created' => date('Y-m-d')
            ),
            "back_urls" => array(
                "success" => base_url("directorio/procesar_pago/$key_compra/1/$key_servicio"),
                "pending" => base_url("directorio/procesar_pago/$key_compra/1/$key_servicio"),
                "failure" => base_url("directorio/procesar_pago/$key_compra/0/$key_servicio"),
            ),
            "external_reference" => "$key_compra"
        );

        //$preference = $this->mercadopago->create_preference($preference_data);
        require_once(APPPATH.'libraries/mercadopago.php');
        $mp = new MP ("4460844937988109", "4iEWzMutgMTEWYvCOUjbGUP7VPJ8pr6k");

        //$preference = $mp->get_preference($preference_data);
        $preference = $mp->create_preference ($preference_data);

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            echo 'rollback';
        } else {
            $this->db->trans_commit();
            //TODO hay que cambiar a sandbox_init_point
            echo '<iframe src="' .$preference['response']['sandbox_init_point']. '" name="MP-Checkout" width="840" height="450" frameborder="0"></iframe>';
        }
         }
    }

    public function procesar_pago($compraID, $estado, $servicioID) {
        $this->defaultdata_model->updateItem('compraID', $compraID, array('pagado' => $estado), 'compra');
        $this->defaultdata_model->updateItem('servicioID', $servicioID, array('pagado' => $estado), 'serviciocontratado');
        redirect('principal/miPerfil');
    }

    function meh(){
        $myinfo = $this->usuario_model->myInfo($this->session->userdata('idUsuario'));
        $zona_geo = $this->defaultdata_model->get_zona_geografica(22);
        $detalles_plan = $this->defaultdata_model->getPaquetesCupon(null, 2);
        var_dump($myinfo,$zona_geo,$detalles_plan);
    }

    function getGirosNegocio(){
        $giros = $this->usuario_model->getGirosUsuario($this->session->userdata('idUsuarioDetalle'));
        echo json_encode($giros);
    }


    function renovacion($id) {
         $data['SYS_metaTitle'] = '';
        $data['SYS_metaKeyWords'] = '';
        $data['SYS_metaDescription'] = '';
        $data['estados'] = $this->defaultdata_model->getEstados();
        $data['paises'] = $this->defaultdata_model->getPaises();
        $data['paquetes'] = $this->defaultdata_model->getPaquetes();
        $data['razas'] = $this->defaultdata_model->getRazas();
        $data['giros'] = $this->defaultdata_model->getGiros();  
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
$data['banner'] = $this->defaultdata_model->getBannerS(4);
$data['texto'] = $this->defaultdata_model->getTexto(4);
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
            $data['user'] = $this->usuario_model->myInfo($this->session->userdata('idUsuario'));
        } else {
            $data['cupones'] = null;
            $data['user'] = null;
        }
        //var_dump($data['user']);
        $data['directorios'] = $this->usuario_model->getDirectorios(4);
        
        $data['carritoT'] = count ($this->admin_model->getCarrito($this->session->userdata('idUsuario')));
        //var_dump($data['directorios']);
        if($this->session->userdata('tipoUsuario') == 2 || $this->session->userdata('tipoUsuario') == 1 || $this->session->userdata('tipoUsuario') == false){
            //$data['directorios'] = $this->usuario_model->getDirectorios(4);
            $data['planes'] = $this->defaultdata_model->getPaquetesCupon(5);
            $data['seccion'] = 4;
        } else{
        //$data['directorios'] = $this->usuario_model->getDirectorios(11);
        $data['planes'] = $this->defaultdata_model->getPaquetesCupon(4);
        $data['seccion'] = 4;
        }

        $data['girosN'] = $this->usuario_model->getGirosUsuario($this->session->userdata('idUsuarioDetalle'));

        $id_anuncio = $id;
        $data['publicacion'] = $this->venta_model->getPublicacionR($id_anuncio);
        //var_dump($data['publicacion']);
        $this->load->view('renovar_dir_view', $data);
    }


    public function renovarDir() {
      $count_giros = count($this->defaultdata_model->getGiros());
        $giro_form = array();
        for ($i = 1; $i <= $count_giros; $i++) {
            $giro_form[$i] = $this->input->post('giro_' . $i . '_form');

            if ($giro_form[$i] == false) {
                unset($giro_form[$i]);
            } else {
               $this->defaultdata_model->deleteItem('idUsuarioDetalle',$this->session->userdata('idUsuarioDetalle'), 'giroempresa');   
               $g = array('idUsuarioDetalle' => $this->session->userdata('idUsuarioDetalle'),
                         'giroID' => $giro_form[$i] );
               $giro_form[$i];
               $this->defaultdata_model->insertItem('giroempresa', $g);
            }
        }


        $plan_form = $this->input->post('plan_form');

        $detalles_plan = $this->venta_model->getPublicacionR($this->input->post('r_publicacionID'));

        $myinfo = $this->usuario_model->myInfo($this->session->userdata('idUsuario'));

        $nombre_negocio = $this->session->userdata('nombre');
        $apellido_negocio = $this->session->userdata('apellido');
        $correo_negocio = $this->session->userdata('correo');
        $telefono_negocio = $this->input->post('telefono_negocio');
        $telefono_ver = $this->input->post('muestra_telefono_negocio');

        $nombre_negocio_form = $this->input->post('nombre_negocio_form');
        $horarios_negocio = $this->input->post('horarios_negocio');

        $estado_negocio = $this->input->post('estado_negocio');
        $ciudad_negocio = $this->input->post('ciudad_negocio');
        $colonia_negocio = $this->input->post('colonia_negocio');

        $calle_negocio = $this->input->post('calle_negocio');
        $numero_negocio = $this->input->post('numero_negocio');
        $vencimiento_negocio = $this->input->post('vencimiento_negocio');

        $cp_negocio = $this->input->post('cp_negocio');
        $email_negocio = $this->input->post('email_negocio');
        $pagina_web_negocio = $this->input->post('pagina_web_negocio');

        $descripcion_negocio = $this->input->post('descripcion_negocio');

        $latitud_negocio = $this->input->post('latitud_negocio');
        $longitud_negocio = $this->input->post('longitud_negocio');

        if($estado_negocio != '' && $estado_negocio != null){
        $zona_geo = $this->defaultdata_model->get_zona_geografica($estado_negocio);
        } else {
            $zona_geo = $this->defaultdata_model->get_zona_geografica(22);
        }

        $name_logo_form = $this->input->post('name_logo_form');

        if($name_logo_form != '' && $name_logo_form != false){
        //Se mueve la imagen de tmp a negocio_logo
        $name_file = explode('/', $name_logo_form);
        if (count($name_file) > 1) {

            if (!file_exists('./images/negocio_logo/' . $name_file[2])) {
                rename('./' . $name_logo_form, './images/negocio_logo/' . $name_file[2]);
            }
            $logo_form = 'images/negocio_logo/' . $name_file[2];
        } else {
            $logo_form = '';
        }

        } else {
            $logo_form = '';
        }


        $this->db->trans_start();

        $data['usuario'] = array();
        $data['usuariodetalle'] = array();
        $data['usuariodato'] = array();
        $data['ubicacionusuario'] = array();


        $data['usuario'] = array(
            'apellido' => $apellido_negocio,
            'correo' => $correo_negocio,
            'nombre' => $nombre_negocio,
            'telefono' => $telefono_negocio,
            //'tipoUsuario' => 3
        );

        $data['usuariodetalle'] = array(
            'calle' => $calle_negocio,
            'colonia' => $colonia_negocio,
            'correo' => $email_negocio,
            'cp' => $cp_negocio,
            'descripcion' => $descripcion_negocio,
            'giro' => NULL,
            'idEstado' => $estado_negocio,
            'logo' => $logo_form,
            'nombreContacto' => "$nombre_negocio $apellido_negocio",
            'nombreNegocio' => $nombre_negocio_form,
            'numero' => $numero_negocio,
            'horario' => $horarios_negocio,
            'paginaWeb' => $pagina_web_negocio,
            'telefono' => $telefono_negocio,
                //'tipoUsuario' => 3
        );

        $data['usuariodato'] = array(
            'calle' => $calle_negocio,
            'cp' => $cp_negocio,
            'estadoID' => $estado_negocio,
            'idPais' => 146,
            'municipio' => $ciudad_negocio,
            'noExterior' => $numero_negocio
        );


        $data['ubicacionusuario'] = array(
            'estadoID' => $estado_negocio,
            'latitud' => $latitud_negocio,
            'longitud' => $longitud_negocio,
            //'tipoUsuario' => 3,
            'zonageograficaID' => $zona_geo->zonageograficaID
        );

        $this->usuario_model->update_values('usuario', $data['usuario'], array('idUsuario' => $myinfo->idUsuario));
        $this->usuario_model->update_values('usuariodetalle', $data['usuariodetalle'], array(
            'idUsuario' => $myinfo->idUsuario));
        $this->usuario_model->update_values('usuariodato', $data['usuariodato'], array(
            'idUsuario' => $myinfo->idUsuario));
        $this->usuario_model->update_values('ubicacionusuario', $data['ubicacionusuario'], array(
            'idUsuarioDato' => $myinfo->idUsuarioDato));

        //reset
        $data = array();
        
       
       

        $data['serviciocontratado'][] = array(
            'cantFotos' => $detalles_plan->cantFotos,
            'caracteres' => $detalles_plan->caracteres,
            'cupones' => $detalles_plan->cupones,
            'detalleID' => $detalles_plan->detalleID,
            'idUsuario' => $myinfo->idUsuario,
            'paqueteID' => $detalles_plan->paqueteID,
            'precio' => $detalles_plan->precio,
            'videos' => $detalles_plan->videos,
            'vigencia' => $detalles_plan->vigencia
        );

        //$this->usuario_model->insert_values($data);

        $key_servicio = $this->input->post('r_servicioID');


       /* if( $detalles_plan->cupones != 0){
        $data = array();

        $data['cuponadquirido'][] = array(
            'cuponDetalleID' => $detalles_plan->cuponDetalleID,
            'cuponID' => $detalles_plan->cuponID,
            'descripcion' => $detalles_plan->descripcion,
            'detalleID' => $detalles_plan->detalleID,
            'paqueteID' => $detalles_plan->paqueteID,
            'servicioID' => $key_servicio,
            'tipoCupon' => $detalles_plan->tipoCupon,
            'usado' => 1,
            'valor' => $detalles_plan->valor,
            'vigencia' => $obj_date_end->format('Y-m-d'),
            'vigente' => 1
        );

        $this->usuario_model->insert_values($data);
        $key_cupon_ad = $this->db->insert_id();
        } else {
            $key_cupon_ad = '';
        }*/
        

        //reset
        $data = array();

        

        if($this->session->userdata('tipoUsuario') == 3){
             $datapublicaciones = array(
            'seccion' => 11,
            'titulo' => 'publicacion de directorio',
            'vigente' => 1,
            'numeroVisitas' => 0,
            'estadoID' => $estado_negocio,
            'genero' => 0,
            'razaID' => 1,
            'precioVenta' => $detalles_plan->precio,
            'descripcion' => $descripcion_negocio,
            'muestraTelefono' => $telefono_ver,
            'aprobada' => 0,
            'servicioID' => $key_servicio,
            'detalleID' => $detalles_plan->detalleID,
            'paqueteID' => $detalles_plan->paqueteID
        );
        } else {
            $datapublicaciones = array(
            'seccion' => 4,
            'titulo' => 'publicacion de directorio',
            'vigente' => 1,
            'numeroVisitas' => 0,
            'estadoID' => $estado_negocio,
            'genero' => 0,
            'razaID' => 1,
            'precioVenta' => $detalles_plan->precio,
            'descripcion' => $descripcion_negocio,
            'muestraTelefono' => $telefono_ver,
            'aprobada' => 0,
            'servicioID' => $key_servicio,
            'detalleID' => $detalles_plan->detalleID,
            'paqueteID' => $detalles_plan->paqueteID
        );
        }

        $this->defaultdata_model->updateItem('publicacionID', $this->input->post('r_publicacionID'), $datapublicaciones, 'publicaciones');

        $key_pub =  $this->input->post('r_publicacionID');

        $data = array();

        $datafotospublicacion = array(
            'detalleID' => $detalles_plan->detalleID,
            'paqueteID' => $detalles_plan->paqueteID,
            'publicacionID' => $key_pub,
            'servicioID' => $key_servicio,
            'foto' => $logo_form,
        );

        $this->defaultdata_model->updateItem('publicacionID', $this->input->post('r_publicacionID'), $datafotospublicacion, 'fotospublicacion');
        $servicioID = $this->input->post('r_servicioID');
        $precio_total = 00.00;

       

        //$this->usuario_model->insert_values($data);

        //$key_compra = $this->db->insert_id();

       

         if($precio_total <= 00.00){
        //$this->defaultdata_model->updateItem('compraID', $compraID, $data = array('pagado' => 1), 'compra');
        $this->defaultdata_model->updateItem('servicioID', $servicioID, $data = array('pagado' => 1), 'serviciocontratado');
        $this->notificacionAdmin('Direectorio','Negocio',$this->input->post('r_publicacionID'));
           echo '<div class="registro_normal"> <!-- Contenedor morado registro -->

                <div class="titulo_registro">GRACIAS</div>
                </br>
                <div class="imagen_confirmacion">
                    <img src="'.base_url().'images/palomita.png"/>
                </div>
                <div class="contenido_confirmacion">
                    <strong> Gracias por publicar en QUP </strong>
                    </br></br>
                    <div> Tu anuncio ha pasado a la sección de aprobación, pronto recibirás un correo con la confirmación de la publicación.</div>
                    <div id="confirm">
              </div>
        
                </div>
            </div>

            <div style="margin-right:120px;margin-top:10px;"><a href="'.$this -> agent -> referrer().'" style="text-decoration:none; float:right;">Cerrar Proceso</a></div>

            
                  ';

        } else {
           $preference_data = array(
            "items" => array(
                array(
                    "title" => "Publicacion en Anuncios - Cliente ID: ".$this->session->userdata('idUsuario'),
                    "quantity" => 1,
                    "currency_id" => "MXN",
                    "unit_price" => floatval($precio_total)
                )
            ),
            "payer" => array(
                'name' => $this->session->userdata('nombre'),
                'surname' => $this->session->userdata('apellido'),
                'email' => $this->session->userdata('correo'),
                'date_created' => date('Y-m-d')
            ),
            "back_urls" => array(
                "success" => base_url().'venta/updateCompra/'.$compraID.'/1/'.$servicioID.'/'.$publicacionID.'/'.$this->input->post('titulo').'/'.$this->input->post('seccion'), 
                "pending" => base_url().'venta/updateCompra/'.$compraID.'/1/'.$servicioID.'/'.$publicacionID.'/'.$this->input->post('titulo').'/'.$this->input->post('seccion'),
                "failure" => base_url().'venta/updateCompra/'.$compraID.'/0/'.$servicioID.'/'.$publicacionID.'/'.$this->input->post('titulo').'/'.$this->input->post('seccion')
            )
        );

        //$preference = $this->mercadopago->create_preference($preference_data);
        require_once(APPPATH.'libraries/mercadopago.php');
        $mp = new MP ("4460844937988109", "4iEWzMutgMTEWYvCOUjbGUP7VPJ8pr6k");
        $preference = $mp->create_preference ($preference_data);
        
         if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            echo 'Vuelva a intentarlo.';
            } else {
            $this->db->trans_commit();
            //TODO hay que cambiar a sandbox_init_point
           echo '<iframe src="' . $preference['response']['sandbox_init_point'] . '" name="MP-Checkout" width="740" height="600" frameborder="0"></iframe>';
        }

         //echo json_encode($publicacionID);
        }
    }

    function notificacionAdmin($seccion, $titulo,$publicacionID){
        $datos = $this->admin_model->getDatosAnunciante($publicacionID);
       $mensaje = '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Notificacion-QuieroUnPerro.com</title>

</head>

<body>
<table width="647" align="center">
<tr>
<td width="231" height="129" colspan="2" valign="top">
<img src="http://quierounperro.com/psk/images/logo_mail.jpg"/>
</td>
</tr>
<!-- <tr>
<td align="center"><h4 style=" font-family:Verdana, Geneva, sans-serif; font-size:14px; padding-left:15px;">¡Bienvenido a QuieroUnPerro.com!</h4></td>
</tr> -->
<tr>
<td style="padding-left:15px;"> 
<font style=" font-family:Verdana, Geneva, sans-serif; margin-top:100px; font-size:13px; font-weight:bold; color:#6A2C91; " >Un nuevo anuncio ha sido publicado en QUP </font>
<br/>
<br/>

<font style="font-family:Verdana, Geneva, sans-serif; font-size:13px;">
El anuncio <strong>"'.$titulo.'"</strong> con fecha de publicaci&oacute;n '.date('Y-m-d').' en la secci&oacute;n '.$datos->seccionNombre.', ha sido adquirido y está esperando ser aprobado.<br/><br/>
<br/><br/>

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
$this->email_model->send_email('', 'admin@quierounperro.com', 'Se ha publicado un nuevo anuncio en QUP', $mensaje);

$mensaje2 = '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Notificacion-QuieroUnPerro.com</title>

</head>

<body>
<table width="647" align="center">
<tr>
<td width="231" height="129" colspan="2" valign="top">
<img src="http://quierounperro.com/psk/images/logo_mail.jpg"/>
</td>
</tr>
<!-- <tr>
<td align="center"><h4 style=" font-family:Verdana, Geneva, sans-serif; font-size:14px; padding-left:15px;">¡Bienvenido a QuieroUnPerro.com!</h4></td>
</tr> -->
<tr>
<td style="padding-left:15px;"> 
<font style=" font-family:Verdana, Geneva, sans-serif; margin-top:100px; font-size:13px; font-weight:bold; color:#6A2C91; " >Hola '.$this->session->userdata('nombre').'! </font>
<br/>
<br/>

<font style="font-family:Verdana, Geneva, sans-serif; font-size:13px;">
Tu anuncio <strong>"'.$titulo.'"</strong> con fecha de publicaci&oacute;n '.date('Y-m-d').' en la secci&oacute;n '.$datos->seccionNombre.', está esperando ser aprobado.<br/><br/>
<br/><br/>
Cualquier duda, escr&iacute;benos a contacto@quierounperro.com
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
$this->email_model->send_email('', $this->session->userdata('correo'), 'Has publicado un anuncio en QUP', $mensaje2);
return true;

    }

}
