<?php
if (!defined('BASEPATH'))
    die();

class Carrito extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!is_logged() && $this->session->userdata('tipoUsuario') != 1) {
            $query = $_SERVER['QUERY_STRING'] ? '?' . $_SERVER['QUERY_STRING'] : '';
            $redir = str_replace('/', '-', uri_string() . $query);
            redirect('principal');
        } // checamos si existe una sesión activa           

        $this->load->model('defaultdata_model');
        $this->load->model('admin_model');
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


        if (!is_authorized(array(1, 2, 3), 5, $this->session->userdata('nivel'), $this->session->userdata('rol'))) {
            $this->session->set_flashdata('error', 'userNotAutorized');
            redirect('principal');
        }

    }

    //is_authorized($nivelesReq, $idPermiso, $nivelUsuario, $rolUsuario)


    public function index()
    {
        $data['SYS_metaTitle'] = '';
        $data['SYS_metaKeyWords'] = '';
        $data['SYS_metaDescription'] = '';
        $data['carrito'] = $this->admin_model->getCarrito($this->session->userdata('idUsuario')); //$this->admin_model->getSingleItem('usuarioID',$this->session->userdata('idUsuario'),'carrito');
        $data['carritototal'] = $this->admin_model->getSingleItem('usuarioID', $this->session->userdata('idUsuario'), 'carritototal');
        $datosPersonales = $this->usuario_model->myInfo($this->session->userdata('idUsuario'));
        $data['datosPersonales'] = $datosPersonales;
        $data['direcciones'] = $this->usuario_model->getDireccionesEnvioUsuario($this->session->userdata('idUsuario'));
        $data['estados'] = $this->defaultdata_model->getEstados();
        $data['paises'] = $this->defaultdata_model->getPaises();
        $data['cupones'] = $this->usuario_model->getCuponesUsuario($this->session->userdata('idUsuario'), 1);
        $data['seccion'] = 2;
        $data['paquetes'] = $this->defaultdata_model->getPaquetes();
        $data['razas'] = $this->defaultdata_model->getRazas();
        $data['banner'] = $this->defaultdata_model->getTable('banner');
        if(is_logged()){
         $cupones = $this->usuario_model->getCuponesUsuario($this->session->userdata('idUsuario'));
         $data['cupones'] = $cupones;
        } else {
            $data['cupones'] = null;
        }
        $data['carritoT'] = count ($this->admin_model->getCarrito($this->session->userdata('idUsuario')));
        $carrito = $this->admin_model->getCarrito($this->session->userdata('idUsuario'));
        $carritototal = $this->admin_model->getSingleItem('usuarioID', $this->session->userdata('idUsuario'), 'carritototal');
        $estadoID = $datosPersonales->estadoID;
        $costo = $this->usuario_model->getCostoEnvio($estadoID);
        $data['costo'] = $costo;

        $productos = 0;
        $precio = 0;
        $total = 0;
        if ($carrito != null) {
            foreach ($carrito as $producto) {
                $productos += $producto->cantidad;
                $precio += ($producto->cantidad * $producto->precio);
            }

        }

        if ($carritototal != null) {
            $descuento = $carritototal->descuento;
            $total = ($precio - ($precio * ($descuento / 100)));
            $carritoTotal = array(
                'usuarioID' => $this->session->userdata('idUsuario'),
                'totalProductos' => $productos,
                'subtotal' => $precio,
                'totalPrecio' => $total
                );
            $totales = $this->admin_model->updateItem('usuarioID', $this->session->userdata('idUsuario'), $carritoTotal, 'carritototal');

        } else {
            $carritoTotal = array(
                'usuarioID' => $this->session->userdata('idUsuario'),
                'totalProductos' => $productos,
                'subtotal' => $precio,
                'totalPrecio' => $total,
                'descuento' => 0
                );
            $totales = $this->admin_model->insertItem('carritototal', $carritoTotal);
        }


        $carritototal = $this->admin_model->getSingleItem('usuarioID', $this->session->userdata('idUsuario'), 'carritototal');
        if ($carritototal->totalPrecio == 0.00) {
            $precio = '10.00';
        } else {
            $precio = $carritototal->totalPrecio + $costo;
        }
        $preference_data = array(
            "items" => array(
                array(
                    "title" => "Artículos para mascotas QUP",
                    "quantity" => 1,
                    "currency_id" => "MX",
                    "unit_price" => floatval($precio)
                    )
                ),
            "payer" => array(
                'name' => $this->session->userdata('nombre'),
                'surname' => $this->session->userdata('apellido'),
                'email' => $this->session->userdata('correo')
            ),
            "back_urls" => array(
                
                )
            );
        $totalPreIva = $precio;
        $iva = $totalPreIva * .16;
        $totalSinIVA = $precio - $iva;
        
        $data['iva'] = $iva;
        $data['totalSinIVA'] = $totalSinIVA;

        $preference = $this->mercadopago->create_preference($preference_data);
        //var_dump($preference);
        $data['preference'] = $preference;

        $this->load->view('carrito_view', $data);
    }

    /**
     * Se utiliza en la tienda para
     * que agregue al carrito y notifique que se
     * agrego correctamente.
     * @return string
     */
    function addProducto_tienda()
    {
        $this->db->trans_start();
        $this->addProducto();
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            echo "<div class='alert alert-warning'>No se ha agregado el producto al carrito. Vuelva a intentarlo o contacte al administrador del sitio.</div>";
        } else {
            $this->db->trans_commit();
            echo '<div class="alert alert-success">El producto se ha agregado al carrito correctamente. <a class="alert-link" href="'.base_url("carrito").'">Ír al carrito.</a></div>';
        }

    }

    function addProducto()
    {
        $existeProducto = $this->admin_model->getCarritoProducto($this->session->userdata('idUsuario'), $this->input->post('productoID'), $this->input->post('talla'), $this->input->post('color'));

        if ($existeProducto != null) {
            $cantidad = $this->input->post('cantidad') + $existeProducto->cantidad;

            $this->admin_model->updateProduct($data = array('cantidad' => $cantidad), $this->session->userdata('idUsuario'), $existeProducto->productoID, $this->input->post('talla'), $this->input->post('color'));
        } else {
            $carritoData = array(
                'usuarioID' => $this->session->userdata('idUsuario'),
                'productoID' => $this->input->post('productoID'),
                'cantidad' => $this->input->post('cantidad'),
                'precio' => $this->input->post('precio'),
                'nombre' => $this->input->post('nombre'),
                'talla' => $this->input->post('talla'),
                'color' => $this->input->post('color')
                );
            $this->admin_model->insertItem('carrito', $carritoData);
        }

        $carrito = $this->admin_model->getCarrito($this->session->userdata('idUsuario'));
        $carritototal = $this->admin_model->getSingleItem('usuarioID', $this->session->userdata('idUsuario'), 'carritototal');

        $productos = 0;
        $precio = 0;
        if ($carrito != null) {
            foreach ($carrito as $producto) {
                $productos += $producto->cantidad;
                $precio += ($producto->cantidad * $producto->precio);

            }
        }

        if ($carritototal != null) {
            $descuento = $carritototal->descuento;
            $total = ($precio - ($precio * ($descuento / 100)));
            $carritoTotal = array(
                'usuarioID' => $this->session->userdata('idUsuario'),
                'totalProductos' => $productos,
                'subtotal' => $precio,
                'totalPrecio' => $total
                );
            $totales = $this->admin_model->updateItem('usuarioID', $this->session->userdata('idUsuario'), $carritoTotal, 'carritototal');

        } else {
            $total = ($this->input->post('cantidad') * $this->input->post('precio'));
            $carritoTotal = array(
                'usuarioID' => $this->session->userdata('idUsuario'),
                'totalProductos' => $this->input->post('cantidad'),
                'subtotal' => $total,
                'totalPrecio' => $total
                );
            $totales = $this->admin_model->insertItem('carritototal', $carritoTotal);
        }
    }

    function updateDestino()
    {
       $carritototal = $this->admin_model->getSingleItem('usuarioID', $this->session->userdata('idUsuario'), 'carritototal');
       $costo = $this->usuario_model->getCostoEnvio($this->input->post('idEstado'));
       $data['costo'] = $costo;
       $precio = $carritototal->totalPrecio + $costo;
       $carritoTotal = array(
                'subtotal' => ($precio-($precio*.16)),
                'totalPrecio' => $precio
                );
        $totales = $this->admin_model->updateItem('usuarioID', $this->session->userdata('idUsuario'), $carritoTotal, 'carritototal');

 
        
        $data['response'] = "true";
        echo json_encode($data);
    }

    function carritoDetalle()
    {
        $this->load->view('carrito_view');
    }

    function carritoUpdate()
    {
        $data = array(
            'rowid' => $this->input->post('rowID'),
            'qty' => $this->input->post('qty')
            );
        //$e = $this->cart->update($data);
        $carritoBD = array('cantidad' => $this->input->post('qty'));
        $this->admin_model->updateItem('cartID', $this->input->post('cartID'), $carritoBD, 'carrito');


        $carrito = $this->admin_model->getCarrito($this->session->userdata('idUsuario'));
        $carritototal = $this->admin_model->getSingleItem('usuarioID', $this->session->userdata('idUsuario'), 'carritototal');

        $productos = 0;
        $precio = 0;
        if ($carrito != null) {
            foreach ($carrito as $producto) {
                $productos += $producto->cantidad;
                $precio += ($producto->cantidad * $producto->precio);

            }
        }

        if ($carritototal != null) {
            $descuento = $carritototal->descuento;
            $total = ($precio - ($precio * ($descuento / 100)));
            $carritoTotal = array(
                'usuarioID' => $this->session->userdata('idUsuario'),
                'totalProductos' => $productos,
                'subtotal' => $precio,
                'totalPrecio' => $total
                );
            $totales = $this->admin_model->updateItem('usuarioID', $this->session->userdata('idUsuario'), $carritoTotal, 'carritototal');

        }
        $data['response'] = "true";
        echo json_encode($data);
    }

    function carritoUpdateTotal()
    {
        //Obtiene el valor de idCuponAdquirido
        //TODO falta indicar que el cupon ya fue utilizado.

        $idCuponAdquirido = $this->usuario_model->getCuponesUsuario($this->session->userdata('idUsuario'), NULL, $this->input->post('descuento'));
        if($idCuponAdquirido != null){
            $this->session->set_userdata('cuponusuario', $idCuponAdquirido);
            $descuento = $idCuponAdquirido->valor;

        }else{
            $descuento = 0;
            $this->session->set_userdata('cuponusuario', null);
        }

        $carrito = $this->admin_model->getCarrito($this->session->userdata('idUsuario'));
        $carritototal = $this->admin_model->getSingleItem('usuarioID', $this->session->userdata('idUsuario'), 'carritototal');

        $productos = 0;
        $precio = 0;
        if ($carrito != null) {
            foreach ($carrito as $producto) {
                $productos += $producto->cantidad;
                $precio += ($producto->cantidad * $producto->precio);
            }
        }

        if ($carritototal != null) {
            $total = ($precio - ($precio * ($descuento / 100)));
            $carritoTotal = array(
                'usuarioID' => $this->session->userdata('idUsuario'),
                'totalProductos' => $productos,
                'subtotal' => $precio,
                'totalPrecio' => $total,
                'descuento' => $descuento
                );
            $totales = $this->admin_model->updateItem('usuarioID', $this->session->userdata('idUsuario'), $carritoTotal, 'carritototal');

        }
        $data['response'] = "true";
        echo json_encode($data);
    }

    function deleteItem()
    {
        $cartID = $this->input->post('cartID');
        $this->admin_model->deleteItem('cartID', $cartID, 'carrito');
        $carrito = $this->admin_model->getCarrito($this->session->userdata('idUsuario'));
        $carritototal = $this->admin_model->getSingleItem('usuarioID', $this->session->userdata('idUsuario'), 'carritototal');


        $productos = 0;
        $precio = 0;
        if ($carrito != null) {
            foreach ($carrito as $producto) {
                $productos += $producto->cantidad;
                $precio += ($producto->cantidad * $producto->precio);
            }

        }

        if ($carritototal != null) {
            $descuento = $carritototal->descuento;
            $total = ($precio - ($precio * ($descuento / 100)));
            $carritoTotal = array(
                'usuarioID' => $this->session->userdata('idUsuario'),
                'totalProductos' => $productos,
                'subtotal' => $precio,
                'totalPrecio' => $total
                );
            $totales = $this->admin_model->updateItem('usuarioID', $this->session->userdata('idUsuario'), $carritoTotal, 'carritototal');

        } else {
            $carritoTotal = array(
                'usuarioID' => $this->session->userdata('idUsuario'),
                'totalProductos' => $productos,
                'subtotal' => $precio,
                'totalPrecio' => $total,
                'descuento' => 0
                );
            $totales = $this->admin_model->insertItem('carritototal', $carritoTotal);
        }
        $data['response'] = "true";
        echo json_encode($data);
    }

    function carritoDetalleTest()
    {
        $this->load->view('carritoTest_view');
    }

    function carritoBae()
    {
        $e = $this->cart->destroy();

    }


    function factura()
    {

        $data['response'] = "true";
        echo json_encode($data);
    }

    function pagos()
    {

    }

    function guardar_compra()
    {
        $this->db->trans_start();
        try{
            $usuario = $this->session->userdata('idUsuario');
            $carrito= $this->admin_model->getCarrito($usuario);
            $carritototal = $this->admin_model->getSingleItem('usuarioID', $usuario, 'carritototal');

            $compra = array();

            if($carritototal instanceof stdClass){
                $compra[0] = array (
                    'usuarioID' => $usuario,
                    'subtotal' => $carritototal->subtotal,
                    'idCuponAdquirido' => null,
                    'descuento' => $carritototal->descuento,
                    'total' => $carritototal->totalPrecio,
                    'fecha' => date('Y-m-d H:i:s'),
                    );
            }else{
                foreach ($carritototal as $value) {
            //Se asigna al indice cero por que solo debe ser un carrito de compra por usuario
                    $compra[0] = array (
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

            if ($this->db->trans_status() === FALSE)
            {
                $this->db->trans_rollback();
                $this->session->set_flashdata('info', "<div class='alert alert-warning'>No se ha logrado la compra. Vuelva a intentarlo o contacte al administrador del sitio.</div>");
            } else {
                $this->db->trans_commit();
                $this->session->set_flashdata('info', '<div class="alert alert-success">La compra se realizo correctamente.</div>');

            }
        //TODO Debe de redirigir a las compras
            redirect('principal/tienda');
        }catch(Exception $n){
            $this->db->trans_rollback();
            $this->session->set_flashdata('info', "<div class='alert alert-warning'>No se ha logrado la compra. Vuelva a intentarlo o contacte al administrador del sitio.</div>");
        }
    }

    function anuncio(){
        var_dump($_POST);
        $paqueteID = $this->input->post('paquete');
        $detallePaquete = $this->defaultdata_model->getPaquete($paqueteID);
        
        //SERVICIOS ADQUIRIDOS
        $data = array(
            'cantFotos' => $detallePaquete->cantFotos,
            'caracteres' => $detallePaquete->caracteres,
            'vigencia' => $detallePaquete->vigencia,
            'cupones' => $detallePaquete->cupones,
            'videos' => $detallePaquete->videos,
            'precio' => $detallePaquete->precio, 
            'detalleID' => $detallePaquete->detalleID,
            'paqueteID' => $detallePaquete->paqueteID,
            'idUsuario' => $this->session->userdata('idUsuario')
        );    
        $servicioID = $this->defaultdata_model->insertItem('serviciocontratado', $data);
       
        $cupones = $this->defaultdata_model->getCuponesPaquete($paqueteID);

        if($cupones != null){
            foreach ($cupones as $cupon) {
                $dataCupon = 
                array(
                    'descripcion' => $cupon->descripcion, 
                    'valor' =>   $cupon->valor,
                    'tipoCupon' =>  $cupon->tipoCupon,
                    'vigente' => 1,
                    'usado' => 0,
                    'servicioID' =>  $servicioID,
                    'detalleID' =>  $detallePaquete->detalleID,
                    'paqueteID' =>  $paqueteID,
                    'cuponDetalleID' =>  $cupon->cuponDetalleID,
                    'cuponID' =>   $cupon->cuponID
                );
                $idCuponAdquirido = $this->defaultdata_model->insertItem('cuponadquirido', $dataCupon);    
            }

        }

        //PUBLICACION      
        $fecha = date('Y-m-d');
        $dias = $this->input->post('vigencia_texto');
        $fechaCierre = strtotime ( '+'.$dias.' day' , strtotime($fecha)) ;
        $fechaCierre = date ( 'Y-m-j' , $fechaCierre );
        $dataPublicacion = array(
            'seccion' => $this->input->post('seccion'),
            'titulo' => $this->input->post('titulo'),
            'vigente' => 1, 
            'fechaCreacion' => date('Y-m-d'),
            'fechaVencimiento' => $fechaCierre,
            'numeroVisitas' => 0,
            'estadoID' => $this->input->post('estado'), 
            'genero' => $this->input->post('genero'),
            'razaID' => $this->input->post('raza'),
            'precio' => $this->input->post('precio'), 
            'descripcion' => $this->input->post('descripcion'),
            'muestraTelefono' => $this->input->post('mostrar_telefono'),
            'aprobada' => 0,
            'servicioID' => $servicioID,
            'detalleID' =>  $detallePaquete->detalleID,
            'paqueteID' => $paqueteID
        );

         $publicacionID = $this->defaultdata_model->insertItem('publicaciones', $dataPublicacion);

         
    }
}
