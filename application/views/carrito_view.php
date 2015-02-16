<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Venta-Quierounperro.com</title>
        <link rel="shortcut icon" href="<?php echo base_url() ?>images/ico.ico"/>
        <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>css/reset.css" media="screen"></link>
        <link rel="stylesheet" href="<?php echo base_url() ?>css/jPages.css">
        <link type="text/css" rel="stylesheet" href="<?php echo base_url()?>css/index_.css" media="screen"></link>
            <link rel="stylesheet" href="<?php echo base_url() ?>css/validator/validationEngine.jquery.css" type="text/css"/>
            <script>
                if (navigator.userAgent.toLowerCase().indexOf('chrome') > -1) {

                    document.write('<link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>css/general.css" media="screen"></link> <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>css/venta.css" media="screen"></link></link> ');
                }
            </script>
            <script type="text/javascript" src="<?php echo base_url() ?>js/jquery-1.8.2.min.js"></script>
            <script src="<?php echo base_url() ?>js/jPages.js"></script>
            <script src="<?php echo base_url() ?>js/funciones_venta.js"></script>
            <script src="<?php echo base_url() ?>js/funciones_tienda.js"></script>
            <script src="<?php echo base_url() ?>js/jquery-ui.js"></script>
            <script type="text/javascript" src="<?php echo base_url() ?>js/validator/languages/jquery.validationEngine-es.js"></script>
            <script type="text/javascript" src="<?php echo base_url() ?>js/validator/jquery.validationEngine.js"></script>
            <script type="text/javascript" src="<?php echo base_url() ?>js/jquery.cycle.all.js"></script>
            <script src="<?php echo base_url() ?>js/funciones_.js" type="text/javascript"></script>
            <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>css/general.css" media="screen"></link>
            <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>css/carrito.css" media="screen"></link>
            <script>
                jQuery(document).ready(
                        function() {
                            $()
                            $(".cantidad").change(
                                    function() {
                                        var rowID = '';
                                        var cartID = $(this).attr('data-rel');
                                        var cantidad = $(this).val();
                                        if ($('.formCarrito').validationEngine('validate')) {
                                            $.ajax({
                                                url: '<?php echo base_url() ?>carrito/carritoUpdate',
                                                type: 'POST',
                                                dataType: 'json',
                                                data: 'rowID=' + rowID + '&qty=' + cantidad + '&cartID=' + cartID,
                                                success: function(data) {
                                                    if (data.response === "true") {
                                                        location.reload();
                                                    }
                                                }
                                            });
                                        }

                                    });

                            $(".descuento").change(
                                    function() {
                                        var descuento = $(this).val();
                                        $.ajax({
                                            url: '<?php echo base_url() ?>carrito/carritoUpdateTotal',
                                            type: 'POST',
                                            dataType: 'json',
                                            data: 'descuento=' + descuento,
                                            success: function(data) {
                                                if (data.response == "true") {
                                                    location.reload();
                                                }
                                            }
                                        });


                                    });

                            $(".destino").change(
                                    function() {
                                        var idEstado = $(this).val();
                                        $.ajax({
                                            url: '<?php echo base_url() ?>carrito/updateDestino',
                                            type: 'POST',
                                            dataType: 'json',
                                            data: 'idEstado=' + idEstado,
                                            success: function(data) {
                                                if (data.response == "true") {
                                                    location.reload();
                                                }
                                            }
                            });


                                    });

                            $(".deleteItem").click(
                                    function() {
                                        var cartID = $(this).attr('data-rel');
                                        $.ajax({
                                            url: '<?php echo base_url() ?>carrito/deleteItem',
                                            type: 'POST',
                                            dataType: 'json',
                                            data: 'cartID=' + cartID,
                                            success: function(data) {
                                                if (data.response == "true") {
                                                    window.location.href = "carrito";
                                                }
                                            }
                                        });


                                    });

                             jQuery("form").validationEngine({
                             promptPosition:"topRight",
                             ajaxFormValidation: false,
                            });

                        });
            </script>

    </head>

    <body>

        <div class="contenedor_de_detalle_compra" style="display:none">
            <div class="contenedor_cerrar_comprar">
                <img src="<?php echo base_url() ?>images/cerrar_verde.png"/>

            </div>

            <div class="contenedor_interno_compra">
                <table class="decripcion_producto_detalle">
                    <tr>
                        <td>
                            <img src="<?php echo base_url() ?>images/productos/01.png" width="184" height="158"/>
                        </td>
                        <td>
                            <font> Shampoo </font>
                            <br/>
                            <font> Cantidad: 1 </font>
                            <br/>
                            <font> Precio Unidad: 1 </font>
                        </td>
                    </tr>
                </table>
                <div><font></div>


            </div>


        </div>

        <div id="iconos_ocultos" class="iconos_ocultos">


            <ul class="iconos_estatus">
                <li>

                    <img id="horizontal_compras_mini"
                         onmouseover="mostrar_icono('horizontal_compras');
                                 ocultar_icono('horizontal_compras_mini');"
                         class="iconos_flotantes" src="<?php echo base_url() ?>images/compras_horizontal_mini.png"/>

                    <img class="iconos_flotantes2"
                         onmouseout="mostrar_icono('horizontal_compras_mini');
                                 ocultar_icono('horizontal_compras');"
                         id="horizontal_compras" src="<?php echo base_url() ?>images/compras_horizontal.png"
                         onclick="window.location = '<?php echo base_url() ?>carrito';"/>
                </li>
                <li>
                    <img id="horizontal_ingresar_mini"
                         onmouseover="mostrar_icono('horizontal_ingresar');
                                 ocultar_icono('horizontal_ingresar_mini');"
                         class="iconos_flotantes" src="<?php echo base_url() ?>images/ingresar_horizontal_mini.png"/>

                    <img class="iconos_flotantes2"
                         onmouseout="mostrar_icono('horizontal_ingresar_mini');
                                 ocultar_icono('horizontal_ingresar');"
                         id="horizontal_ingresar" src="<?php echo base_url() ?>images/ingresar_horizontal.png"/>
                </li>

                <li>
                    <img id="horizontal_registrate_mini"
                         onmouseover="mostrar_icono('horizontal_registrate');
                                 ocultar_icono('horizontal_registrate_mini');"
                         class="iconos_flotantes" src="<?php echo base_url() ?>images/registrate_horizontal_mini.png"/>

                    <img class="iconos_flotantes2"
                         onmouseout="mostrar_icono('horizontal_registrate_mini');
                                 ocultar_icono('horizontal_registrate');"
                         id="horizontal_registrate" src="<?php echo base_url() ?>images/registrate_horizontal.png"/>
                </li>
            </ul>
        </div>
        <?php $this->load->view('general/menu_view') ?>


        <div class="contenedor_contactar_previo" id="contenedor_contactar_previo" style=" display:none;">
            <div class="contenedor_cerrar_contactar">
                <img src="<?php echo base_url() ?>images/cerrar_anuncio.png" onclick="oculta('contenedor_contactar_previo');"/>
            </div>
            <div class="contactar_al_aunuciante">
                <font class="titulo_anuncio_publicado"> CONTACTA AL ANUNCIANTE </font>
                <br/>
                <br/>
                <strong> Nombre de usuario:</strong> Juanito Perez
                <br/>
                <strong> Estado: </strong> Hidalgo
                <br/>
                <strong> Ciudad: </strong> Actopan
                <br/>
                <strong> Teléfono: </strong> 372829102374746
                <br/>
                <br/>
                <font class="titulo_anuncio_publicado"> PROPORCIONA TU INFORMACIÓN </font>
                <br/>
                <br/>
                <input type="text" class="formu_contacto" id="nombre_contacto"
                       onfocus="clear_textbox('nombre_contacto', 'Nombre');" value="Nombre" size="44"/>
                <input type="text" class="formu_contacto" id="mail_contacto" onfocus="clear_textbox('mail_contacto', 'Tu-email')"
                       value="Tu-email" size="44"/>
                <input type="text" class="formu_contacto" id="asunto_contacto"
                       onfocus="clear_textbox('asunto_contacto', 'Asunto')" value="Asunto" size="44"/>
                <textarea cols="50" onfocus="clear_textbox('comentarios_contacto', 'Comentarios')" id="comentarios_contacto"
                          class="formu_contacto" rows="5">Comentarios</textarea>
                <br/>
                <br/>
                <ul class="boton_naranja_tres">
                    <li>
                        Enviar
                    </li>
                </ul>


            </div>
        </div>




        <div class="titulo_seccion">
            MI CARRITO
        </div>
        <div class="contenedor_buscado">


        </div>

        <div id="contenedor_central">
            <div id="espacio_izquierda" class="seccion_izquierda_secciones">
                <ul class="iconos" id="iconos_grandes">
        <li <?php if ($this->session->userdata('idUsuario') !== FALSE): ?>  onclick="window.location='<?= base_url() ?>carrito';" <?php else: ?>  <?php endif; ?>>
            <div class="indicadores"> 
                <?php echo $carritoT ?>
                
            </div> 

            <img src="<?php echo base_url() ?>images/compras.png"/></li>
        <li 
        <?php if ($this->session->userdata('idUsuario') !== FALSE): ?>
       <?php else: ?> onclick="muestra('contenedor_login');oculta('envio_con');muestra('ingreso_normal');" <?php endif; ?>>
        
        
        
            <div class="indicador">
             <?php if ($this->session->userdata('idUsuario') !== FALSE): ?>
             <img src="<?php echo base_url() ?>images/indicador_si.png" title="Ya estas logueado">
             <?php else: ?>
             <img src="<?php echo base_url() ?>images/indicador_no.png">
             <?php endif; ?>
              </div>
            <img src="<?php echo base_url() ?>images/sesion.png"/></li> 
            
        <li <?php if ($this->session->userdata('idUsuario') !== FALSE): ?>  <?php else: ?>onclick="muestra('contenedor_registro');" <?php endif; ?>>
            <div class="indicador"> 
            <?php if ($this->session->userdata('idUsuario') !== FALSE): ?>
             <img src="<?php echo base_url() ?>images/indicador_si.png" title="Ya estas registrado">
             <?php else: ?>
             <img src="<?php echo base_url() ?>images/indicador_no.png">
             <?php endif; ?>
             </div>
            <img src="<?php echo base_url() ?>images/registrate.png"/>
        </li>
    </ul>
            </div>


            <div class="contenedor_central">
                <br/>
                <br/>
                <form class="formCarrito">
                    <table width="795" class="tabla_carrito">
                        <tr>
                            <th width="102">
                                Articulo
                            </th>
                            <th width="267">
                                Descripción
                            </th>
                            <th width="142">
                                Precio MX
                            </th>
                            <th width="142">
                                Cantidad
                            </th>
                            <th width="118">
                                Eliminar
                            </th>
                        </tr>

                        <?php
                        if ($carrito != null):

                            foreach ($carrito as $product):
                                ?>
                                <tr>
                                    <td>
                                        <img
                                            src="<?php echo base_url() ?>images/productos/<?php echo ($product->foto != null) ? $product->foto : 'default.png' ?>"
                                            width="47" height="41"/></td>
                                    <td>
                                        <?php echo $product->nombre ?><br/>
                                        Talla: <?php echo $product->talla ?><br/>
                                        Color: <?php echo $product->color ?>
                                    </td>
                                    <td>
                                        <input type="hidden" name="precio" id="precio" value="<?php echo $product->precio ?>"/>
                                        $<?php echo $product->precio ?>
                                    </td>
                                    <td>
                                        <input type="hidden" name="cantidadV" id="cantidadV"
                                               value="<?php echo $product->cantidad ?>" class="cantidadValor"/>
                                        <input type="number" class="cantidad validate[required, min[1], max[99]]" value="<?php echo $product->cantidad ?>"
                                               name="cantidad" id="" data-rel="<?php echo $product->cartID ?>"/>
                                    </td>
                                    <td>
                                        <img src="<?php echo base_url() ?>images/eliminar.png" class="deleteItem"
                                             data-rel="<?php echo $product->cartID ?>"/>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                           
                            <tr> 
                                <td colspan="4">
                                    <p class="subtotal"> <img src="images/cupon_perfil.png" width="34" height="27"> Cupones de descuento
                                            <br>
                                                <font id="ver_cupones" class="ver_cupones" onclick="muestra('los_cupones');
                                                        muestra('ocultar_cupones');
                                                        oculta('ver_cupones');" style="display: block;"> Ver cupones </font>
                                                <font id="ocultar_cupones" class="ver_cupones" onclick="oculta('los_cupones');
                                                        oculta('ocultar_cupones');
                                                        muestra('ver_cupones');" style="display: none;"> Ocultar cupones </font>

                                                </p><div style="display: none;" id="los_cupones"> 
                                                    <?php if (!empty($cupones)): ?>
                                                        <p class="subtotal"> 
                                                            <br>
                                                                <?php foreach ($cupones as $cupon): ?>
                                                                    <label>
                                                                        <input type="radio" name="descuento" value="<?php echo $cupon->idCuponAdquirido ?>"
                                                                               class="descuento validate[required]"
                                                                               data-rel="<?php echo $carritototal->carritoTotalID ?>" <?php echo ($carritototal->descuento == $cupon->valor) ? 'checked=checked' : '' ?>/>
                                                                        <?php echo $cupon->valor ?>% de descuento</label><br/>
                                                                <?php endforeach; ?>

                                                                <label>
                                                                    <input type="radio" name="descuento" class="descuento validate[required]" value="" data-rel="<?php echo $carritototal->carritoTotalID ?>"/>
                                                                    No usar cupones</label>
                                                                <br/>
                                                                <br/>
                                                        </p>
                                                    <?php else: ?>
                                                    <p class="subtotal"><br/>No hay cupones.</p>
                                                    <?php endif; ?>
                                                   
                                                </div>
                                                <p></p>

                                                </td>
                                                <td> <p class="sub_cantidad">  - $<?php echo number_format($carritototal->subtotal - $carritototal->totalPrecio, 2) ?> </p> </td>
                                                </tr>
                                                <!-- datos de envio -->
                                                <tr>
                                                    <td colspan="4">
                                                        <p class="subtotal"><img src="images/sobre_perfil.png" width="34" height="27"> Gastos de envío <br>
                                                                    <font id="mostrar_envio" class="ver_cupones" onclick="muestra('los_datos_envio');
                                                                            muestra('ocultar_envio');
                                                                            oculta('mostrar_envio');" style="display: block;">  Ver datos de envío </font>
                                                                    <font id="ocultar_envio" class="ver_cupones" style="display: none;" onclick="muestra('mostrar_envio');
                                                                            oculta('los_datos_envio');
                                                                            oculta('ocultar_envio');">  Ocultar datos de envío </font>
                                                                    </p>
                                                                    <br/>
                                                                    <div id="los_datos_envio" style="display:;"> 
                                                                        <div class="subtotal">
                                                                            <div style="margin-bottom:20px; display:none;">
                                                                                <a> Datos de envio </a> Datos de envio guardados
                                                                                <select id="direcciones">
                                                                                    <option> ---</option>
                                                                                    <?php if (!is_null($direcciones)): ?>
                                                                                        <?php foreach ($direcciones as $direccion): ?>
                                                                                            <option data-nombre="<?php echo $direccion->nombre ?>"
                                                                                                    data-apellido="<?php echo $direccion->apellido ?>"
                                                                                                    data-cp="<?php echo $direccion->cp ?>" data-calle="<?php echo $direccion->calle ?>"
                                                                                                    data-numero="<?php echo $direccion->numero ?>"
                                                                                                    data-colonia="<?php echo $direccion->colonia ?>"
                                                                                                    data-estado="<?php echo $direccion->idEstado ?>"><?php echo $direccion->idusuarioDetalle ?></option>
                                                                                                <?php endforeach; ?>
                                                                                            <?php endif; ?>
                                                                                </select>
                                                                            </div>
                                                                            <div id="form_envio">
                                                                            <div>
                                                                                <label>Nombre:</label> <input class="background_gris_mini validate[required]" name="nombre" type="text" value="<?php echo $datosPersonales->nombre ?>" style="margin-right:27px;"/>
                                                                                <label>Apellidos:</label> <input class="background_gris_mini" name="apellidos" type="text" value="<?php echo $datosPersonales->apellido ?>"/>
                                                                            </div>
                <br/>                 <div>
                                                                                <label style="margin-right:34px;">C.P:</label> <input class="background_gris_mini validate[required]" name="cp" type="text" value="<?php echo $datosPersonales->cp ?>" style="margin-right:28px;"/>
                                                                                <label style="margin-right:28px;">Calle:</label> <input class="background_gris_mini validate[required]" name="calle" type="text" value="<?php echo $datosPersonales->calle ?>"/>
                                                                            </div>
                     <br/>
                                          <div>
                                                                                <label>Número:</label> <input name="noExterior" class="background_gris_mini validate[required]" type="text" value="<?php echo $datosPersonales->numero ?>" style="margin-right:28px;"/>
                                                                                <label style="margin-right:8px;">Colonia:</label> <input class="background_gris_mini validate[required]" type="text" name="colonia"
                                                                                                               value="<?php echo $datosPersonales->colonia ?>"/>
                                                                            </div>
              <br/>                                                              <div>                   
                                                                                <label>Ciudad:</label> <input class="background_gris_mini validate[required]" type="text" name="ciudad" value="<?php echo $datosPersonales->municipio ?>" style=" margin-right:31px;"/>
                                                                                <label style="margin-right:14px;">Estado:</label> <select class="background_gris_mini validate[required] destino" name="idEstado">
                                                                                    <option> ---</option>
                                                                                    <?php
                                                                                    if ($estados != null):
                                                                                        foreach ($estados as $edo):
                                                                                            ?>
                                                                                            <option
                                                                                                value="<?php echo $edo->estadoID ?>" <?php echo ($edo->estadoID == $datosPersonales->estadoID) ? 'selected="selected"' : '' ?>><?php echo $edo->nombreEstado ?></option>

                                                                                        <?php
                                                                                        endforeach;
                                                                                    endif;
                                                                                    ?>
                                                                                </select>
                                                                            </div>
              <br/>                                                              <div>          

                                                                                <label style="margin-right:30px;">Pais:</label> <select class="background_gris_mini validate[required]" name="idPais">
                                                                                    <option> México</option>
                                                                                </select>
                                                                            </div>
<br/>                                                                        </div>
                                                                        </div>
                                                                    </div>
                                                                    </td>
                                                                    <td> <p class="sub_cantidad"> $&nbsp;<?php echo round($costo, 2); ?> </p> </td>
                                                                    </tr>
                                                                     <tr>
                                                                     <th colspan="4">SUBTOTAL</th>
                                                                     <th> <p class=""> $&nbsp;<?php echo round($totalSinIVA, 2); ?> </p> </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th colspan="4"> IVA </th>
                                                                        <th> $&nbsp;<?php echo round($iva, 2); ?> </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th colspan="4"> TOTAL </th>
                                                                        <th> $&nbsp;<?php echo $carritototal->totalPrecio+ $costo; ?> </th>
                                                                    </tr>
<?php else: ?>
                                                                    <tr>
                                                                        <td colspan="5">
                                                                            No hay productos en el carrito.
                                                                        </td>
                                                                    </tr>

<?php endif; ?>


                                                                </table>
                                                                 </form>
                                                                <br/>


                                                                <br/>
                                                                <br/>
                                                                <br/>
                                                                <ul class="">
                                                                    <li>
                                                                        <script type="text/javascript" src="http://mp-tools.mlstatic.com/buttons/render.js"></script>
                                                                        <a href="<?php echo $preference['response']['init_point']; ?>" name="MP-Checkout"
                                                                           class="green-M-Rn" mp-mode="modal" onreturn="execute_my_onreturn" style="padding: 0px; float:right;" onclick="confirm('¿Los datos de envio son correctos?')">Pagar</a>


                                                                        <script type="text/javascript">
                                                                    $('.formCarrito').validationEngine();

                                                                    function execute_my_onreturn(json) {
                                                                        console.log(json.back_url, json.collection_id, json.collection_status, json.external_reference, json.preference_id);

                                                                        if (json.collection_status == 'approved' || json.collection_status == 'in_process') {
                                                                            window.location = "<?php echo base_url('carrito/guardar_compra') ?>?id=" + json.collection_id
                                                                        } else if (json.collection_status == 'pending') {
                                                                            alert('El usuario no completó el pago');
                                                                        } else if (json.collection_status == 'rejected') {
                                                                            alert('El pago fué rechazado, el usuario puede intentar nuevamente el pago');
                                                                        }
                                                                    }
                                                                        </script>
                                                                    </li>
                                                                </ul>
                                                                <br/>
                                                                <br/>

                                                                <p>&nbsp; </p>
                                                                <br/>
                                                                <br/>
                                                                </div>

                                                                <div class="seccion_derecha_paquetes">
                                                                    <ul class="aqui_crear_anuncio">
                                                                        <li onclick="muestra('contenedor_publicar_anuncio');">

                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                </div>


                                                                <div class="slideshow_tres">
                                                                    <img src="<?php echo base_url() ?>images/banner_inferior/1.png" width="638" height="93"/>
                                                                    <img src="<?php echo base_url() ?>images/banner_inferior/2.png" width="638" height="93"/>
                                                                    <img src="<?php echo base_url() ?>images/banner_inferior/3.png" width="638" height="93"/>
                                                                </div>

                                                                <div class="division_menu_inferior"></div>
                                                                <?php $this->load->view('general/footer_view'); ?>


                                                                 <div id="contenedor_publicar_anuncio" class="contenedor_publicar" style=" display:none">

    <!-- Inicio contenedor pap publicar anuncio aunucio !-->
    <div id="publicar_anuncio" class="pubicar_anuncio_mini">
        <?php $this->load->view('partial/_pasos_anuncio', array('paquetes' => $paquetes, 'estados' => $estados, 'razas' => $razas,'cupones' => $cupones)); ?>

    </div>
    </div>


                                                                <script type="text/javascript">
                                                                    (function() {
                                                                        function $MPBR_load() {
                                                                            window.$MPBR_loaded !== true && (function() {
                                                                                var s = document.createElement("script");
                                                                                s.type = "text/javascript";
                                                                                s.async = true;
                                                                                s.src = ("https:" == document.location.protocol ? "https://www.mercadopago.com/org-img/jsapi/mptools/buttons/" : "http://mp-tools.mlstatic.com/buttons/") + "render.js";
                                                                                var x = document.getElementsByTagName('script')[0];
                                                                                x.parentNode.insertBefore(s, x);
                                                                                window.$MPBR_loaded = true;
                                                                            })();
                                                                        }

                                                                        window.$MPBR_loaded !== true ? (window.attachEvent ? window.attachEvent('onload', $MPBR_load) : window.addEventListener('load', $MPBR_load, false)) : null;
                                                                    })();

                                                                    $(function() {
                                                                        $('#direcciones').on('change', function() {
                                                                            var optionSel = $('option:selected', this);
                                                                            var nombre = optionSel.data('nombre');
                                                                            var apellido = optionSel.data('apellido');
                                                                            var cp = optionSel.data('cp');
                                                                            var calle = optionSel.data('calle');
                                                                            var numero = optionSel.data('numero');
                                                                            var colonia = optionSel.data('colonia');
                                                                            var estado = optionSel.data('estado');


                                                                            $('[name=nombre]').val(nombre);
                                                                            $('[name=apellidos]').val(apellido);
                                                                            $('[name=cp]').val(cp);
                                                                            $('[name=calle]').val(calle);
                                                                            $('[name=noExterior]').val(numero);
                                                                            $('[name=colonia]').val(colonia);
                                                                            $('[name=idEstado]').val(estado);
                                                                        });
                                                                    });
                                                                </script>
                                                                </body>
                                                                </html>
