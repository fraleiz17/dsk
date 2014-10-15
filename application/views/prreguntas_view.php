
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es-419">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Preguntas Frecuentes-Quierounperro.com</title>
<link rel="shortcut icon" href="<?php echo base_url()?>images/ico.ico" />  
<link type="text/css" rel="stylesheet" href="<?php echo base_url()?>css/reset.css" media="screen"/>
 <link rel="stylesheet" href="<?php echo base_url()?>css/jPages.css">
<script>
if (navigator.userAgent.toLowerCase().indexOf('chrome') > -1){

  document.write('<link type="text/css" rel="stylesheet" href="<?php echo base_url()?>css/general.css" media="screen"></link> <link type="text/css" rel="stylesheet" href="<?php echo base_url()?>css/venta.css" media="screen"></link><link type="text/css" rel="stylesheet" href="<?php echo base_url()?>css/mi_perfil.css" media="screen"></link>');
  }
  </script>
<!--   <script src="<?php echo base_url()?>js/jquery-1.10.2.js"></script>-->
    <script type="text/javascript" src="<?php echo base_url() ?>js/jquery-1.8.2.min.js"></script>
     <script src="<?php echo base_url()?>js/jPages.js"></script>
     <script src="<?php echo base_url()?>js/funciones_venta.js"></script>
     <script src="<?php echo base_url()?>js/funciones_negocio.js"></script>
   <script src="<?php echo base_url()?>js/jquery-ui.js"></script>
   <script src="<?php echo base_url()?>js/funciones_index.js"></script>
   <script type="text/javascript" src="<?php echo base_url()?>js/jquery.cycle.all.js"></script>
   <script src="<?php echo base_url()?>js/funciones_.js" type="text/javascript"></script>
       <link rel="shortcut icon" href="<?php echo base_url() ?>images/ico.ico"/>
    <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>css/reset.css" media="screen"></link>

    <link rel="stylesheet" href="<?php echo base_url() ?>css/nivo-slider.css" type="text/css" media="screen"/>
    <link rel="stylesheet" href="<?php echo base_url() ?>css/responsiveslides.css">
    <link href="<?php echo base_url() ?>css/bootstrap.min.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="<?php echo base_url() ?>css/validator/validationEngine.jquery.css" type="text/css"/>

    <script type="text/javascript" src="<?php echo base_url() ?>js/jquery-1.8.2.min.js"></script>
    <script type="text/javascript"
            src="<?php echo base_url() ?>js/validator/languages/jquery.validationEngine-es.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>js/validator/jquery.validationEngine.js"></script>


    <!--<script src="<?php echo base_url() ?>js/jquery-latest.js" type="text/javascript"></script>-->
    <script src="<?php echo base_url() ?>js/funciones_.js" type="text/javascript"></script>


  <link type="text/css" rel="stylesheet" href="<?php echo base_url()?>css/index_.css" media="screen"></link> <link type="text/css" rel="stylesheet" href="<?php echo base_url()?>css/general.css" media="screen"></link> 

    <!-- [if lt IE ]>
    <link type="text/css" rel="stylesheet" href="<?php echo base_url()?>css/index_explorer.css" media="screen"></link>
    <![endif]-->

    <!-- <script src="<?php echo base_url() ?>js/jquery_1.4.js" type="text/javascript"></script>-->
    <!-- <script src="<?php echo base_url() ?>js/jquery-1.10.2.js"></script>
 <script src="<?php echo base_url() ?>js/jquery.validate.js" type="text/javascript"></script>-->
    <script src="<?php echo base_url() ?>js/funciones_index.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>js/jquery.nivo.slider.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>js/responsiveslides.min.js"></script>
    <script src="<?php echo base_url() ?>js/jquery-ui.js"></script>
    <!-- include jQuery library -->

    <!-- include Cycle plugin -->
    <script type="text/javascript" src="<?php echo base_url() ?>js/jquery.cycle.all.js"></script>

  <link type="text/css" rel="stylesheet" href="<?php echo base_url()?>css/general.css" media="screen"></link>
  <link rel="stylesheet" href="<?php echo base_url() ?>css/mi_perfil.css" type="text/css"/>
  
  
  <link rel="stylesheet" href="<?php echo base_url() ?>css/validator/validationEngine.jquery.css" type="text/css"/>


    <script type="text/javascript"
            src="<?php echo base_url() ?>js/validator/languages/jquery.validationEngine-es.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>js/validator/jquery.validationEngine.js"></script> 
   <script src="<?php echo base_url() ?>js/funciones_quienes.js" type="text/javascript"></script>
  <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>css/quienes.css" media="screen"></link>


  <link type="text/css" rel="stylesheet" href="<?=base_url()?>css/preguntas_frecuentes.css" media="screen"></link>
  
 <script type="text/javascript">
  jQuery(document).ready(function () {
            // binds form submission and fields to the validation engine
            jQuery("form").validationEngine({
                promptPosition: "topRight",
                scroll: false,
                ajaxFormValidation: false,
                ajaxFormValidationMethod: 'post',
            });


        });
</script> 


</head>

<body>


<div id="iconos_ocultos" class="iconos_ocultos">


<ul class="iconos_estatus">
        <li   <?php if ($this->session->userdata('idUsuario') !== FALSE): ?>  onclick="window.location='<?= base_url() ?>carrito';" <?php else: ?>  <?php endif; ?>>

            <img id="horizontal_compras_mini"
                 onmouseover="mostrar_icono('horizontal_compras'); ocultar_icono('horizontal_compras_mini');"
                 class="iconos_flotantes" src="<?php echo base_url() ?>images/compras_horizontal_mini.png"/>

            <img class="iconos_flotantes2"
                 onmouseout="mostrar_icono('horizontal_compras_mini'); ocultar_icono('horizontal_compras');"
                 id="horizontal_compras" src="<?php echo base_url() ?>images/compras_horizontal.png"
               />

        </li>
        <li <?php if ($this->session->userdata('idUsuario') !== FALSE): ?>
       <?php else: ?> onclick="muestra('contenedor_login');oculta('envio_con');muestra('ingreso_normal');" <?php endif; ?>>
            <img id="horizontal_ingresar_mini"
                 onmouseover="mostrar_icono('horizontal_ingresar'); ocultar_icono('horizontal_ingresar_mini');"
                 class="iconos_flotantes" src="<?php echo base_url() ?>images/ingresar_horizontal_mini.png"/>

            <img class="iconos_flotantes2"
                 onmouseout="mostrar_icono('horizontal_ingresar_mini'); ocultar_icono('horizontal_ingresar');"
                id="horizontal_ingresar"
                 src="<?php echo base_url() ?>images/ingresar_horizontal.png"/>
        </li>

        <li  <?php if ($this->session->userdata('idUsuario') !== FALSE): ?>  <?php else: ?>onclick="muestra('contenedor_registro');" <?php endif; ?>>
            <img id="horizontal_registrate_mini"
                 onmouseover="mostrar_icono('horizontal_registrate'); ocultar_icono('horizontal_registrate_mini');"
                 class="iconos_flotantes" src="<?php echo base_url() ?>images/registrate_horizontal_mini.png"/>

            <img class="iconos_flotantes2"
                 onmouseout="mostrar_icono('horizontal_registrate_mini'); ocultar_icono('horizontal_registrate');"
                 id="horizontal_registrate" src="<?php echo base_url() ?>images/registrate_horizontal.png"/>
        </li>
    </ul>
</div>

<?php $this->load->view('general/menu_view')?>
<div class="titulo_seccion">
PREGUNTAS FRECUENTES

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
             <img src="images/indicador_si.png" title="Ya estas logueado">
             <?php else: ?>
             <img src="images/indicador_no.png">
             <?php endif; ?>
              </div>
            <img src="<?php echo base_url() ?>images/sesion.png"/></li> 
            
        <li <?php if ($this->session->userdata('idUsuario') !== FALSE): ?>  <?php else: ?>onclick="muestra('contenedor_registro');" <?php endif; ?>>
            <div class="indicador"> 
            <?php if ($this->session->userdata('idUsuario') !== FALSE): ?>
             <img src="images/indicador_si.png" title="Ya estas registrado">
             <?php else: ?>
             <img src="images/indicador_no.png">
             <?php endif; ?>
             </div>
            <img src="<?php echo base_url() ?>images/registrate.png"/>
        </li>
    </ul>
</div>

<div class="central_frecuentes"> 
<p> 
<?php if ($banner !== null && !empty($banner)) {
                        foreach ($banner as $contenido) {
                            if ($contenido->zonaID == 9 && $contenido->posicion == 2 && $contenido->seccionID == 15) {
                                echo $contenido->texto;
                            }
                        }
                    }
?>
</p>




 </div>

<div id="slideshow_anuncio" class="contenedor_banner"> 
<img src="<?php echo base_url() ?>images/6.png" />
<img src="<?php echo base_url() ?>images/6.png" />
 </div>


<a href="#"  class="paquete_comprar reset"
   data-paquete='{"id":"<?php echo $paquetes[0]->paqueteID ?>","nombre":"<?php echo $paquetes[0]->nombrePaquete ?>","vigencia":"<?php echo $paquetes[0]->vigencia ?>","precio":"<?php echo $paquetes[0]->precio ?>","caracteres":"<?php echo $paquetes[0]->caracteres ?>","cantFotos":"<?php echo $paquetes[0]->cantFotos ?>","videos":"<?php echo $paquetes[0]->videos ?>","cupones":"<?php echo $paquetes[0]->cupones ?>"}'> 
<div class="contenedor_paque_mini">
<img src="<?php echo base_url() ?>images/ico_lite.png" width="50" height="50"/><p class="nombre_paquete"> PAQUETE LITE </p>
<div class="franja_naranja"> </div>
 </div>
</a>

<a href="#"  class="paquete_comprar reset"
   data-paquete='{"id":"<?php echo $paquetes[1]->paqueteID ?>","nombre":"<?php echo $paquetes[1]->nombrePaquete ?>","vigencia":"<?php echo $paquetes[1]->vigencia ?>","precio":"<?php echo $paquetes[1]->precio ?>","caracteres":"<?php echo $paquetes[1]->caracteres ?>","cantFotos":"<?php echo $paquetes[1]->cantFotos ?>","videos":"<?php echo $paquetes[1]->videos ?>","cupones":"<?php echo $paquetes[1]->cupones ?>"}'> 
 <div class="contenedor_paque_mini" style="margin-left:9px; margin-right:9px;">
<img src="<?php echo base_url() ?>images/ico_regular.png" width="50" height="50"/><p class="nombre_paquete"> PAQUETE REGULAR </p>
<div class="franja_verde"> </div>
 </div>
</a>

<a href="#"  class="paquete_comprar reset"
   data-paquete='{"id":"<?php echo $paquetes[2]->paqueteID ?>","nombre":"<?php echo $paquetes[2]->nombrePaquete ?>","vigencia":"<?php echo $paquetes[2]->vigencia ?>","precio":"<?php echo $paquetes[2]->precio ?>","caracteres":"<?php echo $paquetes[2]->caracteres ?>","cantFotos":"<?php echo $paquetes[2]->cantFotos ?>","videos":"<?php echo $paquetes[2]->videos ?>","cupones":"<?php echo $paquetes[2]->cupones ?>"}'> 
 <div class="contenedor_paque_mini">
<img src="<?php echo base_url() ?>images/ico_premium.png" width="50" height="50"/><p class="nombre_paquete"> PAQUETE PREMIUM </p>
<div class="franja_morada"> </div>
 </div>
</a>

 </div>     
</br>
</br>
</br>
</br> 


<div id="contenedor_publicar_anuncio" class="contenedor_publicar" style=" display:none">

    <!-- Inicio contenedor pap publicar anuncio aunucio !-->
    <div id="publicar_anuncio" class="pubicar_anuncio_mini">
        <?php $this->load->view('partial/_pasos_anuncio', array('paquetes' => $paquetes, 'estados' => $estados, 'razas' => $razas,'cupones' => $cupones)); ?>

    </div>
</div>

<div class="slideshow_tres" >
<?php $banner = $this->session->userdata('banner'); ?>
                <?php
                if (is_logged() && ($this->session->userdata('tipoUsuario') == 2 || $this->session->userdata('tipoUsuario') == 3)) {
                    if ($banner != null) {

                        foreach ($banner as $contenido) {
                            if ($this->session->userdata('zonaID') == $contenido->zonaID && $contenido->posicion == 3 && $contenido->seccionID == $seccion) {
                                ?>
                                <img src="<?php echo base_url()?>images/<?php echo $contenido->imgbaner; ?>" width="638" height="93"/>
                            <?php
                            }
                        }
                    }
                } else {

                    if ($banner !== null && !empty($banner)) {
                        foreach ($banner as $contenido) {
                            if ($contenido->zonaID == 9 && $contenido->posicion == 3 && $contenido->seccionID == $seccion) {
                                ?>
                                <img src="<?php echo base_url()?>images/<?php echo $contenido->imgbaner; ?>" width="638" height="93"/>
                            <?php
                            }
                        }
                    }
                }
                ?>
	</div> 
<div class="division_menu_inferior"></div>
<?php $this->load->view('general/footer_view');?>
</body>
</html>
