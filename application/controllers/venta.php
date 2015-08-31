<?php

if (!defined('BASEPATH'))
    die();

class Venta extends CI_Controller {

    static $seccion = 2;

    public function __construct() {
        parent::__construct();
        // checamos si existe una sesión activa           

        $this->load->model('defaultdata_model');
        $this->load->model('admin_model');
        $this->load->model('email_model');
        $this->load->model('venta_model');
        $this->load->model('perfil_model');
        $this->load->model('usuario_model');
        $this->load->helper(array('form', 'url'));
        $this->load->library('googlemaps');
        $this->load->library('cart');
        $this->load->helper('date');
        $this->load->library("UUID", true);
        $this->load->library('email');

        $CI = & get_instance();
        $CI->config->load("mercadopago", TRUE);
        $config = $CI->config->item('mercadopago');
        //$this->load->library('Mercadopago', $config);
        //$this->mercadopago->sandbox_mode(FALSE);


        if (!is_authorized(array(1, 2, 3), 5, $this->session->userdata('nivel'), $this->session->userdata('rol'))) {
            $this->session->set_flashdata('error', 'userNotAutorized');
            redirect('principal');
        }
    }

    //is_authorized($nivelesReq, $idPermiso, $nivelUsuario, $rolUsuario)


    public function index() {
        $data['SYS_metaTitle'] = '';
        $data['SYS_metaKeyWords'] = '';
        $data['SYS_metaDescription'] = '';
        $data['estados'] = $this->defaultdata_model->getEstados();
        $data['paises'] = $this->defaultdata_model->getPaises();
        $data['paquetes'] = $this->defaultdata_model->getPaquetes();
        $data['razas'] = $this->defaultdata_model->getRazas();
        $data['giros'] = $this->defaultdata_model->getGiros();
        $data['publicaciones'] = $this->venta_model->getAnuncios(self::$seccion);
        $data['seccion'] = self::$seccion;
        $data['estados']  = $this->defaultdata_model->getEstados();
        $data['paquetes'] = $this->defaultdata_model->getPaquetes();
        //$data['razas'] = $this->defaultdata_model->getRazas();
        $data['carritoT'] = count ($this->admin_model->getCarrito($this->session->userdata('idUsuario')));
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
        $this->load->view('venta_view', $data);
		
		
		
    }

    function factura() {

        $data['response'] = "true";
        echo json_encode($data);
    }

    function pagos() {
        
    }

    function guardar_compra() {
        $this->db->trans_start();
        try {
            $usuario = $this->session->userdata('idUsuario');
            $carrito = $this->admin_model->getCarrito($usuario);
            $carritototal = $this->admin_model->getSingleItem('usuarioID', $usuario, 'carritototal');

            $compra = array();

            if ($carritototal instanceof stdClass) {
                $compra[0] = array(
                    'usuarioID' => $usuario,
                    'subtotal' => $carritototal->subtotal,
                    'idCuponAdquirido' => null,
                    'descuento' => $carritototal->descuento,
                    'total' => $carritototal->totalPrecio,
                    'fecha' => date('Y-m-d H:i:s'),
                );
            } else {
                foreach ($carritototal as $value) {
                    //Se asigna al indice cero por que solo debe ser un carrito de compra por usuario
                    $compra[0] = array(
                        'usuarioID' => $usuario,
                        'subtotal' => $value->subtotal,
                        'idCuponAdquirido' => null,
                        'descuento' => $value->descuento,
                        'total' => $value->totalPrecio,
                        'fecha' => date('Y-m-d H:i:s'),
                    );
                }
            }

            $compra_detalle = array();
            foreach ($carrito as $value) {
                $compra_detalle[] = array(
                    'compraID' => null,
                    'productoID' => $value->productoID,
                    'cantidad' => $value->cantidad,
                    'precio' => $value->precio,
                    'nombre' => $value->nombre,
                    'talla' => $value->talla,
                    'color' => $value->color,
                );
            }

            $this->usuario_model->addCompra($compra, $compra_detalle);

            $this->usuario_model->deleteCarrito($usuario);

            $this->usuario_model->save_cupones($this->session->userdata('cuponusuario'));

            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                $this->session->set_flashdata('info', "<div class='alert alert-warning'>No se ha logrado la compra. Vuelva a intentarlo o contacte al administrador del sitio.</div>");
            } else {
                $this->db->trans_commit();
                $this->session->set_flashdata('info', '<div class="alert alert-success">La compra se realizo correctamente.</div>');
            }
            //TODO Debe de redirigir a las compras
            redirect('principal/tienda');
        } catch (Exception $n) {
            $this->db->trans_rollback();
            $this->session->set_flashdata('info', "<div class='alert alert-warning'>No se ha logrado la compra. Vuelva a intentarlo o contacte al administrador del sitio.</div>");
        }
    }

    public function upload_file() {
        $config['upload_path'] = 'images/temp/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '999999';
        $config['max_width'] = '9999999';
        $config['max_height'] = '9999999';
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

    function anuncio() {
        $paqueteID = $this->input->post('paquete');
        $detallePaquete = $this->defaultdata_model->getPaquete($paqueteID);

        if (is_logged() == true && $this->session->userdata('paqueteGratis') == 1 && $paqueteID == 1):
            $precioPaqueteA = 0;
        else:
            $precioPaqueteA = $detallePaquete->precio;
        endif; 
        //SERVICIOS ADQUIRIDOS
        $data = array(
            'cantFotos' => $detallePaquete->cantFotos,
            'caracteres' => $detallePaquete->caracteres,
            'vigencia' => $detallePaquete->vigencia,
            'cupones' => $detallePaquete->cupones,
            'videos' => $detallePaquete->videos,
            'precio' => $precioPaqueteA,
            'detalleID' => $detallePaquete->detalleID,
            'paqueteID' => $detallePaquete->paqueteID,
            'idUsuario' => $this->session->userdata('idUsuario')
        );
        $servicioID = $this->defaultdata_model->insertItem('serviciocontratado', $data);

        $cupones = $this->defaultdata_model->getCuponesPaquete($paqueteID);
        $fecha = date('Y-m-d');
        $dias = 30;
        $fechaCierre = strtotime ( '+'.$dias.' day' , strtotime($fecha)) ;
        $fechaCierre = date ( 'Y-m-j' , $fechaCierre );

        if ($cupones != null) {
            foreach ($cupones as $cupon) {
                $dataCupon = array(
                    'descripcion' => $cupon->descripcion,
                    'valor' => $cupon->valor,
                    'tipoCupon' => $cupon->tipoCupon,
                    'vigente' => 1,
                    'vigencia' => $fechaCierre,
                    'usado' => 0,
                    'servicioID' => $servicioID,
                    'detalleID' => $detallePaquete->detalleID,
                    'paqueteID' => $paqueteID,
                    'cuponDetalleID' => $cupon->cuponDetalleID,
                    'cuponID' => $cupon->cuponID
                );
                $idCuponAdquirido = $this->defaultdata_model->insertItem('cuponadquirido', $dataCupon);
            }
        }



        //PUBLICACION      
        $fecha = date('Y-m-d');
        $dias = $this->input->post('vigencia_texto');
        $fechaCierre = strtotime('+' . $dias . ' day', strtotime($fecha));
        $fechaCierre = date('Y-m-j', $fechaCierre);
        $dataPublicacion = array(
            'seccion' => $this->input->post('seccion'),
            'titulo' => $this->input->post('titulo'),
            'vigente' => 1,
            'fechaCreacion' => date('Y-m-d'),
            'fechaVencimiento' => $fechaCierre,
            'numeroVisitas' => 0,
            'estadoID' => $this->input->post('estado'),
            'ciudad' => $this->input->post('ciudad'),
            'genero' => $this->input->post('genero'),
            'razaID' => $this->input->post('raza'),
            'precioVenta' => $this->input->post('precio'),
            'descripcion' => $this->input->post('descripcion'),
            'muestraTelefono' => $this->input->post('mostrar_telefono'),
            'aprobada' => 0,
            'servicioID' => $servicioID,
            'detalleID' => $detallePaquete->detalleID,
            'paqueteID' => $paqueteID
        );

        $publicacionID = $this->defaultdata_model->insertItem('publicaciones', $dataPublicacion);
        //Paquete gratis?
        if($paqueteID == 1 && $precioPaqueteA == 0){
            $this->defaultdata_model->updateItem('idUsuario', $this->session->userdata('idUsuario'), $data = array('paqueteGratis' => 0), 'usuario');
            $this->session->unset_userdata('paqueteGratis');
            $this->session->set_userdata('paqueteGratis',0);
        }
        //Paquete Gratis

        
        //VIDEOS PUBLICACION

        
          if(isset($_POST['url_video'])){
             $video = $this->input->post('url_video');
                if( $video != null){
                    for($i=0;$i<=count($video);$i++){               
                        if($video[$i] != '0'){
                        $arrVideo= array(
                            'paqueteID' => $paqueteID,
                            'publicacionID'   => $publicacionID,
                            'servicioID' => $servicioID,
                            'detalleID' =>  $detallePaquete->detalleID,
                            'link' =>$video[$i]
                        );
                            $video = $this->admin_model->insertItem('videos',$arrVideo);
                            //var_dump($e);
                        }
                        $arrVideo = null;
                    }
                }
            }

        //IMAGENES
         $name_logo_form = $this->input->post('name_logo_form');
         $p_fotos = count($name_logo_form);
         $paq_fotos = $detallePaquete->cantFotos;
         if($p_fotos < $paq_fotos){
            $c_fotos = $p_fotos-1;
         } else {
            $c_fotos = $detallePaquete->cantFotos -1;
         }
                if( $name_logo_form != null){
                    for($i=0;$i<=$c_fotos;$i++){     
                        //Se mueve la imagen de tmp a negocio_logo
                        if($name_logo_form[$i] != null){
                        $name_file = explode('/', $name_logo_form[$i]);                        
                        if (!file_exists('images/anuncios/' . $name_file[2])) {
                            rename($name_logo_form[$i], 'images/anuncios/' . $name_file[2]);
                        }
                        $logo_form = 'images/anuncios/' . $name_file[2];                   
                        
                        $arrFoto= array(
                            'paqueteID' => $paqueteID,
                            'publicacionID'   => $publicacionID,
                            'servicioID' => $servicioID,
                            'detalleID' =>  $detallePaquete->detalleID,
                            'foto' =>$logo_form
                        );
                            $fotoID = $this->admin_model->insertItem('fotospublicacion',$arrFoto);
                                                   
                        $arrVideo = null;
                        }
                    }
                }

        

         //COMPRA
         $valorCupon = $this->input->post('radiog_dark');
         $cuponID = $this->input->post('cuponUsado');
         $precio_total = $precioPaqueteA - ($precioPaqueteA * ($valorCupon / 100));

         if($cuponID != 0){
            $this->defaultdata_model->updateItem('cuponID', $cuponID, $data = array('usado' => 1), 'cuponadquirido');
         }
        
        $compra = array(
            'descuento' => $valorCupon,
            'fecha' => date('Y-m-d H:i:s'),
            'idCuponAdquirido' => $cuponID,
            'subtotal' => $detallePaquete->precio,
            'total' => $precio_total,
            'usuarioID' => $this->session->userdata('idUsuario'),
            'pagado' => 0
        );
        $compraID = $this->defaultdata_model->insertItem('compra', $compra);

        $compradetalle = array(
            'cantidad' => 1,
            'color' => '',
            'talla' => '',
            'compraID' => $compraID,
            'nombre' => $detallePaquete->nombrePaquete,
            'precio' => $detallePaquete->precio,
            'productoID' => $publicacionID
        );
        $compraDetalle = $this->defaultdata_model->insertItem('compradetalle', $compradetalle);
        

        if($precio_total <= 00.00){
        $this->defaultdata_model->updateItem('compraID', $compraID, $data = array('pagado' => 1), 'compra');
        $this->defaultdata_model->updateItem('servicioID', $servicioID, $data = array('pagado' => 1), 'serviciocontratado');
        $this->notificacionAdmin($this->input->post('seccion'),$this->input->post('titulo'),$publicacionID);
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

    function lista() {

        $raza = $this->input->post('raza') === '' ? NULL : intval($this->input->post('raza'));
        $genero = $this->input->post('genero') === '' ? NULL : intval($this->input->post('genero'));
        $estado = $this->input->post('estado') === '' ? NULL : intval($this->input->post('estado'));
        $precio = $this->input->post('precio') === '' ? NULL : $this->input->post('precio');
        $palabra_clave = $this->input->post('palabra_clave') === '' ? NULL : $this->input->post('palabra_clave');
        $id_anuncio = $this->input->post('id_anuncio') === '' ? NULL : $this->input->post('id_anuncio');

        echo json_encode($this->venta_model->getPublicaciones($raza, $genero, $estado, $precio, $palabra_clave, $id_anuncio, 2));
    }

 function contactar() {
        //var_dump($_POST);
        //contacto@quierounperro.com
        $directorio = $this->venta_model->getPublicaciones(null, null, null, null, null, $this->input->post('pub'),$this->input->post('seccion'));
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
<font> El usuario ' . $this->session->userdata('nombre') . ' ' . $this->session->userdata('apellido') . ' esta interesado en el siguiente anuncio:</font>
<font style="margin-top:100px; font-size:19px; font-weight:bold; color:#72A937;" >' . ($directorio['data'][0]->titulo).'</font>
        <br/><br/>        
        <font color="#000066"><strong> Correo Contacto:</strong> ' . $this->input->post('mail_contacto') . '</font>
        <br/><br/> 
        <font color="#000066"><strong> Asunto:</strong> ' . $this->input->post('asunto_contacto') . '</font>
        <br/><br/>
        <font color="#000066"><strong>Mensaje: </strong> ' . $this->input->post('comentarios_contacto') . '</font>
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

    function updateCompra($compraID,$estado,$servicioID,$publicacionID,$titulo,$seccionID){

         if($estado == 1 || $estado == 2){
          $this->defaultdata_model->updateItem('compraID', $compraID, $data = array('pagado' => $estado), 'compra');
          $this->defaultdata_model->updateItem('servicioID', $servicioID, $data = array('pagado' => $estado), 'serviciocontratado');
          $data = array('estatusCompra' => 1);
          //$publicacionID = $this->defaultdata_model->updateItem('publicacionID', $publicacionID, $data,'publicaciones');
           $this->notificacionAdmin($seccionID,$titulo,$publicacionID);
        } else {
          $delAnuncio = $this->admin_model->deleteItem('compraID', $compraID, 'compras');
          $delPublicacion = $this->admin_model->deleteItem('publicacionID', $publicacionID, 'publicaciones');
          $delPublicacion = $this->admin_model->deleteItem('servicioID', $servicioID, 'serviciocontratado');
          $data = array('estatusCompra' => 0);
        }
        $this->load->view('partial/proceso_exitoso_view',$data);
    }

    function add_favorite() {

        $data['favoritos'][] = array(
            'publicacionID' => $this->input->post('pub'),
            'idUsuario' => $this->session->userdata('idUsuario')
        );
       
        $fav = $this->usuario_model->getFav($this->input->post('pub'));
        if($fav){
             $insert = false;
         } else {
        $this->usuario_model->insert_values($data);
        $insert=true;
        }
        if($insert){
            echo 'Se ha agregado a favoritos.';
        }else{
            echo 'Ya ha sido agregado a favoritos.';
        }
    }

    function fotos (){
    $id_anuncio = $this->input->post('id_anuncio') === '' ? NULL : $this->input->post('id_anuncio');
    
        echo json_encode($this->venta_model->getFotos($id_anuncio));
    }
	
	 function videos (){
    $id_anuncio = $this->input->post('id_anuncio') === '' ? NULL : $this->input->post('id_anuncio');
    
        echo json_encode($this->venta_model->getVideo($id_anuncio));
    }
	
	 function datos_anunciante (){
    $id_anuncio = $this->input->post('id_anuncio') === '' ? NULL : $this->input->post('id_anuncio');
    
        echo json_encode($this->venta_model->getAnunciante($id_anuncio));
    }

    function denunciar() {
        //contacto@quierounperro.com
        //var_dump($_POST);
        $directorio = $this->venta_model->getPublicaciones(null, null, null, null, null,$this->input->post('pub'), $this->input->post('seccion'));
        //var_dump($directorio);
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
<img src="http://quierounperro.com/psk/images/logo_mail.jpg"/>
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
        if(!$this->email_model->send_email('', 'denuncia@quierounperro.com', 'Denuncia de anuncio', $msj)){
        
            echo "<div class='alert alert-warning'>No se ha logrado envíar el correo al dueño de este directorio. Vuelva a intentarlo o contacte al administrador del sitio.</div>";
        } else {
            echo '<div class="alert alert-success">Se ha enviado correctamente el correo electrónico.</div>';
        }

    }


    function meh(){
        $this->load->view('partial/proceso_exitoso_view'); 
    }



function editAanuncio() {
        $paqueteID = $this->input->post('paquete');
        $publicacionID = $this->input->post('publicacionID');
        $detallePaquete = $this->defaultdata_model->getPaquete($paqueteID);
        $detallePublicacion = $this->admin_model->getPublicacion($publicacionID);
        //SERVICIOS ADQUIRIDOS
       
        $servicioID = $detallePublicacion->servicioID;

        $cupones = $this->defaultdata_model->getCuponesPaquete($paqueteID);
        $fecha = date('Y-m-d');
        $dias = 30;
        $fechaCierre = strtotime ( '+'.$dias.' day' , strtotime($fecha)) ;
        $fechaCierre = date ( 'Y-m-j' , $fechaCierre );

        if ($cupones != null) {
            foreach ($cupones as $cupon) {
                $dataCupon = array(
                    'descripcion' => $cupon->descripcion,
                    'valor' => $cupon->valor,
                    'tipoCupon' => $cupon->tipoCupon,
                    'vigente' => 1,
                    'vigencia' => $fechaCierre,
                    'usado' => 0,
                    'servicioID' => $servicioID,
                    'detalleID' => $detallePaquete->detalleID,
                    'paqueteID' => $paqueteID,
                    'cuponDetalleID' => $cupon->cuponDetalleID,
                    'cuponID' => $cupon->cuponID
                );
                //$idCuponAdquirido = $this->defaultdata_model->insertItem('cuponadquirido', $dataCupon);
            }
        }



        //PUBLICACION      
        $fecha = date('Y-m-d');
        $dias = $this->input->post('vigencia_texto');
        $fechaCierre = strtotime('+' . $dias . ' day', strtotime($fecha));
        $fechaCierre = date('Y-m-j', $fechaCierre);
        $dataPublicacion = array(
            'seccion' => $this->input->post('seccion'),
            'titulo' => $this->input->post('titulo'),
            'vigente' => 1,
            'fechaCreacion' => date('Y-m-d'),
            'fechaVencimiento' => $fechaCierre,
            'numeroVisitas' => 0,
            'estadoID' => $this->input->post('estado'),
            'ciudad' => $this->input->post('ciudad'),
            'genero' => $this->input->post('genero'),
            'razaID' => $this->input->post('raza'),
            'precioVenta' => $this->input->post('precio'),
            'descripcion' => $this->input->post('descripcion'),
            'muestraTelefono' => $this->input->post('mostrar_telefono'),
            'aprobada' => 0,
            'servicioID' => $servicioID,
            'detalleID' => $detallePaquete->detalleID,
            'paqueteID' => $paqueteID
        );

        //$publicacionID = $this->defaultdata_model->updateItem('publicaciones', $dataPublicacion);
        

        //VIDEOS PUBLICACION 

        
          if(isset($_POST['url_video'])){
          $videosExt = $this->perfil_model->getVideos($publicacionID);
          $this->perfil_model->deleteVideos($publicacionID);
             $video = $this->input->post('url_video');
                if( $video != null){
                    for($i=0;$i<=count($video);$i++){               
                        if($video[$i] != '0'){
                        $arrVideo= array(
                            'paqueteID' => $paqueteID,
                            'publicacionID'   => $publicacionID,
                            'servicioID' => $servicioID,
                            'detalleID' =>  $detallePaquete->detalleID,
                            'link' =>$video[$i]
                        );
                            $video = $this->admin_model->insertItem('videos',$arrVideo);
                        }
                        $arrVideo = null;
                    }
                }
            }

        //IMAGENES
         $name_logo_form = $this->input->post('name_logo_form');

                if( $name_logo_form != null){
                    $imgExt = $this->perfil_model->getImagenes($publicacionID);
                    $this->perfil_model->deleteFotos($publicacionID);
                    for($i=0;$i<=count($name_logo_form) -1;$i++){     
                        //Se mueve la imagen de tmp a negocio_logo
                        if($name_logo_form[$i] != null){
                        $name_file = explode('/', $name_logo_form[$i]);                        
                        if (!file_exists('images/anuncios/' . $name_file[2])) {
                            rename($name_logo_form[$i], 'images/anuncios/' . $name_file[2]);
                        }
                        $logo_form = 'images/anuncios/' . $name_file[2];                   
                        
                        $arrFoto= array(
                            'paqueteID' => $paqueteID,
                            'publicacionID'   => $publicacionID,
                            'servicioID' => $servicioID,
                            'detalleID' =>  $detallePaquete->detalleID,
                            'foto' =>$logo_form
                        );
                            $fotoID = $this->admin_model->insertItem('fotospublicacion',$arrFoto);
                                                   
                        $arrVideo = null;
                        }
                    }
                }

        

         //COMPRA
         $valorCupon = $this->input->post('radiog_dark');
         $cuponID = $this->input->post('cuponUsado');
        
         $precio_total = $detallePaquete->precio - ($detallePaquete->precio * ($valorCupon / 100));

         if($this->input->post('exp') == true){
         if($cuponID != 0){
            $this->defaultdata_model->updateItem('cuponID', $cuponID, $data = array('usado' => 1), 'cuponadquirido');
         }
        
        $compra = array(
            'descuento' => $valorCupon,
            'fecha' => date('Y-m-d H:i:s'),
            'idCuponAdquirido' => $cuponID,
            'subtotal' => $detallePaquete->precio,
            'total' => $precio_total,
            'usuarioID' => $this->session->userdata('idUsuario'),
            'pagado' => 0
        );
        $compraID = $this->defaultdata_model->insertItem('compra', $compra);

        $compradetalle = array(
            'cantidad' => 1,
            'color' => '',
            'talla' => '',
            'compraID' => $compraID,
            'nombre' => $detallePaquete->nombrePaquete,
            'precio' => $detallePaquete->precio,
            'productoID' => $publicacionID
        );
        $compraDetalle = $this->defaultdata_model->insertItem('compradetalle', $compradetalle);
        }
        if($precio_total <= 00.00){
        $this->defaultdata_model->updateItem('compraID', $compraID, $data = array('pagado' => 1), 'compra');
        $this->defaultdata_model->updateItem('servicioID', $servicioID, $data = array('pagado' => 1), 'serviciocontratado');
        $publicacionID = $this->defaultdata_model->updateItem('publicacionID', $publicacionID, $dataPublicacion,'publicaciones');
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
                    "title" => "Publicacion en Anuncios",
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
                "success" => base_url().'venta/updateCompra/'.$compraID.'/1/'.$servicioID.'/'.$publicacionID,
                "pending" => base_url().'venta/updateCompra/'.$compraID.'/1/'.$servicioID.'/'.$publicacionID,
                "failure" => base_url().'venta/updateCompra/'.$compraID.'/0/'.$servicioID.'/'.$publicacionID
            )
        );

        $preference = $this->mercadopago->create_preference($preference_data);
         if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            echo 'rollback';
            } else {
            $this->db->trans_commit();
            //TODO hay que cambiar a sandbox_init_point
           echo '<iframe src="' . $preference['response']['sandbox_init_point'] . '" name="MP-Checkout" width="740" height="600" frameborder="0"></iframe>';
        }

         //echo json_encode($publicacionID);
        }
    }




    // Popularidad de anuncio
    function click(){
        $publicacionID = $this->input->post('id');
        $visitas = $this->defaultdata_model->getVisitasP($publicacionID);
        $numeroVisitas = $visitas->numeroVisitas + 1;
        $this->defaultdata_model->updateItem('publicacionID', $publicacionID, $data = array('numeroVisitas' => $numeroVisitas), 'publicaciones');
        return true;
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

    function getTextoApoyo(){
        $seccionID = $this->input->post('seccionID');
        $texto = $this->defaultdata_model->getTexto($seccionID);
        echo $texto;

    }

    function getSeccion(){
        $publicacionID = $this->input->post('pub');
        $seccionID = $this->perfil_model->getSeccionID($publicacionID);
        echo $seccionID;

    }

    function renovacion() {
        $paqueteID = $this->input->post('r_paqueteID');
        $detallePaquete = $this->venta_model->getPublicacionR($this->input->post('r_publicacionID'));

        
       $precioPaqueteA = 0;
        
        //SERVICIOS ADQUIRIDOS
        $servicioID = $this->input->post('r_servicioID');



        //PUBLICACION      
        $fecha = date('Y-m-d');
        $dias = $this->input->post('vigencia_texto');
        $fechaCierre = strtotime('+' . $dias . ' day', strtotime($fecha));
        $fechaCierre = date('Y-m-j', $fechaCierre);
        $dataPublicacion = array(
            'seccion' => $this->input->post('seccion'),
            'titulo' => $this->input->post('titulo'),
            'vigente' => 1,
            'numeroVisitas' => 0,
            'estadoID' => $this->input->post('estado'),
            'ciudad' => $this->input->post('ciudad'),
            'genero' => $this->input->post('genero'),
            'razaID' => $this->input->post('raza'),
            'precioVenta' => $this->input->post('precio'),
            'descripcion' => $this->input->post('descripcion'),
            'muestraTelefono' => $this->input->post('mostrar_telefono'),
            'aprobada' => 0,
            'servicioID' => $servicioID,
            'detalleID' => $detallePaquete->detalleID,
            'paqueteID' => $paqueteID
        );
        $publicacionID = $this->input->post('r_publicacionID');

        $this->defaultdata_model->updateItem('publicacionID', $publicacionID, $dataPublicacion, 'publicaciones');
        //Paquete gratis?
        if($paqueteID == 1 && $precioPaqueteA == 0){
            $this->defaultdata_model->updateItem('idUsuario', $this->session->userdata('idUsuario'), $data = array('paqueteGratis' => 0), 'usuario');
            $this->session->unset_userdata('paqueteGratis');
            $this->session->set_userdata('paqueteGratis',0);
        }
        //Paquete Gratis

        
        //VIDEOS PUBLICACION

        
          if(isset($_POST['url_video'])){
             $video = $this->input->post('url_video');
                if( $video != null){
                    for($i=0;$i<=count($video);$i++){               
                        if($video[$i] != '0'){
                        $arrVideo= array(
                            'paqueteID' => $paqueteID,
                            'publicacionID'   => $publicacionID,
                            'servicioID' => $servicioID,
                            'detalleID' =>  $detallePaquete->detalleID,
                            'link' =>$video[$i]
                        );
                            $video = $this->admin_model->insertItem('videos',$arrVideo);
                            //var_dump($e);
                        }
                        $arrVideo = null;
                    }
                }
            }

        //IMAGENES
         $name_logo_form = $this->input->post('name_logo_form');
         $p_fotos = count($name_logo_form);
         $paq_fotos = $detallePaquete->cantFotos;
         if($p_fotos < $paq_fotos){
            $c_fotos = $p_fotos-1;
         } else {
            $c_fotos = $detallePaquete->cantFotos -1;
         }
                if( $name_logo_form != null){
                    for($i=0;$i<=$c_fotos;$i++){     
                        //Se mueve la imagen de tmp a negocio_logo
                        if($name_logo_form[$i] != null){
                        $name_file = explode('/', $name_logo_form[$i]);                        
                        if (!file_exists('images/anuncios/' . $name_file[2])) {
                            rename($name_logo_form[$i], 'images/anuncios/' . $name_file[2]);
                        }
                        $logo_form = 'images/anuncios/' . $name_file[2];                   
                        
                        $arrFoto= array(
                            'paqueteID' => $paqueteID,
                            'publicacionID'   => $publicacionID,
                            'servicioID' => $servicioID,
                            'detalleID' =>  $detallePaquete->detalleID,
                            'foto' =>$logo_form
                        );
                            $fotoID = $this->admin_model->insertItem('fotospublicacion',$arrFoto);
                                                   
                        $arrVideo = null;
                        }
                    }
                }

        

         //COMPRA
         $valorCupon = $this->input->post('radiog_dark');
         $cuponID = $this->input->post('cuponUsado');
         $precio_total = $precioPaqueteA - ($precioPaqueteA * ($valorCupon / 100));

         if($cuponID != 0){
            $this->defaultdata_model->updateItem('cuponID', $cuponID, $data = array('usado' => 1), 'cuponadquirido');
         }
        
        $compra = array(
            'descuento' => $valorCupon,
            'fecha' => date('Y-m-d H:i:s'),
            'idCuponAdquirido' => $cuponID,
            'subtotal' => $detallePaquete->precio,
            'total' => $precio_total,
            'usuarioID' => $this->session->userdata('idUsuario'),
            'pagado' => 0
        );
        $compraID = $this->defaultdata_model->insertItem('compra', $compra);

        $compradetalle = array(
            'cantidad' => 1,
            'color' => '',
            'talla' => '',
            'compraID' => $compraID,
            'nombre' => $detallePaquete->nombrePaquete,
            'precio' => $detallePaquete->precio,
            'productoID' => $publicacionID
        );
        $compraDetalle = $this->defaultdata_model->insertItem('compradetalle', $compradetalle);
        

        if($precio_total <= 00.00){
        $this->defaultdata_model->updateItem('compraID', $compraID, $data = array('pagado' => 1), 'compra');
        $this->defaultdata_model->updateItem('servicioID', $servicioID, $data = array('pagado' => 1), 'serviciocontratado');
        $this->notificacionAdmin($this->input->post('seccion'),$this->input->post('titulo'),$publicacionID);
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



}
