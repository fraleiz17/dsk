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
        $this->load->model('email_model');
        $this->load->helper(array('form', 'url'));
        $this->load->library('googlemaps');
        $this->load->library('cart');
        $this->load->helper('date');

        /*$CI = & get_instance();
        $CI->config->load("mercadopago", TRUE);
        $config = $CI->config->item('mercadopago');
        //$this->load->library('Mercadopago', $config);
        //$this->mercadopago->sandbox_mode(FALSE);*/
        
        

        if (!is_authorized(array(1, 2, 3), 5, $this->session->userdata('nivel'), $this->session->userdata('rol'))) {
            $this->session->set_flashdata('error', 'userNotAutorized');
            redirect('principal');
        }

    }

    //is_authorized($nivelesReq, $idPermiso, $nivelUsuario, $rolUsuario)


    public function index()
    {
        require_once(APPPATH.'libraries/mercadopago.php');


        $data['SYS_metaTitle'] = '';
        $data['SYS_metaKeyWords'] = '';
        $data['SYS_metaDescription'] = '';
        $data['carrito'] = $this->admin_model->getCarrito($this->session->userdata('idUsuario')); //$this->admin_model->getSingleItem('usuarioID',$this->session->userdata('idUsuario'),'carrito');
        $data['carritototal'] = $this->admin_model->getSingleItem('usuarioID', $this->session->userdata('idUsuario'), 'carritototal');
        $datosPersonales = $this->usuario_model->myInfo($this->session->userdata('idUsuario'));
        $data['datosPersonales'] = $datosPersonales;
        $data['direcciones'] = $this->usuario_model->getDireccionesEnvioUsuario($this->session->userdata('idUsuario'));
        $direccion_envio = $this->usuario_model->getDireccionEnvio($this->session->userdata('idUsuario'));
        $data['direccion_envio'] = $direccion_envio;
        $data['estados'] = $this->defaultdata_model->getEstados();
        $data['paises'] = $this->defaultdata_model->getPaises();
        $data['cupones'] = $this->usuario_model->getCuponesUsuario($this->session->userdata('idUsuario'), 1);
        $data['seccion'] = 2;
        $data['paquetes'] = $this->defaultdata_model->getPaquetes();
        $data['razas'] = $this->defaultdata_model->getRazas();
        $data['banner'] = $this->defaultdata_model->getTable('banner');
        $this->session->set_userdata('cuponusuario', null);
        //var_dump($this->session->userdata('cuponusuario'));
        if(is_logged()){
         $cupones = $this->usuario_model->getCuponesUsuario($this->session->userdata('idUsuario'));
         $data['cupones'] = $cupones;
        } else {
            $data['cupones'] = null;
        }
        $data['carritoT'] = count ($this->admin_model->getCarrito($this->session->userdata('idUsuario')));
        $carrito = $this->admin_model->getCarrito($this->session->userdata('idUsuario'));
        $carritototal = $this->admin_model->getSingleItem('usuarioID', $this->session->userdata('idUsuario'), 'carritototal');
       
        if($direccion_envio == null){
            $estadoID = $datosPersonales->estadoID;
        } else {
            $estadoID = $direccion_envio->estadoID;   
        }
        $costo = $this->usuario_model->getCostoEnvio($estadoID);
        $data['costo'] = $costo;
        //var_dump($datosPersonales,$data['costo'],$estadoID);

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

        //require_once(APPPATH.'libraries/mercadopago.php');
        $mp = new MP ("4460844937988109", "4iEWzMutgMTEWYvCOUjbGUP7VPJ8pr6k");

        //$preference = $mp->get_preference($preference_data);
        $preference = $mp->create_preference ($preference_data);
        //$preference = $this->mercadopago->create_preference($preference_data);
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
       $arrUpdate = array(
            'estadoID' => $this->input->post('idEstado')
        );
       $this->usuario_model->updateDireccion($arrUpdate, $this->session->userdata('idUsuario'));

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

    function updateDireccion(){
        $arrUpdate = array(
            'idUsuario' => $this->session->userdata('idUsuario'),
            'nombre' => $this->input->post('nombre'),
            'apellido' => $this->input->post('apellidos'),
            'cp' => $this->input->post('cp'),
            'calle' => $this->input->post('calle'),
            'colonia' => $this->input->post('colonia'),
            'numero' => $this->input->post('noExterior'),
            'ciudad' => $this->input->post('ciudad'),
            'estadoID' => $this->input->post('idEstado'),
            'paisID' => 146
        );

        $data['response'] = "false";        
        if($this->usuario_model->updateDireccion($arrUpdate, $this->session->userdata('idUsuario')))
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

            

            $compraID = $this->usuario_model->addCompra($compra, $compra_detalle);

            $this->usuario_model->deleteCarrito($usuario);

            $this->usuario_model->save_cupones($this->session->userdata('cuponusuario'));


            // Mensaje de Salida
            $direccion_envio = $this->usuario_model->getDireccionEnvio($usuario);

            $encabezado = '<strong>Orden de Compra en QuieroUnPerro.com No.:</strong> '.$compraID;
            $datosEnvio = '<strong>Nombre: </strong> '.strtoupper($direccion_envio->nombre.' '.$direccion_envio->apellido).'.<br>';
            $datosEnvio .= '<strong>Correo: </strong> '.strtoupper($this->session->userdata('correo')).'<strong> Teléfono: </strong>  '.$this->session->userdata('telefono').'.<br>';
            $datosEnvio .= '<strong>Calle: </strong> '.strtoupper($direccion_envio->calle.'<strong> Número: </strong>  '.$direccion_envio->numero.'<strong> Colonia: </strong>  '.$direccion_envio->numero).'.<br>';
            $datosEnvio .= '<strong>CP: </strong> '.strtoupper($direccion_envio->cp.'<strong> Ciudad: </strong>  '.$direccion_envio->ciudad.'<strong> Estado: </strong>  '.$direccion_envio->nombreEstado).'.<br>';
            $costoEnvio = $this->usuario_model->getCostoEnvio($direccion_envio->estadoID);

            $tablaCompra = '<table style=" font-family:Verdana, Geneva, sans-serif; font-size:12px; text-align: left; vertical-align: middle;">
                                    <tr style=" font-weight:bold; background-color:#6A2C91; color:white; ">
                                        <th>ProductoID</th>
                                        <th>Producto</th>
                                        <th>Cantidad</th>
                                        <th>Talla</th>
                                        <th>Color</th>
                                        <th>Precio</th>
                                    </tr>';
            $total_se = 0;
            foreach ($carrito as $value) {
                $tablaCompra .='<tr style="background-color:#D8E7D2;">
                                        <td>'.$value->productoID.'</td>
                                        <td>'.$value->nombre.'</td>
                                        <td>'.$value->cantidad.'</td>
                                        <td>'.$value->talla.'</td>
                                        <td>'.$value->color.'</td>
                                        <td> $ '.$value->precio.'</td>
                                    </tr>';
                     $total_se +=  ($value->cantidad * $value->precio );    

               
            }
            if($compra[0]['descuento'] != null){
                $descuento = $compra[0]['descuento'];
            } else { $descuento = 0; }
            $t_descuento = $total_se -($total_se * ((100 - $descuento)/100));
            $i_total = ($total_se - $t_descuento + $costoEnvio) * .16;
            $s_total = ($total_se - $t_descuento + $costoEnvio) - $i_total;

            $tablaCompra .= '
                            <tr style="background-color:#DFF0D8;">
                                 <th colspan="6"></th>
                             </tr>
                            <tr style="background-color:#DFF0D8;">
                                 <th colspan="5">Descuento</th>
                                 <td> $ '.number_format((float)$t_descuento, 2, '.', '').'</td>
                             </tr>';
            $tablaCompra .= '<tr style="background-color:#DFF0D8;">
                                 <th colspan="5">Gastos Envío</th>
                                 <td> $ '.number_format((float)$costoEnvio, 2, '.', '').'</td>
                             </tr>';
            $tablaCompra .= '<tr style="background-color:#DFF0D8;">
                                 <th colspan="5">Subtotal</th>
                                 <td> $ '.number_format((float)$s_total, 2, '.', '').'</td>
                             </tr>';
            
            $tablaCompra .= '<tr style="background-color:#DFF0D8;">
                                 <th colspan="5"> IVA </th>
                                 <td> $ '.number_format((float)$i_total, 2, '.', '').'</td>
                             </tr>';
            $tablaCompra .= '<tr style="background-color:#DFF0D8;">
                                 <th colspan="5">Total</th>
                                 <td> $ '.number_format((float)($total_se - $t_descuento + $costoEnvio), 2, '.', '').'</td>
                             </tr>';

             $tablaCompra .= '</table>';

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
<img src="http://quierounperro.com/psk/images/logo_mail.jpg"/>
</td>
</tr>
<tr>
<td align="center"><h4 style=" font-family:Verdana, Geneva, sans-serif; font-size:14px; padding-left:15px;">Gracias por comprar en QuieroUnPerro.com</h4></td>
</tr> 
<tr>
<td style="padding-left:15px;"> 
<font style=" font-family:Verdana, Geneva, sans-serif; margin-top:100px; font-size:13px; font-weight:bold; color:#6A2C91; " >'.$encabezado.'</font>
<br/>
<br/>

<font style="font-family:Verdana, Geneva, sans-serif; font-size:13px;">
'.$datosEnvio.'
<br/><br/>
<p> '.$tablaCompra.'</p>
</font>
<br/>
<p>Pronto recibirás información del envío de tu producto</p>
<br/>
<p>Si tienes cualquier duda al respecto, por favor escr&iacute;benos a contacto@quierounperro.com</p>
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


            //fin mensaje

            if ($this->db->trans_status() === FALSE)
            {
                $this->db->trans_rollback();
                $this->session->set_flashdata('info', "<div class='alert alert-warning'>No se ha logrado la compra. Vuelva a intentarlo o contacte al administrador del sitio.</div>");
            
            } else {
                $this->db->trans_commit();
                $this->session->set_flashdata('info', '<div class="alert alert-success">La compra se realizo correctamente.</div>');
                $this->email_model->send_email('', 'tienda@quierounperro.com', 'Compra realizada con éxito en QUP', $mensaje);
                $this->email_model->send_email('', $this->session->userdata('correo'), 'Compra realizada con éxito en QUP', $mensaje);
                //$this->session->userdata('correo')
            }
        //TODO Debe de redirigir a las compras
            redirect('principal/tienda');
        }catch(Exception $n){
            $this->db->trans_rollback();
            $this->session->set_flashdata('info', "<div class='alert alert-warning'>No se ha logrado la compra. Vuelva a intentarlo o contacte al administrador del sitio.</div>");
        }
    }

    function anuncio(){
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
