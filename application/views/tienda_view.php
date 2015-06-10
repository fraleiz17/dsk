<style>
.title_paquetes_titilos_mini {
  float: left !important;
  width: 200px !important;
  line-height: 1em !important;
  margin-top: -175px !important;
  font-family: "titulos" !important;
  font-size: 15px !important;
  margin-left: 45px !important;
  margin-bottom: -10px !important;
}

.descipcion_pasos_mediano{

  width: 840px;
  min-height: 650px;
  background-color: #FFF;
  border: 0px solid #FFFFFF !important; 
  margin-top: 0px !important;
}

#paso_dos > div > div.paquetes_izquierda_mini > label > div.precio_paquete_lite_mini > div {
    color:#E95D0F !important;
}

</style>
<link type="text/css" rel="stylesheet" href="<?php echo base_url()?>css/index_.css" media="screen"></link>
<?php $this->load->view('general/LoginFiles');?>  
<?php $this->load->view('general/general_header_view', array('title'=> 'Tienda', 'links' => array('venta', 'tienda'),'scripts'=> array('funciones_venta', 'funciones_tienda', 'funciones_'))) ?>

     
        <script>
            jQuery(document).ready(function() {


                $(".detalleProducto").click(function() {
                    var productoID = $(this).attr('id');
                    $('#productoDetallePop').load('<?php echo base_url() ?>principal/getDetalleProducto/' + productoID, function() {
                        $('.productoForm').validationEngine();
                        //
                        $(document).scrollTop(0);
                        $('.productoForm').submit(function(e) {
                            e.preventDefault();
                            var form = $(this);
                            if ($('.productoForm').validationEngine('validate')) {                           
                                $.ajax({
                                    url: '<?= base_url() ?>carrito/addProducto_tienda',
                                    data: form.serialize(),
                                    dataType: 'html',
                                    type: 'post',
                                    beforeSend: function() {
                                        $('.loader').append('<div class="spinner"><div class="bounce1"></div><div class="bounce2"></div><div class="bounce3"></div></div>');
                                        //show loader
                                    },
                                    success: function(data) {
                                        $('.infouser', form).empty().html(data);
                                    },
                                    error: function(data) {
                                        $('.infouser', form).empty();
                                        $("<div class='alert alert-warning'>No se ha agregado el producto al carrito. Vuelva a intentarlo o contacte al administrador del sitio.</div>").appendTo($('.infouser', form));
                                    },
                                    complete: function() {
                                        $('.spinner', form).remove();
                                    }
                                });
                            }
                        });
                        //

                    });
                });

                        jQuery("form").validationEngine({
                             promptPosition:"topRight",
                             ajaxFormValidation: false,
                            });
            });

        </script>
        <div id="productoDetallePop">
        </div>

        
        <?php $this->load->view('general/menu_view'); ?>

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
            TIENDA
        </div>
        <div class="contenedor_buscado">


        </div>

        <div id="contenedor_central">
            <?php $this->load->view('general/contTest');?>


            <div class="contenedor_central">
                <br/>
                <br/>
                <?php if ($this->session->flashdata('info')): ?>
                    <?php echo $this->session->flashdata('info'); ?>
                <?php endif; ?>
                <!-- item container -->
                <div style="position: relative;">
                    <div id="itemContainer" style="overflow-y: auto; height: auto!important;">
                        <!-- Inicio FILA -->
                    <?php $fila = 1;?>
                        <?php
                        if ($catalogo != null):
                            foreach ($catalogo as $item):
                                ?>
                                <!-- INICIO contenedor anuncio  -->
                                <!--<input type="hidden" name="productoID" id="productoID" value="<?php echo $item->productoID ?>" />-->
                                <div class="contenedor_producto" id="<?php echo $item->productoID ?>">
                                    <div class="contenedor_picture">
                                        <?php if ($item->foto != null): ?>
                                            <img src="<?php echo base_url() ?>images/productos/<?php echo $item->foto ?>"
                                                 width="184" height="158"/>
                                             <?php else: ?>
                                            <img src="<?php echo base_url() ?>images/productos/default.png" width="184"
                                                 height="158"/>
                                             <?php endif; ?>
                                    </div>
                                    <div class="contenedor_descripcion_precio_producto detalleProducto"
                                         id="<?php echo $item->productoID ?>">
                                        <font class="nombre_producto"><?php echo $item->nombre ?></font>
                                        <br/>
                                        <font class="precio_producto"><?php echo '$' . $item->precio ?></font>
                                    </div>

                                    <div>
                                    </div>
                                </div>


                                <!-- Fin contenedor annuncio -->
 <?php if (4 > $fila++):?>
                <!-- Inicio margen falso -->
                <div class="margen_derecho_20">

                </div>
            <?php else:?>
                <?php $fila = 1;?>
            <?php endif;?>
            <!-- FIN margen falso -->

                                <?php
                            endforeach;
							
							
                        endif;
                        ?>
                        <!-- FIN FILA ---->
                    </div>
                </div>
                <br/>
                <?php echo $this->pagination->create_links(); ?>

                <div style="margin: 0px auto; padding:10px; text-align:center;">
                    <!-- navigation holder -->
                    <div class="holder"></div>
                </div>
            </div>


            <div class="seccion_derecha_paquetes">
                <ul class="aqui_crear_anuncio">
                    <li onclick="muestra('contenedor_publicar_anuncio');">

                    </li>
                </ul>
            </div>
        </div>


        <div class="slideshow_tres" style="clear: both;">
            <?php
            if (is_logged() && ($this->session->userdata('tipoUsuario') == 2 || $this->session->userdata('tipoUsuario') == 3)) {
                if ($banner != null) {
                    foreach ($banner as $contenido) {
                        if ($this->session->userdata('zonaID') == $contenido->zonaID && $contenido->posicion == 3 && $contenido->seccionID == $seccion) {
                            ?>
                            <img src="<?php echo base_url() ?>images/<?php echo $contenido->imgbaner; ?>" width="638"
                                 height="93"/>

                            <?php
                        }
                    }
                }
            } else {
                foreach ($banner as $contenido) {
                    if ($contenido->zonaID == 9 && $contenido->posicion == 3 && $contenido->seccionID == $seccion) {
                        ?>    <img src="<?php echo base_url() ?>images/<?php echo $contenido->imgbaner; ?>" width="638"
                             height="93"/>
                             <?php
                         }
                     }
                 }
                 ?>
        </div>
        <br/>
        <div class="division_menu_inferior"></div>
        <?php $this->load->view('general/footer_view'); ?>
        <div id="contenedor_publicar_anuncio" class="contenedor_publicar" style=" display:none">

    <!-- Inicio contenedor pap publicar anuncio aunucio !-->
    <div id="publicar_anuncio" class="pubicar_anuncio_mini">
        <?php $this->load->view('partial/_pasos_anuncio', array('paquetes' => $paquetes, 'estados' => $estados, 'razas' => $razas,'cupones' => $cupones)); ?>

    </div>
    </div>
    </body>
</html>
