<?php?>

<link href="http://hayageek.github.io/jQuery-Upload-File/uploadfile.min.css" rel="stylesheet">
<script src="http://hayageek.github.io/jQuery-Upload-File/jquery.uploadfile.min.js"></script>
<style>
#descripcionPrev {
  overflow: hidden;
  width: 640px;
  height: 30px;
  text-overflow: ellipsis;
}
</style>
<div>
<div class="numeros_publicar_anuncio_mini">
    <ul class="listado_numeros_anuncio_mini">
        <li data-titulo="Selecciona la sección de publicación" data-p="paso_uno" class="numero_seccion_mini view_step">
            1
        </li>
        <li data-titulo="Indica tu tipo de anuncio" data-p="paso_dos">2</li>
        <li data-titulo="Completa tu información" data-p="paso_tres">3</li>
        <li data-titulo="Vista previa de tu anuncio" data-p="paso_cuatro">4</li>
        <li data-titulo="Detalle de compra:" data-p="paso_cinco">5</li>
        <li data-titulo="Pago de servicio:" data-p="paso_seis">6</li>
    </ul>
</div>
<div class="crerar_publicar_anuncio_mini">
    <img src="<?php echo base_url() ?>images/cerrar.png" id="cerrarPublicacion"/>
</div>
<br>
<div class="descipcion_pasos_mini">
<div class="titulo_de_pasos_mini"> PUBLICAR ANUNCIO</div>
<div class="instrucciones_pasos_mini">Selecciona la sección de publicación</div>
<div class="contenido_indicacion_mini">
<form id="p_form" name="p_form" method="post" action="#" enctype="multipart/form-data">
<div id="paso_uno" class="paso view_step" style="height: 190px;">
    <div style="position: relative;">
        <img src="<?php echo base_url() ?>images/pero_paso_uno.png" class="perro_paso_uno_mini"/>

        <div class="radios_secciones_mini">
            <!-- <input type="radio" id="radio4" name="seccion" value="3" class="css-checkbox" <?=($this->session->userdata('tipoUsuario') == 3) ? 'disabled="disabled" title="Solo puede publicar en Adopción o Perros Perdidos"' : ''?>/>
            <label for="radio4" class="css-label radGroup2">Cruza</label>
            <br>-->
            <input type="radio" id="radio5" name="seccion" value="2" class="css-checkbox"  <?=($publicacion->seccion == 2) ? '' : 'disabled="disabled"'?> <?=($this->session->userdata('tipoUsuario') == 3) ? 'disabled="disabled" title="Solo puede publicar en Adopción o Perros Perdidos"' : ''?>/>
            <label for="radio5" class="css-label radGroup2">Venta</label>
            <br>
            <input type="radio" id="radio6" name="seccion" value="6" class="css-checkbox" <?=($publicacion->seccion == 6) ? '' : 'disabled="disabled"'?> />
            <label for="radio6" class="css-label radGroup2">Adopción</label>
            <br>
            <input type="radio" id="radio7" name="seccion" value="7" class="css-checkbox" <?=($publicacion->seccion == 7) ? '' : 'disabled="disabled"'?> />
            <label for="radio7" class="css-label radGroup2">Perros perdidos</label>
        </div>
    </div>
</div>
<!--paso dos-->
<div id="paso_dos" class="paso contenedor_paquetes_mini">
<div style="display: inline-block; margin-bottom: 30px;">
<div class="paquetes_izquierda_mini">
    <label>
        <div class="title_paquetes_mini">
            <div class="lateral_lite_mini"></div>
            <img src="<?php echo base_url() ?>images/perrito_lite.png" class="margen_mini" width="29"
                 height="29"/> <font class="title_paquetes_titilos_mini">
                PAQUETE <?php echo strtoupper($publicacion->nombrePaquete) ?> </font>
        </div>
        <div class="precio_paquete_lite_mini">
            <?php if ('0.00' == 0 || is_logged() == false): ?>
                <div class="el_titulo_paquete_lite_mini"> Gratis</div>
                <div class="descripcion_precio_paquete_lite_mini"></div>
            <?php elseif (is_logged() == true && $this->session->userdata('paqueteGratis') == 1): ?>
                <div class="el_titulo_paquete_lite_mini"> Gratis</div>
                <div class="descripcion_precio_paquete_lite_mini"></div>
            <?php else: ?>
                <div class="precio_paquete_regular_mini"> $<?php echo '0.00' ?></div>
            <?php endif; ?>
        </div>
        <div class="descripcion_paquetes_mini">
            <strong>Incluye:</strong>
            <ul class="contenido_paquetes_mini">
                <li>
                    * <?php echo $publicacion->cantFotos ?> fotos
                </li>
                <li>
                    * Texto de <?php echo $publicacion->caracteres ?> caracteres
                </li>
                <li>
                    * <?php echo $publicacion->videos ?> video(s)
                </li>
                <li>
                    * <?php echo $publicacion->cupones ?> cupones
                </li>
                <li>
                    * Vigencia de <?php echo $publicacion->vigencia ?> días
                </li>
            </ul>
        </div>
        <div class="iconos_paquetes_mini">
            <ul>
                <li>
                    <?php if ($publicacion->cantFotos > 0): ?>
                        <div class="cantidades_detalle_paquete_lite_mini"> <?php echo $publicacion->cantFotos ?></div>
                        <img src="<?php echo base_url() ?>images/icono_camara.png" width="34" height="26"/>
                    <?php else: ?>
                        <div class="cantidades_detalle_paquete_of_mini"> <?php echo $publicacion->cantFotos ?></div>
                        <img src="<?php echo base_url() ?>images/icono_camara_of.png" width="34" height="26"/>
                    <?php endif; ?>
                </li>
                <li>
                    <div class="cantidades_detalle_paquete_lite_mini"> <?php echo $publicacion->caracteres ?></div>
                    <img src="<?php echo base_url() ?>images/icono_texto.png" width="34" height="26"/>
                </li>
                <li>
                    <div class="cantidades_detalle_paquete_lite_mini"> <?php echo $publicacion->vigencia ?></div>
                    <img src="<?php echo base_url() ?>images/icono_calendario.png" width="34" height="26"/>
                </li>
                <li>

                    <?php if ($publicacion->cupones > 0): ?>
                        <div class="cantidades_detalle_paquete_lite_mini"> <?php echo $publicacion->cupones ?></div>
                        <img src="<?php echo base_url() ?>images/icono_ticket.png" width="34" height="26"/>
                    <?php else: ?>
                        <div class="cantidades_detalle_paquete_of_mini"> <?php echo $publicacion->cupones ?></div>
                        <img src="<?php echo base_url() ?>images/icono_ticket_of.png" width="34" height="26"/>
                    <?php endif; ?>
                </li>
                <li>
                    <?php if ($publicacion->videos > 0): ?>
                        <div class="cantidades_detalle_paquete_lite_mini"> <?php echo $publicacion->videos ?></div>
                        <img src="<?php echo base_url() ?>images/icono_video_lite.png" width="34" height="26"/>
                    <?php else: ?>
                        <div class="cantidades_detalle_paquete_of_mini"> <?php echo $publicacion->videos ?></div>
                        <img src="<?php echo base_url() ?>images/icono_video_of.png" width="34" height="26"/>
                    <?php endif; ?>
                </li>
            </ul>
        </div>
        <input type="radio" style="margin-left:100px;" data-vigencia="<?php echo $publicacion->vigencia ?>"
               data-np="<?php echo $publicacion->nombrePaquete ?>" name="paquete"  <?=($publicacion->tipoPaquete == '1') ? '' : 'disabled="disabled"'?>
               value="<?php echo $publicacion->paqueteID ?>" data-precio="<?php echo '0.00' ?>" id="RadioGroup1_0" class="paquete_comprar reset"
   data-paquete='{"id":"<?php echo $publicacion->paqueteID ?>","nombre":"<?php echo $publicacion->nombrePaquete ?>","vigencia":"<?php echo $publicacion->vigencia ?>","precio":"<?php echo '0.00' ?>","caracteres":"<?php echo $publicacion->caracteres ?>","cantFotos":"<?php echo $publicacion->cantFotos ?>","videos":"<?php echo $publicacion->videos ?>","cupones":"<?php echo $publicacion->cupones ?>"}'/>
    </label>
</div>
<div class="paquetes_mini">
    <label>
        <div class="title_paquetes_mini">
            <div class="lateral_regular_mini"></div>
            <img src="<?php echo base_url() ?>images/perrito_regular.png" class="margen" width="29"
                 height="29"/>
            <font class="title_paquetes_titilos_mini">
                PAQUETE <?php echo strtoupper($publicacion->nombrePaquete) ?> </font>
        </div>
        <div class="precio_paquete_regular_mini"> $<?php echo '0.00' ?></div>

        <div class="descripcion_paquetes_mini">
            <strong>Incluye:</strong>
            <ul class="contenido_paquetes_mini">
                <li>
                    * <?php echo $publicacion->cantFotos ?> fotos
                </li>
                <li>
                    * Texto de <?php echo $publicacion->caracteres ?> caracteres
                </li>
                <li>
                    * <?php echo $publicacion->videos ?> video
                </li>
                <li>
                    * <?php echo $publicacion->cupones ?> cupones
                </li>
                <li>
                    * Vigencia de <?php echo $publicacion->vigencia ?> días.
                </li>
            </ul>
        </div>
        <div class="iconos_paquetes_mini">
            <ul>
                <li>
                    <?php if ($publicacion->cantFotos > 0): ?>
                        <div class="cantidades_detalle_paquete_regular_mini"><?php echo $publicacion->cantFotos ?></div>
                        <img src="<?php echo base_url() ?>images/icono_camara_regular.png" width="34" height="26"/>
                    <?php else: ?>
                        <div class="cantidades_detalle_paquete_of_mini"><?php echo $publicacion->cantFotos ?></div>
                        <img src="<?php echo base_url() ?>images/icono_camara_of.png" width="34" height="26"/>
                    <?php endif; ?>
                </li>
                <li>
                    <div class="cantidades_detalle_paquete_regular_mini"> <?php echo $publicacion->caracteres ?></div>
                    <img src="<?php echo base_url() ?>images/icono_texto_regular.png" width="34" height="26"/>
                </li>
                <li>
                    <div class="cantidades_detalle_paquete_regular_mini"><?php echo $publicacion->vigencia; ?></div>
                    <img src="<?php echo base_url() ?>images/icono_calendario_regular.png" width="34" height="26"/>
                </li>
                <li>
                    <?php if ($publicacion->cupones > 0): ?>
                        <div class="cantidades_detalle_paquete_regular_mini"><?php echo $publicacion->cupones ?></div>
                        <img src="<?php echo base_url() ?>images/icono_ticket_regular.png" width="34" height="26"/>
                    <?php else: ?>
                        <div class="cantidades_detalle_paquete_of_mini"><?php echo $publicacion->cupones ?></div>
                        <img src="<?php echo base_url() ?>images/icono_ticket_of.png" width="34" height="26"/>
                    <?php endif; ?>
                </li>
                <li>
                    <?php if ($publicacion->videos > 0): ?>
                        <div class="cantidades_detalle_paquete_regular_mini"><?php echo $publicacion->videos ?></div>
                        <img src="<?php echo base_url() ?>images/icono_video_regular.png" width="34" height="26"/>
                    <?php else: ?>
                        <div class="cantidades_detalle_paquete_of_mini"><?php echo $publicacion->videos ?></div>
                        <img src="<?php echo base_url() ?>images/icono_video_of.png" width="34" height="26"/>
                    <?php endif; ?>
                </li>
            </ul>
        </div>
        <input type="radio" style="margin-left:100px;" data-vigencia="<?php echo $publicacion->vigencia ?>"
               data-np="<?php echo $publicacion->nombrePaquete ?>" data-precio="<?php echo '0.00' ?>"
               name="paquete"  <?=($publicacion->tipoPaquete == '2') ? '' : 'disabled="disabled"'?>
               value="<?php echo $publicacion->paqueteID ?>" id="RadioGroup1_1" class="paquete_comprar reset"
   data-paquete='{"id":"<?php echo $publicacion->paqueteID ?>","nombre":"<?php echo $publicacion->nombrePaquete ?>","vigencia":"<?php echo $publicacion->vigencia ?>","precio":"<?php echo '0.00' ?>","caracteres":"<?php echo $publicacion->caracteres ?>","cantFotos":"<?php echo $publicacion->cantFotos ?>","videos":"<?php echo $publicacion->videos ?>","cupones":"<?php echo $publicacion->cupones ?>"}'/>
    </label>
</div>

<div class="paquetes_derecha_mini">
    <label>
        <div class="title_paquetes_mini">
            <div class="lateral_premium_mini"></div>
            <img src="<?php echo base_url() ?>images/perrito_premium.png" class="margen" width="29"
                 height="29"/> <font class="title_paquetes_titilos_mini">
                PAQUETE <?php echo strtoupper($publicacion->nombrePaquete) ?> </font>
        </div>
        <div class="precio_paquete_premium_mini"> $<?php echo '0.00' ?></div>

        <div class="descripcion_paquetes_mini">
            <strong>Incluye:</strong>
            <ul class="contenido_paquetes_mini">
                <li>
                    * <?php echo $publicacion->cantFotos ?> fotos
                </li>
                <li>
                    * Texto de <?php echo $publicacion->caracteres ?> caracteres
                </li>
                <li>
                    * <?php echo $publicacion->videos ?> video
                </li>
                <li>
                    * <?php echo $publicacion->cupones ?> cupones
                </li>
                <li>
                    * Vigencia de <?php echo $publicacion->vigencia ?> días
                </li>
            </ul>
        </div>
        <div class="iconos_paquetes_mini">
            <ul>
                <li>
                    <div class="cantidades_detalle_paquete_premium_mini"> <?php echo $publicacion->cantFotos ?></div>
                    <img src="<?php echo base_url() ?>images/icono_camara_premium.png" width="34" height="26"/>
                </li>
                <li>
                    <div class="cantidades_detalle_paquete_premium_mini"> <?php echo $publicacion->caracteres ?></div>
                    <img src="<?php echo base_url() ?>images/icono_texto_premium.png" width="34" height="26"/>
                </li>
                <li>
                    <div class="cantidades_detalle_paquete_premium_mini"><?php echo $publicacion->vigencia ?></div>
                    <img src="<?php echo base_url() ?>images/icono_calendario_premium.png" width="34" height="26"/>
                </li>
                <li>
                    <?php if ($publicacion->cupones > 0): ?>
                        <div class="cantidades_detalle_paquete_premium_mini"><?php echo $publicacion->cupones ?></div>
                        <img src="<?php echo base_url() ?>images/icono_ticket_premium.png" width="34" height="26"/>

                    <?php else: ?>
                        <div class="cantidades_detalle_paquete_of_mini"><?php echo $publicacion->cupones ?></div>
                        <img src="<?php echo base_url() ?>images/icono_ticket_of.png" width="34" height="26"/>
                    <?php endif; ?>
                </li>
                <li>
                    <?php if ($publicacion->videos > 0): ?>
                        <div class="cantidades_detalle_paquete_premium_mini"><?php echo $publicacion->videos ?></div>
                        <img src="<?php echo base_url() ?>images/icono_video_premium.png" width="34" height="26"/>
                    <?php else: ?>
                        <div class="cantidades_detalle_paquete_of_mini"><?php echo $publicacion->videos ?></div>
                        <img src="<?php echo base_url() ?>images/icono_video_of.png" width="34" height="26"/>
                    <?php endif; ?>
                </li>
            </ul>
        </div>
        <input type="radio" style="margin-left:100px;" data-vigencia="<?php echo $publicacion->vigencia ?>"
               data-np="<?php echo $publicacion->nombrePaquete ?>" data-precio="<?php echo '0.00' ?>"
               name="paquete"  <?=($publicacion->tipoPaquete == '3') ? '' : 'disabled="disabled"'?>
               value="<?php echo $publicacion->paqueteID ?>" id="RadioGroup1_2" <?=($this->session->userdata('tipoUsuario') == 3) ? 'disabled="disabled"' : ''?> class="paquete_comprar reset"
   data-paquete='{"id":"<?php echo $publicacion->paqueteID ?>","nombre":"<?php echo $publicacion->nombrePaquete ?>","vigencia":"<?php echo $publicacion->vigencia ?>","precio":"<?php echo '0.00' ?>","caracteres":"<?php echo $publicacion->caracteres ?>","cantFotos":"<?php echo $publicacion->cantFotos ?>","videos":"<?php echo $publicacion->videos ?>","cupones":"<?php echo $publicacion->cupones ?>"}'/>
    </label>
</div>
</div>
</div>

<!--paso tres descipcion_pasos_miniD -->
<div id="paso_tres" class="paso contenido_indicacion_formulario_mini">
    <input type="hidden" id="cantFotos" name="cantFotos" value=""/>
    <p class="margen_15_left_mini">Nombre: <input required="required" type="text" name="nombre"
                                                  class="background_morado_35_mini" readonly="readonly"
                                                  value="<?php echo $this->session->userdata('nombre'); ?>"/>
        Apellido:
        <input required="required" type="text" name="apellido"  class="background_morado_55_mini" readonly="readonly"
               value="<?php echo $this->session->userdata('apellido') ?>"/>
        Correo electrónico: <input required="required" type="text" name="correo" class="background_morado_55_mini"
                                   readonly="readonly" value="<?php echo $this->session->userdata('correo') ?>" style = "margin-right:-4px;"/></p>
    <br>

    <p class="margen_15_left_mini"> Teléfono*: <input name="telefono" type="text"
                                                     class="background_gris_35_mini preview validate[required,custom[onlyNumberSp],minSize[10]]" value="<?php echo $this->session->userdata('telefono');?> " required="required"/> Mostrar
        teléfono en el anuncio*: <select required="required" name="mostrar_telefono" class="background_gris_35_mini preview validate[required]">
            <option value="">--</option>
            <option value="1"> Si</option>
            <option value="0"> No</option>
        </select>
    </p>
    <br>

    <div class="sub_instrucciones_pasos_mini"> Detalles del aunucio</div>
    <br>

    <p class="margen_15_left_mini">Sección: <input required="required" type="text" name="seccion_texto" id="seccion" class="background_morado_55_mini" readonly="readonly"/> Paquete:
        <input required="required" type="text" name="paquete_texto" id="paquete_texto" class="background_morado_55_mini"
               readonly="readonly"/>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Vencimiento: <input type="text" required="required" name="vigencia_texto" class="background_morado_mini" id="vigencia_texto"
                                                                                                    readonly="readonly"/></p>
    <br>

    <p class="margen_15_left_mini"> Titúlo*: &nbsp;&nbsp; <input name="titulo" type="text" class="background_gris_55_mini preview validate[required]" id="titulo" maxlength="20" required="required"/> Estado*:
        &nbsp;&nbsp;<select required="required" name="estado" class="background_gris_7_mini preview validate[required]" id="estadoP">
            <option value="">--</option>
            <?php foreach ($estados as $edo): ?>
                <option value="<?php echo $edo->estadoID;?>"><?php echo $edo->nombreEstado;?></option>
            <?php endforeach; ?>
        </select>

        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Ciudad*: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input required="required" class="background_gris_mini preview validate[required]" name="ciudad" type="text" id="ciudad"/>
    </p>
    <br>

    <p class="margen_15_left_mini"> Genéro*:&nbsp;
        <select required="required" type="text" name="genero" class="background_gris_78_mini preview validate[required]" id="generoP">
            <option value=""> ---</option>
            <option value="0"> Hembra</option>
            <option value="1"> Macho</option>
        </select>

        Raza*: &nbsp;&nbsp;&nbsp;&nbsp;<select required="required" name="raza" class="background_gris_82_mini preview validate[required]" id="razaP">
            <option value="">--</option>
            <?php foreach ($razas as $r): ?>
                <option value="<?php echo $r->razaID ?>"><?php echo $r->raza ?></option>
            <?php endforeach; ?>
        </select>
        Precio*: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input required="required" class="background_gris_100_mini preview validate[required,custom[number]" name="precio" type="text" id="precio"/>
    </p>
    <br>

    <p class="margen_15_left_mini">
        Descripción*:&nbsp;<textarea required="required" class="background_gris_mini preview validate[required]" name="descripcion" id="descripcion" cols="95" rows="3"></textarea><br>
    <div style="margin-top:8px;margin-left:16px;">Caracteres:&nbsp;&nbsp;<input name="meh" type="text" id="meh" size="3" readonly="readonly" />
    <input name="caracteresN" type="text" id="caracteresN" size="3" readonly="readonly" />
    </div>
    </p>
    <br>
    <div id="links_videos">
    <p class="margen_15_left_mini" id="videoY">
    <input type="hidden" name="url_video[]" id="url_video" value="0" />
        Link de video <input type="text" name="url_video[]" id="url_video[]" size="98" class="preview one validate[custom[url]]"/><img
            src="<?php echo base_url() ?>images/logo_youtube.png"/><a href="#" id="addVid" class="addVid" style="font-size:9px; margin-top:8px;" data-rel="">Agregar</a><br>
    </p>

    <p class="margen_15_left_mini"><a href="<?php echo base_url() ?>#"> Tutorial para subir video a <img
                src="<?php echo base_url() ?>images/logo_youtube.png" width="43" height="16"/> </a></p>
     </div>
    <br>
<script>
$(document).ready(function()
{
    
    $("#fileuploader").uploadFile({
        
                url: "<?php echo base_url('venta/upload_file') ?>",
                allowedTypes: "png,jpg,jpeg",
                fileName: "file_form",
                maxNumberOfFiles: 2,
                showFileCounter: false,
                returnType: 'json',
                showStatusAfterSuccess: false,
                onSuccess: function(files, data, xhr)
                {
                    $('#error_logo').fadeOut();
                    $('#logo_image').fadeOut();
                    
                    if (data.error === undefined) {
                        console.log();
                        //$('#logo_image').prop('src', data.url_logo);
                        //$('[name=name_logo_form]').val(data.orig_name).trigger('change');
                        //$('#name_logo_form').prop('src', data.url_logo);
                        

                        $('#logo_image').fadeIn();
                        $('<img id="logo_image" class="span6 thumbnail" width="50" height="50" src="'+data.url_logo+'"/><input name="name_logo_form[]" value="'+data.orig_name+'" type="hidden"/>').appendTo('.row-fluid');
                        $('<img src="'+data.url_logo+'" width="200" height="200"/>').appendTo('.picse_mini');
                        
                    }
                    
                    else {
                        $('#error_logo').fadeIn().text(data.error);
                    }
                    
                
                }   
                
            });
            
});
</script>
    <p class="margen_15_left_mini contenedorFotos">
    <label>Seleccione <strong><label id="nfotosl"></label></strong> imágenes para su anuncio. (Solo se almacenarán el número permitido)</label>
         <div id="fileuploader" >Seleccionar Imagenes</div>
         
                            <div class="row-fluid">
                                <span id="error_logo" style="display:none;" class="alert alert-error"></span>
                               
                            </div>
        <!--  <img id="logo_image" class="span6 thumbnail" src=""/>
                                <input name="name_logo_form" value="" type="hidden"/><iframe src="<?php echo base_url() ?>../subir_archivos/index.html" style="overflow:none;" scrolling="no" width="800" height="100"> </iframe> -->
    </p>
    
    <!--imagenes-->
    <!--<script>
    jQuery(document).ready(function(){
        $('#images').submit(function() {
             var files = $('#files');
             $.ajax({
                    url:'<?php echo base_url('venta/upload_file') ?>',
                    type:'post',
                    dataType: 'JSON',
                    data: 'files=' + files,
                    success: function(data){
                       
                    }
            });     
        });
    });
    </script>-->
    <!--<form action="#" method="post" enctype="multipart/form-data" id="images">
  -->   <!--<input type="file" id="files" name="files[]" multiple />-->
     <!--<input type="submit" value="Agregar" />-->
<!--    </form>-->

<!--<output id="list" class="preview"></output>-->


<br>
    <!--imagenes-->
    
    
    <div style="width:800px; height:auto;" id="texto_apoyo">
    </div>

</div>
<!--paso cuatro-->
<div id="paso_cuatro" class="paso contenido_indicacion_formulario_mini">
<div class="leer_anuncio_mini">
    <div class="contenedor_galeria_mini">
        <div id="slideshow_publicar_anuncio" class="picse_mini" style="width:200px;height:200px;">
        
            
        </div>
    </div>
    <div class="datos_general_mini">
        <div class="titulo_anuncio_publicado_mini">
            <script>
            
            function contener_images() {
    $('#slideshow_publicar_anuncio').before('<ul id="nav_anuncio">').cycle({
    fx:      'scrollRight', 
    next:   '#right_previo', 
    timeout:  0, 
    easing:  'easeInOutBack',
        pager:  '#nav_anuncio',
        pagerAnchorBuilder: function(idx, slide) {
            return '<li><a href="#"><img src="' + slide.src + '" width="60" height="60" /></a></li>';
        }
    });
}
            
            jQuery(document).ready(function(){
                
               
                $(".preview").change(function() {
                    
                $("#tituloPrev").html($("#titulo").val());
                
                $("#precioPrev").html($("#precio").val());
                $("#seccionPrev").html($("#seccion").val());
                var genero = $('#generoP option:selected').html();
                $("#generoPrev").html(genero);
                var raza = $('#razaP option:selected').html();
                $("#razaPrev").html(raza);
                var lugar = $('#estadoP option:selected').html();
                $("#lugarPrev").html(lugar+' ('+$("#ciudad").val()+')');
                $("#descripcionPrev").html($("#descripcion").val());
                var src = $(".one").val();
                $("#videoPrev").html('<iframe class="youtube_video_mini" src="'+src+'"></iframe>');
                var img = $("#list").val();
                
                console.log(lugar);
                });
            });
            
            </script>
            
        
         <label><p id="tituloPrev"></p></label>
        </div>
        <br>
        <strong>
        <span id="s_precio">Precio: $ <label id="precioPrev"></label></span>
        </strong>
        <br>
        <font> Fecha de publicacion:<label id="fechaPrev"><?=date('d-m-Y');?></label></font>
        <br>
        <font>Sección: <label id="seccionPrev"></label></font>
        <br>
        <font>Raza: <label id="razaPrev"></label></font>
        <br>
        <font>Género: <label id="generoPrev"></label></font>
        <br>
        <font>Lugar: <label id="lugarPrev"></label></font>
        <br>
        <br>
        <ul class="boton_naranja_mini">
            <li onclick="muestra('contenedor_contactar_previo');">
                Contactar al anunciante
            </li>
        </ul>
        <br>
        <ul class="boton_gris_mini">
            <li>
                <img src="<?php echo base_url() ?>images/favorito.png"/>Agregar a Favoritos
            </li>
        </ul>
    </div>
    <br>

    <div class="contenedor_del_detalle_mini">

        <div class="titulo_anuncio_publicado_mini">
            MÁS DETALLES
        </div>
        <div class="descripcion_del_anuncio_mini">
           <p id="descripcionPrev"></p>
        </div>
        <br>
        <ul class="boton_naranja_dos_mini">
            <li id="ver_video" onclick="$('#video_previo').toggle();">
                Ver video
            </li>
        </ul>
        <div id="video_previo" class="desplegar_detalles_mini" style="display:none;">
        <br>

            <div class="titulo_anuncio_publicado_mini">
                VIDEO
            </div>
            <div id="videoPrev">
            
            </div>
        </div>
        <ul class="boton_rojo_dos_mini">
            <li>
                <img src="<?php echo base_url() ?>images/alert.png"/>
                Denunciar Anuncio
            </li>
        </ul>
        <div class="consejos_advertencias_mini">
            - QuierounPerro.com te invita a que antes de comprar pienses en adoptar, ya que hoy en día hay
            millones de perros sin hogar que deben ser sacrificados.
            <br>
            - Tener un perro conlleva una serie de responsabilidades, cuidados y atenciones que debes considerar
            antes de comprar uno.
            <br>
            - Infórmate de los cuidados especiales que debes de tener con la raza específica que estás
            comprando.
            <br>
            - NUNCA compres una nueva mascota sin verla físicamente antes.
            <br>
            - NUNCA hagas depósitos o transferencias bancarias a través de medios donde tu dinero no pueda ser
            rastreado, como lo son Money Gram y Western Union.
            <br>
            - NUNCA pagues por un perro con registro de pedigree AKC si no te muestran los certificados, ya que
            corres el riesgo de que sea una estafa y nunca te los entreguen. Exige ver los papeles y asegúrate
            de que el nombre del criador esté en el certificado.
            <br>
            - Cuando vayas a ver al vendedor, nunca vayas solo y revisa los alrededores.
            <br>
            - El vendedor también debe estar interesado en ti y en manos de quién dejará a su perro.
        </div>
       
    </div>
    <br>
</div>
</div>
<!--paso cinco-->
<div id="paso_cinco" class="paso">
<div class="descipcion_pasos_mediano_mini">

<table class="tabla_pago" style="margin-left:70px;" width="700">
<tr> 
<th width="158">
PRODUCTO
</th>
<th width="345">
DETALLE
</th>
<th width="181">
COSTO
</th>
</tr>
<tr>
<td>
<div id="nimagenpaquete"></div>
</td>
<td>
<p>* <label id="nfotos"></label> fotos</p>
<p>* Texto de <label id="ncaracteres"></label> caracteres</p> 
<p>* Vigencia de <label id="nvigencia"></label> días</p>
<p>* <label id="ncupones"></label> cupones</p>
<p>* <label id="nvideos"></label> video</p>
</td>
<td>
<p class="totales">$<label id="nprecio" class="nprecio"></label></p>
</td>
</tr>

<tr>
<td colspan="2">
 <img style="" src="<?php echo base_url()?>images/mini_cupon.png"/> <font class="texto_de_cupon" >Cupones de descuento: </font> <br> <font id="ver_cupones" class="ver_cupones" onclick="muestra('los_cupones_disponibles');muestra('no_ver_cupones');
 oculta('ver_cupones');"> Ver cupones </font> 
  <font style="display:none;" id="no_ver_cupones" class="ver_cupones" onclick="oculta('los_cupones_disponibles');oculta('no_ver_cupones');muestra('ver_cupones');"> Ocultar cupones </font>
<div id="los_cupones_disponibles" style="padding:15px; display:none;">

<?php if($cupones != null):
$c = 0;
                    foreach($cupones as $cupon):
                    $c++;
                    if($cupon->tipoCupon == 2):
                    ?>
             <input type="hidden" name="cuponUsado" id="cuponUsado" value="0"/>     
            <input type="radio" name="radiog_dark" id="radio_pago<?=$c?>" class="css-checkbox cupon" value="<?=$cupon->valor;?>" data-rel="<?=$cupon->cuponID;?>"/>
<label for="radio_pago<?=$c?>" class="css-label radGroup<?=$c?>"><?=$cupon->valor;?>% de descuento</label>
            
            <?php endif;
                endforeach; ?>
            <input type="radio" name="radiog_dark" id="radio_pago<?=$c?>" class="css-checkbox cupon"  value="0" data-rel="0"/><label for="radio_pago<?=$c?>" class="css-label radGroup2"> No usar cupones</label>
            <?php else:
            echo 'No hay cupones disponibles';
            endif;  ?>


</div>


</td>
<td>
<p class="totales">- $<label id="descuentoCupon">00.00</label> </p>
</td>
</tr>
<tr> 
<th colspan="2">
<p>SUBTOTAL:</p>
</th>
<th>
<p class="totales"> $<label id="subtotal" class="nprecio"></label> </p>
</th>
</tr>
<tr> 
<th colspan="2">
<p>IVA:</p>
</td>
<th>
<p class="totales"> $<label id="niva" class="niva"></label> </p>
</th>
</tr>
<tr>
<th colspan="2">
TOTAL
</th>
<th>
<p class="totales" style="color: #FFF;">$<label id="totalConDescuento" class="nprecio"></label></p>
<input type="hidden" name="iva" id="iva" value=""/>
<input type="hidden" name="total" id="total" value=""/>
</th>
</tr>
</table>

<br>
<br>
<br>
<br>
<br>
<div style="width:840px;" >
    <div style="float:right;widht: 136px;margin-left: 700px;margin-right: 58px;width: 136px;display: block;overflow:hidden;height:80px;">
        <ul class="morado_mini" id="btn_sig" style="">
            <li class="sig_paso save" style="width:134px;height:42px;color:#FFFFFF;text-align:center;padding-top:10px;">
                
                <input type="hidden" name="r_publicacionID" value="<?=$publicacion->publicacionID?>"/>
                <input type="hidden" name="r_servicioID" value="<?=$publicacion->servicioID?>"/>
                <input type="hidden" name="r_paqueteID" value="<?=$publicacion->paqueteID?>"/>
                
                <input id="test" type="submit" value="Publicar"/>
            </li>
        </ul>
    </div>
              <br>
                            <br>
                            <div id="msj_paso" style="font-size: 10px;display: inline-block; vertical-align: bottom; height: 38px;"></div>
                        </div>


 
</div>
   
</div>
<div id="paso_seis" class="paso">
                    <div class="descipcion_pasos_mediano">

                        <div id="iframez"></div>
                        <div id="closeProcess"></div>
                        <br>
                    </div>
                </div>
<br>

</form>
<!--boton se siguiente paso-->


<!--<div id="btn_sig" style="display: block; text-align: right; padding-right: 10px;">
    <div id="msj_paso" style="font-size: 10px;display: inline-block; vertical-align: bottom; height: 38px;"></div>
    <ul class="morado_mini" style="display: inline-block;margin-top:-200px;">
        <li class="sig_paso">Continuar</li>
    </ul>
</div>-->
<div id="btn_sig" class="siguientePaso">
    <div id="msj_paso" class="msj_paso"></div>
    <ul class="morado_mini" style="display: inline-block;">
        <li class="sig_paso" onclick="$('#p_form').validationEngine('validate')">Continuar</li>
    </ul>
</div>

</div>
</div>
</div>

<script>
    $(function () {
        $('.paso').hide();
        $('#paso_uno').show().addClass('paso_show');

        $('#btn_sig .sig_paso').on('click', function () {
            var sig_paso = $('.paso_show').next('.paso');
            console.log($('.paso_show').next('.paso').prop('id'));
            var num_paso = $('.paso_show').next('.paso').prop('id');
            
             if(num_paso == 'paso_cuatro'){
                contener_images();
            }
            if(num_paso == 'paso_cinco'){
                $('.siguientePaso').hide();
            }
            if(num_paso == 'paso_tres'){
            $('.msj_paso').html("*Debe completar todos los campos requeridos");
            }
            if (revision_step($('.paso_show'))) {
                $('.paso_show').removeClass('paso_show').hide();
                sig_paso.show().addClass('paso_show');
                $('.listado_numeros_anuncio_mini li.numero_seccion_mini').removeClass('numero_seccion_mini');
                var sel_paso = $('.listado_numeros_anuncio_mini').find('[data-p="' + sig_paso.prop('id') + '"]');
                sel_paso.addClass('numero_seccion_mini view_step');
                $('.instrucciones_pasos_mini').text(sel_paso.data('titulo'));
                $('.msj_paso').text("");
                add_step_move();
            }
        });

        function add_step_move() {
            $('.listado_numeros_anuncio_mini li.view_step').on('click', function () {
                $('.listado_numeros_anuncio_mini li.numero_seccion_mini').removeClass('numero_seccion_mini');
                $(this).addClass('numero_seccion_mini');
                var paso = $(this).data('p');
                var titulo_paso = $(this).data('titulo');

                $('.instrucciones_pasos_mini').text(titulo_paso);

                $('.paso').removeClass('paso_show').hide();
                $('.msj_paso').text('');
                $('#' + paso).show().addClass('paso_show');
                $('.instrucciones_pasos_mini').text(titulo_paso);
            });
        }

        function revision_step(element) {
            if (element.prop('id') === 'paso_uno') {
                $('.msj_paso').text("Debe seleccionar una sección");
                return $('#p_form input[name=seccion]:checked').val() === undefined ? false : true;
            }

            if (element.prop('id') === 'paso_dos') {
                $('.msj_paso').text("Debe seleccionar un paquete");
                return $('#p_form input[name=paquete]:checked').val() === undefined ? false : true;
            }

           if (element.prop('id') === 'paso_tres') {
                $('.msj_paso').text("Debe completar todos los campos requeridos");
                var obj = $('#paso_tres [name]:required').serialize().split('&');

                for (var i = 0; i < obj.length; i++) {
                    var field = obj[i].split('=');
                    if (field[1] === '') {
                        return false;
                    }
                }
                return true;
            }
            return true;
        }

        add_step_move();

        $('.paquete_comprar').on('click', function () {
            <?php if (!is_logged()): ?>  
                muestra('contenedor_login');
                oculta('contenedor_publicar_anuncio');
            <?php else :?>               
           
            var paquete_val = $(this).data('paquete');

            $('#paso_dos [data-np="' + paquete_val.nombre + '"]').prop('checked', true);
            $('#paso_tres [name=paquete_texto]').val(paquete_val.nombre);
            $('#paso_tres [name=vigencia_texto]').val(paquete_val.vigencia);
            $('#paso_tres [name=cantFotos]').val(paquete_val.cantFotos);
            $('#paso_tres [name=caracteresN]').val(paquete_val.caracteres);
            //$('#paso_tres [name=precio]').val('0.00');   
            
            if(paquete_val.id == 1){
                var imagen = '<img src="<?php echo base_url() ?>images/pago_lite.png"/>';           }
            
            if(paquete_val.id == 2){
                var imagen = '<img src="<?php echo base_url() ?>images/pago_regular.png"/>';            }
                
            if(paquete_val.id == 3){
                var imagen = '<img src="<?php echo base_url() ?>images/pago_premium.png"/>';            }
            
            $('#nimagenpaquete').html(imagen);
            $('#nvigencia').html(paquete_val.vigencia);
            $('#nfotos').html(paquete_val.cantFotos);
            $('#nvideos').html(paquete_val.videos);
            $('#ncupones').html(paquete_val.cupones);
            $('#ncaracteres').html(paquete_val.caracteres);

            console.log(paquete_val.id+' pauqete ID');
             var precio_paquete1 = 0;
            if(paquete_val.id == 1){
            <?php if (is_logged() == true && $this->session->userdata('paqueteGratis') == 1):?>
             var precio_paquete1 = 0;
            <?php endif; ?>
            }

            console.log(precio_paquete1+'precio_paquete1');
            $('#subtotal').html((precio_paquete1 - ( precio_paquete1 * .16)).toFixed(2));
            var iva = precio_paquete1 * .16;            
            $('#niva').html(iva.toFixed(2));
            $('#totalConDescuento').html(precio_paquete1);
            $('#nprecio').html(precio_paquete1);
            if(paquete_val.cantFotos == 0){
                $('.contenedorFotos').hide();           
            } //nfotosl

            $('#nfotosl').html(paquete_val.cantFotos);

            var cantidadVideos = paquete_val.videos;
            console.log(paquete_val.cantFotos+' cantidad de fotos')
            if(cantidadVideos == 0){
                $('#links_videos').hide();
                $('#ver_video').hide();
            }
            
            
            var contador = 1; 
            $(".addVid").click(function(e){
                e.preventDefault(); 
                if(contador < cantidadVideos){
                console.log(contador,cantidadVideos);
                
        $('<p id="video"> Link de video <input type="text" name="url_video[]" id="url_video" class="url_video" size="98" class="preview"/><img src="<?php echo base_url() ?>images/logo_youtube.png"/> <a href="#" id="eliminar" class="eliminar" style="font-size:9px;">Eliminar</a><br></p>').appendTo('#videoY');
                }
        contador++;
        
        });
        $("body").on("click",".eliminar", function(e){
            $(this).parent('p').remove(); 
            contador--;
        return false;
         });


            console.log(paquete_val.videos);
            $('#contenedor_publicar_anuncio').fadeIn();
            <?php endif;?>
        });

        $('textarea').keyup(function(e) {
             var tval = $('#descripcion').val(),
             tlength = tval.length, 
             set = $('#caracteresN').val(),
            remain = parseInt(set - tlength);
            $('#meh').val(remain);
            if (remain <= 0) {
                $('#descripcion').val((tval.substring(0,set)));
             }
        });

        
        $('#paso_dos [name=paquete]').on('change', function () {
            $('#paso_tres [name=paquete_texto]').val($(this).data('np'));
            $('#paso_tres [name=vigencia_texto]').val($(this).data('vigencia'));
            $('#paso_tres [name=precio]').val($(this).data('precio'));
        });
        
         $('#paso_tres [name=paquete]').on('change', function () {
            
        });

        $('#paso_uno [name=seccion]').on('change', function() {
            $('#paso_tres [name=seccion_texto]').val($(this).next().text());
        });
        
        $('#cerrarPublicacion').on('click', function() {
            if(confirm("IMPORTANTE\nAl cerrar esta ventana toda la informacion ingresada será borrada.\n Para terminar el proceso de la publicación debe dar clic en el enlace 'Volver al sitio del vendedor' en la ventana de mercadopago para alamacenar la información de su compra. \n Está seguro que desea cerrarla?")){
                oculta('contenedor_publicar_anuncio');
                window.location.href = "<?=$this -> agent -> referrer()?>";
            } else{
               return false;
            } 
            
        });
        
        $("body").on("click",".del", function(e){
            $(this).parent('span').remove(); 
        return false;
    });
    
        $('.cupon').on('click', function () {
            var valor = $(this).val();   
            var cuponID = $(this).attr('data-rel');
            var paquete_val = $('#nprecio').html();
            var precio = $('#subtotal').html();
            console.log(paquete_val+'***********************');
            var iva = precio * .17;
            precio = precio - iva;
            console.log(valor+'*-------********');
            var descuentoCupon = (paquete_val * (valor/100));
            
            var total = paquete_val - (descuentoCupon);
            
            console.log(total);
            $('#descuentoCupon').html(descuentoCupon.toFixed(2));
            $('#totalConDescuento').html(total);
            $('#total').val(total);
            $('#iva').val(iva);
            $('#cuponUsado').val(cuponID);
            
        });
        
        $('#paso_uno [name=seccion]').on('click', function () {
            var valor = $(this).val();   

            if(valor == 6 || valor == 7){
                $('#precio').val('0.00');
                $('#precio').attr('disabled', 'disabled');
                $("#s_precio").hide();

            } else {
                $('#precio').val('');
                $('#precio').removeAttr('disabled');
                $("#s_precio").show();

            }
            console.log(valor+'seccionnnnnnnn');
            $.ajax({
                    url:'<?php echo base_url('venta/getTextoApoyo') ?>',
                    type:'post',
                    dataType: 'html',
                    data: 'seccionID=' +valor,
                    success: function(data){
                        $('#texto_apoyo').html('');
                        $('#texto_apoyo').html(data);
                    }
                });
            
        });

         $('#p_form').submit(function(e){
                e.preventDefault();
                var form = $(this);
                $('.save').hide();
                $.ajax({
                    url:'<?php echo base_url('venta/renovacion') ?>',
                    type:'post',
                    dataType: 'html',
                    data: form.serialize(),
                    success: function(data){
                        //$('#cerrarPublicacion').hide();
                        $('#iframez').append(data);
                    }
                });
            });
        
    

    });


    
</script>
