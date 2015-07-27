<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
     <title>Quierounperro</title>
    <link rel="shortcut icon" href="<?php echo base_url() ?>images/ico.ico"/>
    <?php $this->load->view('general/LoginFiles.php'); ?>
<style>
#contenedor_paquetes > a:nth-child(1) > div > div.precio_paquete_lite > div{
    color:#E95D0F !important;
}
</style>
</head>
<body>

<div id="contenedor_publicar_anuncio" class="contenedor_publicar" style=" display:none">

    <!-- Inicio contenedor pap publicar anuncio aunucio !-->
    <div id="publicar_anuncio" class="pubicar_anuncio_mini">
        <?php $this->load->view('partial/_pasos_anuncio', array('paquetes' => $paquetes, 'estados' => $estados, 'razas' => $razas,'cupones' => $cupones)); ?>

    </div>
</div>


<?php $this->load->view('general/menu_view'); ?>

<div id="masterconteinerfull" style = "width:1000px; margin: 0 auto; display:block; overflow:hidden;">
</br>
<div id="contenedor_central">
<div id="espacio_izquierda" class="seccion_izquierda">
    <?php $this->load->view('general/contIzq.php'); ?>
</div>
<div id="banner_central">
    <div class="container" id="carousel_container">
        <div class="row">
            <div class="span12">
                <div id="artCarousel" class="carousel slide">
                    <ol class="carousel-indicators">
                        <li data-target="#artCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#artCarousel" data-slide-to="1"></li>
                        <li data-target="#artCarousel" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">

                        <?php $banner = $this->session->userdata('banner'); ?>
            <?php if (is_logged() && ($this->session->userdata('tipoUsuario') == 2 || $this->session->userdata('tipoUsuario') == 3)) {
                if ($banner != null) {

                    foreach ($banner as $contenido) {
                        if ($this->session->userdata('zonaID') == $contenido->zonaID && $contenido->posicion == 2 && $contenido->seccionID == $seccion) {
                            ?>
                            <div class="item"><a href="<?php echo base_url() ?>#" target="_blank"><img
                                    src="<?php echo base_url() ?>images/<?php echo $contenido->imgbaner; ?>" alt="Model 2"></a>

                            <div class="carousel-caption">
                                <?php echo $contenido->texto; ?>
                            </div>

                        </div>

                            <?php
                        }
                    }
                }
            } else {
                if ($banner !== null && !empty($banner)) {
                    foreach ($banner as $contenido) {
                        if ($contenido->zonaID == 9 && $contenido->posicion == 2 && $contenido->seccionID == $seccion) {
                            ?>    <div class="item"><a href="<?php echo base_url() ?>#" target="_blank"><img
                                    src="<?php echo base_url() ?>images/<?php echo $contenido->imgbaner; ?>" alt="Model 2"></a>

                            <div class="carousel-caption">
                                <?php echo $contenido->texto; ?>
                            </div>

                        </div>
                            <?php }
                        }
                    }
                } ?>

                    </div>
                    <a class="left carousel-control" href="<?php echo base_url() ?>#artCarousel"
                       data-slide="prev">&lsaquo;</a> <a class="right carousel-control"
                                                         href="<?php echo base_url() ?>#artCarousel"
                                                         data-slide="next">&rsaquo;</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="seccion_derecha" id="seccion_derecha">
    <div id="contenido_fb" style="height:192px; margin-bottom:15px; ">
        <!-- MyFavoritePetShop -->
        <div id="fb-root"></div>
        <div id="fb-root"></div>
        <script>
		   window.fbAsyncInit = function() {
        FB.init({
          appId      : '343695012453981',
          xfbml      : true,
          version    : 'v2.0'
        });
      };
		
		
		 (function(d, s, id){
         var js, fjs = d.getElementsByTagName(s)[0];
         if (d.getElementById(id)) {return;}
         js = d.createElement(s); js.id = id;
         js.src = "//connect.facebook.net/en_US/sdk.js";
         fjs.parentNode.insertBefore(js, fjs);
       }(document, 'script', 'facebook-jssdk'));
       </script>
        <div class="fb-like-box" data-href="https://www.facebook.com/quierounperro.com.mx"
             data-height="192" data-width="215" data-colorscheme="light" data-show-faces="false" data-header="false"
             data-stream="true" data-show-border="false"></div>
    </div>

    <div id="banner_publicidad_derecha" class="slideshow_dos" style="height:200px; margin-top:10px;">
         <?php $banner = $this->session->userdata('banner'); ?>
            <?php if (is_logged() && ($this->session->userdata('tipoUsuario') == 2 || $this->session->userdata('tipoUsuario') == 3)) {
                if ($banner != null) {

                    foreach ($banner as $contenido) {
                        if ($this->session->userdata('zonaID') == $contenido->zonaID && $contenido->posicion == 4 && $contenido->seccionID == $seccion) {
                            ?>
                            <img src="<?php echo base_url() ?>images/<?php echo $contenido->imgbaner; ?>" width="638"
                            height="93"/>

                            <?php
                        }
                    }
                }
            } else {
                if ($banner !== null && !empty($banner)) {
                    foreach ($banner as $contenido) {
                        if ($contenido->zonaID == 9 && $contenido->posicion == 4 && $contenido->seccionID == 17) {
                            ?>    <img src="<?php echo base_url() ?>images/<?php echo $contenido->imgbaner; ?>" width="215"
                            height="190"/>
                            <?php }
                        }
                    }
                } ?>

    </div>

</div>
<div id="contenedor_paquetes" class="contenedor_paquetes">

<a href="#"  class="paquete_comprar reset"
   data-paquete='{"id":"<?php echo $paquetes[0]->paqueteID ?>","nombre":"<?php echo $paquetes[0]->nombrePaquete ?>","vigencia":"<?php echo $paquetes[0]->vigencia ?>","precio":"<?php echo $paquetes[0]->precio ?>","caracteres":"<?php echo $paquetes[0]->caracteres ?>","cantFotos":"<?php echo $paquetes[0]->cantFotos ?>","videos":"<?php echo $paquetes[0]->videos ?>","cupones":"<?php echo $paquetes[0]->cupones ?>"}'>
    <div class="paquetes_izquierda">
        <div class="title_paquetes">
            <div class="lateral_lite"></div>
            <img src="<?php echo base_url() ?>images/perrito_lite.png" class="margen"/> <font
                class="title_paquetes_titilos"> PAQUETE <?php echo strtoupper($paquetes[0]->nombrePaquete) ?> </font>
        </div>
        <div class="precio_paquete_lite">
            <?php if ($paquetes[0]->precio == 0 || is_logged() == false): ?>
                <div class="el_titulo_paquete_lite"> Gratis</div>
                <div class="descripcion_precio_paquete_lite">al crear tu usuario</div>
            <?php elseif (is_logged() == true && $this->session->userdata('paqueteGratis') == 1): ?>
                <div class="el_titulo_paquete_lite"> Gratis</div>
                <div class="descripcion_precio_paquete_lite">al crear tu usuario</div>
            <?php else: ?>
                <div class="precio_paquete_regular"> $<?php echo $paquetes[0]->precio ?></div>
            <?php endif; ?>
        </div>
        <br/>

        <div class="descripcion_paquetes">
            <strong>Incluye:</strong>
            <ul class="contenido_paquetes">
               <li>
                    * <?php echo $paquetes[0]->cantFotos ?> fotos
                </li>
                <li>
                    * Texto de <?php echo $paquetes[0]->caracteres ?> caracteres
                </li>
                <li>
                    * <?php echo $paquetes[0]->videos ?> video(s)
                </li>
                <li>
                    * <?php echo $paquetes[0]->cupones ?> cupones
                </li>
                <li>
                    * Vigencia de <?php echo $paquetes[0]->vigencia ?> días.
                </li>
            </ul>
        </div>
        <div class="iconos_paquetes">
            <ul>
                <li>
                    <?php if ($paquetes[0]->cantFotos > 0): ?>
                        <div class="cantidades_detalle_paquete_lite"> <?php echo $paquetes[0]->cantFotos ?></div>
                        <img src="<?php echo base_url() ?>images/icono_camara.png"/>
                    <?php else: ?>
                        <div class="cantidades_detalle_paquete_of"> <?php echo $paquetes[0]->cantFotos ?></div>
                        <img src="<?php echo base_url() ?>images/icono_camara_of.png"/>
                    <?php endif; ?>
                </li>
                <li>
                    <div class="cantidades_detalle_paquete_lite"> <?php echo $paquetes[0]->caracteres ?></div>
                    <img src="<?php echo base_url() ?>images/icono_texto.png">
                </li>
                <li>
                    <div class="cantidades_detalle_paquete_lite"> <?php echo $paquetes[0]->vigencia ?></div>
                    <img src="<?php echo base_url() ?>images/icono_calendario.png"/>
                </li>
                <li>
                    <?php if ($paquetes[0]->cupones > 0): ?>
                        <div class="cantidades_detalle_paquete_lite"> <?php echo $paquetes[0]->cupones ?></div>
                        <img src="<?php echo base_url() ?>images/icono_ticket.png"/>
                    <?php else: ?>
                        <div class="cantidades_detalle_paquete_of"> <?php echo $paquetes[0]->cupones ?></div>
                        <img src="<?php echo base_url() ?>images/icono_ticket_of.png"/>
                    <?php endif; ?>
                </li>
                <li>
                    <?php if ($paquetes[0]->videos > 0): ?>
                        <div class="cantidades_detalle_paquete_lite"> <?php echo $paquetes[0]->videos ?></div>
                        <img src="<?php echo base_url() ?>images/icono_video_lite.png"/>
                    <?php else: ?>
                        <div class="cantidades_detalle_paquete_of"> <?php echo $paquetes[0]->videos ?></div>
                        <img src="<?php echo base_url() ?>images/icono_video_of.png"/>
                    <?php endif; ?>
                </li>
            </ul>
        </div>
    </div>
</a>
<a href="<?php echo base_url() ?>#" class="paquete_comprar reset"
   data-paquete='{"id":"<?php echo $paquetes[1]->paqueteID ?>","nombre":"<?php echo $paquetes[1]->nombrePaquete ?>","vigencia":"<?php echo $paquetes[1]->vigencia ?>","precio":"<?php echo $paquetes[1]->precio ?>","caracteres":"<?php echo $paquetes[1]->caracteres ?>","cantFotos":"<?php echo $paquetes[1]->cantFotos ?>","videos":"<?php echo $paquetes[1]->videos ?>","cupones":"<?php echo $paquetes[1]->cupones ?>"}'>
    <div class="paquetes">
        <div class="title_paquetes">
            <div class="lateral_regular"></div>
            <img src="<?php echo base_url() ?>images/perrito_regular.png" class="margen"/>
            <font
                class="title_paquetes_titilos"> PAQUETE <?php echo strtoupper($paquetes[1]->nombrePaquete) ?> </font>

        </div>
        <div class="precio_paquete_regular"> $<?php echo $paquetes[1]->precio ?></div>
        <br/>

        <div class="descripcion_paquetes">
            <strong>Incluye:</strong>
            <ul class="contenido_paquetes">
                <li>
                    * <?php echo $paquetes[1]->cantFotos ?> fotos
                </li>
                <li>
                    * Texto de <?php echo $paquetes[1]->caracteres ?> caracteres
                </li>
                <li>
                    * <?php echo $paquetes[1]->videos ?> video(s)
                </li>
                <li>
                    * <?php echo $paquetes[1]->cupones ?> cupones
                </li>
                <li>
                    * Vigencia de <?php echo $paquetes[1]->vigencia ?> días.
                </li>
            </ul>
        </div>
        <div class="iconos_paquetes">
            <ul>
                <li>
                    <?php if ($paquetes[1]->cantFotos > 0): ?>
                        <div class="cantidades_detalle_paquete_regular"><?php echo $paquetes[1]->cantFotos ?></div>
                        <img src="<?php echo base_url() ?>images/icono_camara_regular.png"/>
                    <?php else: ?>
                        <div class="cantidades_detalle_paquete_of"><?php echo $paquetes[1]->cantFotos ?></div>
                        <img src="<?php echo base_url() ?>images/icono_camara_of.png"/>
                    <?php endif; ?>
                </li>
                <li>
                    <div class="cantidades_detalle_paquete_regular"> <?php echo $paquetes[1]->caracteres ?></div>
                    <img src="<?php echo base_url() ?>images/icono_texto_regular.png">
                </li>
                <li>
                    <div class="cantidades_detalle_paquete_regular"><?php echo $paquetes[1]->vigencia; ?></div>
                    <img src="<?php echo base_url() ?>images/icono_calendario_regular.png"/>
                </li>
                <li>
                    <?php if ($paquetes[1]->cupones > 0): ?>
                        <div class="cantidades_detalle_paquete_regular"><?php echo $paquetes[1]->cupones ?></div>
                        <img src="<?php echo base_url() ?>images/icono_ticket_regular.png"/>
                    <?php else: ?>
                        <div class="cantidades_detalle_paquete_of"><?php echo $paquetes[1]->cupones ?></div>
                        <img src="<?php echo base_url() ?>images/icono_ticket_of.png"/>
                    <?php endif; ?>
                </li>

                <li>
                    <?php if ($paquetes[1]->videos > 0): ?>
                        <div class="cantidades_detalle_paquete_regular"><?php echo $paquetes[1]->videos ?></div>
                        <img src="<?php echo base_url() ?>images/icono_video_regular.png"/>
                    <?php else: ?>
                        <div class="cantidades_detalle_paquete_of"><?php echo $paquetes[1]->videos ?></div>
                        <img src="<?php echo base_url() ?>images/icono_video_of.png"/>
                    <?php endif; ?>
                </li>

            </ul>
        </div>

    </div>

</a>
<a href="<?php echo base_url() ?>#" class="paquete_comprar reset"
   data-paquete='{"id":"<?php echo $paquetes[2]->paqueteID ?>","nombre":"<?php echo $paquetes[2]->nombrePaquete ?>","vigencia":"<?php echo $paquetes[2]->vigencia ?>","precio":"<?php echo $paquetes[2]->precio ?>","caracteres":"<?php echo $paquetes[2]->caracteres ?>","cantFotos":"<?php echo $paquetes[2]->cantFotos ?>","videos":"<?php echo $paquetes[2]->videos ?>","cupones":"<?php echo $paquetes[2]->cupones ?>"}'>
    <div class="paquetes_derecha">
        <div class="title_paquetes">
            <div class="lateral_premium"></div>
            <img src="<?php echo base_url() ?>images/perrito_premium.png" class="margen"/> <font
                class="title_paquetes_titilos"> PAQUETE <?php echo strtoupper($paquetes[2]->nombrePaquete) ?> </font>

        </div>
        <div class="precio_paquete_premium"> $<?php echo $paquetes[2]->precio ?></div>
        <br/>

        <div class="descripcion_paquetes">
            <strong>Incluye:</strong>
            <ul class="contenido_paquetes">
                <li>
                    * <?php echo $paquetes[2]->cantFotos ?> fotos
                </li>
                <li>
                    * Texto de <?php echo $paquetes[2]->caracteres ?> caracteres
                </li>
                <li>
                    * <?php echo $paquetes[2]->videos ?> video(s)
                </li>
                <li>
                    * <?php echo $paquetes[2]->cupones ?> cupones
                </li>
                <li>
                    * Vigencia de <?php echo $paquetes[2]->vigencia ?> días
                </li>
            </ul>
        </div>
        <div class="iconos_paquetes">
            <ul>
                <li>
                    <div class="cantidades_detalle_paquete_premium"><?php echo $paquetes[2]->cantFotos ?></div>
                    <img src="<?php echo base_url() ?>images/icono_camara_premium.png"/>
                </li>
                <li>
                    <div class="cantidades_detalle_paquete_premium"> <?php echo $paquetes[2]->caracteres ?></div>
                    <img src="<?php echo base_url() ?>images/icono_texto_premium.png">
                </li>
                <li>
                    <div class="cantidades_detalle_paquete_premium"><?php echo $paquetes[2]->vigencia ?></div>
                    <img src="<?php echo base_url() ?>images/icono_calendario_premium.png"/>
                </li>
                <li>
                    <?php if ($paquetes[2]->cupones > 0): ?>
                        <div class="cantidades_detalle_paquete_premium"><?php echo $paquetes[2]->cupones ?></div>
                        <img src="<?php echo base_url() ?>images/icono_ticket_premium.png"/>

                    <?php else: ?>
                        <div class="cantidades_detalle_paquete_of"><?php echo $paquetes[2]->cupones ?></div>
                        <img src="<?php echo base_url() ?>images/icono_ticket_of.png"/>
                    <?php endif; ?>
                </li>
                <li>
                    <?php if ($paquetes[2]->videos > 0): ?>
                        <div class="cantidades_detalle_paquete_premium"><?php echo $paquetes[2]->videos ?></div>
                        <img src="<?php echo base_url() ?>images/icono_video_premium.png"/>
                    <?php else: ?>
                        <div class="cantidades_detalle_paquete_of"><?php echo $paquetes[2]->videos ?></div>
                        <img src="<?php echo base_url() ?>images/icono_video_of.png"/>
                    <?php endif; ?>
                </li>
            </ul>
        </div>
    </div>
</a>
</div>
<!-- Contenedor de paquetes  -->
</div><!-- Contenedor central -->

<!-- Contenedor De secciones de contenido -->
<div id = "prueba" style= "display:block;overflow:hidden;width:1000px !important;min-height:250px;">
<!-- Inician secciones de contenido -->
<!-- perros perdidos -->
    <div id="perros_perdidos" class="seccion_inferior_izquierda">
        <a href="<?php echo base_url() ?>perdidos" style="text-decoration:none; color:#000;" onmouseover="Mostrar('ver_perdidos');Ocultar('ver_raza');Ocultar('ver_mes');Ocultar('ver_curiosos');">
            <div class="contenido_secciones">
                <p class="titulo_segunda_seccion"> PERROS PERDIDOS </p>
                <p><strong> Nombre:</strong> <?=$contenidosP->titulo?>
                    <strong>Raza:</strong> <?=$contenidosP->raza?>
                    <strong>Caracteristicas:</strong> <?=substr($contenidosP->descripcion,0,20)?>...</p>
            </div>
            <div class="sub_imagenes_dos">
                <img align="center" style="width:50%; max-width:150px;" class="imagen_relleno" src="<?php echo base_url() ?><?=$contenidosP->foto?>"/>
            </div> 
            <div id="ver_perdidos" class="ver_mas" style=" display:none;"> Ver más...</div>
         </a>
    </div>
<!-- End perros perdidos -->
<!-- Raza del mes -->
<div id="la_raza_mes" class="seccion_inferior_izquierda">
    <a href="<?php echo base_url() ?>raza" style="text-decoration:none; color:#000;" onmouseover="Mostrar('ver_raza'); Ocultar('ver_perdidos');Ocultar('ver_mes'); Ocultar('ver_curiosos')">
        <div class="contenido_secciones">
            <p class="titulo_segunda_seccion"> LA RAZA DEL MES </p>
            <p>
                <?=substr($contenidos[0]->origenes,0,40)?>
            </p>
        </div>
        <div class="sub_imagenes_dos">
            <?php 
            if($fotocontenido != null){
                foreach($fotocontenido as $foto){
                    if($foto->contenidoID == $contenidos[0]->contenidoID){?>
                        <img align="center" class="imagen_relleno" src="<?php echo base_url() ?>images/raza_mes/<?=$foto->foto;?>" width="87" height="103"/>
                    <?php } 
                }
            }?>
        </div>
        <div id="ver_raza" class="ver_mas" style=" display:none;"> Ver más...</div>
    </a>

<!-- End raza del mes -->
<!-- Eventos del mes -->
</div>
<div id="eventos_mes" class="seccion_inferior">
    <a href="<?php echo base_url() ?>evento" style="text-decoration:none; color:#000;" onmouseover="Mostrar('ver_mes');Ocultar('ver_raza'); Ocultar('ver_perdidos');Ocultar('ver_curiosos');">
        <div class="contenido_secciones">
            <p class="titulo_segunda_seccion"> EVENTOS DEL MES </p>
            <p> <strong>Título:</strong> <?=$contenidosE[0]->nombre?><br />
                <strong>Fecha del evento:</strong> <?=$contenidosE[0]->fecha?>
            </p>
        </div>
        <div class="sub_imagenes_dos">
            <?php if($fotocontenido != null){
                foreach($fotocontenido as $p){
                    if($p->contenidoID == $contenidosE[0]->contenidoID){?>
                        <img class="imagen_relleno" src="<?php echo base_url() ?>images/eventos/<?=$p->foto?>" width="144" height="110"/>
                        <?php }
                    }
            }?>
        </div>
        <div id="ver_mes" class="ver_mas" style=" display:none;"> Ver más...</div>
    </a>
</div>

<!-- End eventos del mes -->
<!-- Datos curiosos -->
<div id="datos_curiosos" class="seccion_inferior_derecha">
    <a href="<?php echo base_url() ?>curiosos" style="text-decoration:none; color:#000;" onmouseover="Mostrar('ver_curiosos');Ocultar('ver_raza'); Ocultar('ver_perdidos');Ocultar('ver_mes');">
        <div class="contenido_secciones">
            <p class="titulo_segunda_seccion"> DATOS CURIOSOS </p>
            <p>
                <?=substr($contenidosD[0]->texto,0,60)?>...
            </p>
        </div>
        <div class="sub_imagenes_dos">
            <?php if($fotocontenido != null){
                foreach($fotocontenido as $p){
                    if($p->contenidoID == $contenidosD[0]->contenidoID){?>
                        <img class="imagen_relleno" src="<?php echo base_url() ?>images/datos_curiosos/<?=$p->foto?>" width="63" height="119"/>
                    <?php }
                }
            }?>
        </div>
        <div id="ver_curiosos" class="ver_mas" style=" display:none;"> Ver más...</div>
    </a>
</div>
<!-- End datos curioso -->
</div>
</div>
<div class="separacion_final"></div>

<?php $this->load->view('general/footer_view'); ?>

<script src="<?php echo base_url() ?>js/bootstrap.min.js"></script>
<script>
    $('#artCarousel').carousel({
        interval: 4000,
        effect: 'random',
        cycle: true
    });
</script>
</body>
</html>
