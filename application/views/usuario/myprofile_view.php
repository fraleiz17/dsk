
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es-419">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Mi Perfil-Quierounperro.com</title>
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
  


</head>

<body>
<?php
  $contrasena = $this->session->userdata('recuperarusuario');
  ?> 
<script type="text/javascript">
var busy = false;
$(document).ready(function() { 
<?php if($contrasena): ?>
        $('#contrasenaActual').removeClass('validate[required]');
        $('#contrasenaActual').attr('disabled', 'disabled');
        muestra('contenedor_cambiar_contrasena');
  <?php endif; ?>


getView('<?=base_url()?>usuario/cuenta/miPerfil/');
 /****************************************/ 
                   $(".ajaxLink").live(
                       'click',
                        function(e){                            
                            e.preventDefault();
							               var clase = $(this).attr('id');
							               $(".icono_seleccion").removeClass("icono_seleccion");
                                $('.'+clase).addClass("icono_seleccion");                       
                                var gotoURL = $(this).attr('href');
                                $("#appSectionContainer").html();
                                getView(gotoURL);                                                             
                        }
                    );	
	


$('#editarContrasena').submit(function(e) {
			e.preventDefault();
			$.ajax({
				url : "<?=base_url()?>usuario/cuenta/editar_contrasena",
				type : 'POST',
				dataType : 'json',
				data : $(this).serialize(),
				success : function(data) {
					console.log(data.response);
					if(data.response==true){
						oculta('contenedor_cambiar_contrasena');
						muestra('contenedor_cambiar_contrasena_correcto');
					}
					else{
						oculta('contenedor_cambiar_contrasena');
						muestra('contenedor_cambiar_contrasena_error');
					}
				}
			})
		});
});
jQuery(document).ready(function(){
	
			// binds form submission and fields to the validation engine
			jQuery("form").validationEngine({
				promptPosition           : "topRight",
				scroll                   : false,
				ajaxFormValidation       : false,
				ajaxFormValidationMethod : 'post'
			});

     
});
function getView(viewURL){
                busy = true;
                $("#appSectionContainer").children().remove();
                $("#appSectionContainer").load(viewURL, function(){                    
                    $(".hidden").stop().fadeIn('fast', function(){
                        busy = false;
                        // $('#TIbody').css('cursor', 'default');
                    });       
                });
            }
	
</script>
<div id="contenedor_cambiar_contrasena" class="contenedor_anuncio_detalle" style="display:none;">
<div class="cerrar_registro"> <img src="<?php echo base_url()?>images/cerrar.png" onclick="oculta('contenedor_cambiar_contrasena');"/> </div>
<form action="#" method="post" id="editarContrasena">
<div class="contenedor_contrasena">
<div class="contenedor_titulo">
<p> CAMBIAR CONTRASEÑA </p>
</div>
<div class="contenido_contrasena">
<p id="contrasenaActualP"> Contraseña actual:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text"  class="background_morado validate[required]" name="contrasenaActual" id="contrasenaActual" /> </p>

<p> Nueva contraseña:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" class="background_morado validate[required],maxSize[8]" name="contrasena1" id="contrasena1"/> </p>

<p> Confirmar contraseña: <input type="password" class="background_morado validate[required,equals[contrasena1]],maxSize[8]" name="contrasena2"/> </p>


</div>

</br>
</br>
<ul class="morado_boton">
<li>
<input type="submit" value="Editar" class="el_submit"/>
</li>
</ul> 
</div>
</form>
</div>


<div id="contenedor_cambiar_contrasena_correcto" class="contenedor_anuncio_detalle" style="display:none;">
<div class="cerrar_registro"> <img src="<?php echo base_url()?>images/cerrar.png" onclick="oculta('contenedor_cambiar_contrasena_correcto');"/> </div>
<div class="contenedor_contrasena">
<div class="contenedor_titulo">
<p> CAMBIAR CONTRASEÑA </p>
</div>
<div class="contenido_contrasena">
<div class="palomita">
<img src="<?php echo base_url()?>images/palimita_morada.png"/>
</div>
<div class="contenido_contrasena_notificacion">
Tu contraseña ha sido modificada con exito.
Se ha enviado una copia al email: <?=$this->session->userdata('correo');?>
</div>

</div>

</br>
</div>
</div>

<div id="contenedor_cambiar_contrasena_error" class="contenedor_anuncio_detalle" style="display:none;">
<div class="cerrar_registro"> <img src="<?php echo base_url()?>images/cerrar.png" onclick="oculta('contenedor_cambiar_contrasena_error');"/> </div>
<div class="contenedor_contrasena">
<div class="contenedor_titulo">
<p> CAMBIAR CONTRASEÑA </p>
</div>
<div class="contenido_contrasena">
<div class="palomita">
<img src="<?php echo base_url()?>images/tache_morada.png"/>
</div>
<div class="contenido_contrasena_notificacion">
<strong> Ha ocurrido un error. </strong>
<p> Intentelo nuevamente</p>
</div>

</div>

</br>
</div>
</div>


<?php $this->load->view('general/menu_view'); ?>




<!-- Fin del contenedor publicar anucio fondo negro 

<div class="menu_principal" id="menu_principal" >
<div id="contenedor_menu_principal" class="contenedor_menu_principal"> 
<ul class="principal">
<li>
<a href="<?php echo base_url()?>"> Inicio </a>
</li>
<li>
<a href="<?php echo base_url()?>"> Venta </a>
</li>
<li>
Cruza
</li>
<li>
Adopción
</li>
<li>
<a href="<?=base_url()?>principal/tienda">Tienda</a>
</li>
<li>
Directorio
</li>
</ul>
</div>
</div> -->

<div class="titulo_seccion">
MI PERFIL
</div>
<div class="contenedor_menu_perfil">
<ul class="menu_perfil">
<li class="icono_seleccion mi_perfil">
<p style="margin-top:13px; margin-left:10px;"><a id="mi_perfil" href="<?=base_url()?>usuario/cuenta/miPerfil/" style="text-decoration:none;color:white;" class="ajaxLink">Mi Perfil</a></p>
</li>
<li class="anuncios">
<p style="margin-top:5px; margin-left:10px;"><a id="anuncios" href="<?=base_url()?>usuario/cuenta/anuncios/" style="text-decoration:none;color:white;" class="ajaxLink"> Admin. Anuncios</a> </p>
</li>
<li class="mensajes">
<p style="margin-top:5px; margin-left:10px;"><a id="mensajes" href="<?=base_url()?>usuario/cuenta/mensajes/" style="text-decoration:none;color:white;" class="ajaxLink"> Mensajes</a> </p>
</li>
<li class="cupones">
<p style="margin-top:5px; margin-left:10px;"><a id="cupones" href="<?=base_url()?>usuario/cuenta/cupones/" style="text-decoration:none;color:white;" class="ajaxLink"> Cupones</a> </p>
</li>
<li class="favoritos">
<p style="margin-top:5px; margin-left:10px;"><a id="favoritos" href="<?=base_url()?>usuario/cuenta/favoritos/" style="text-decoration:none;color:white;" class="ajaxLink">Favoritos</a> </p>
</li>
<li class="soporte">
<p style="margin-top:5px; margin-left:10px;"><a id="soporte" href="<?=base_url()?>usuario/cuenta/soporte/" style="text-decoration:none;color:white;" class="ajaxLink">Soporte Tecnico</a> </p>
</li>
<li class="facturas">
<p style="margin-top:5px; margin-left:10px;"><a id="facturas" href="<?=base_url()?>usuario/cuenta/facturas/" style="text-decoration:none;color:white;" class="ajaxLink">Mis Facturas</a> </p>
</li>
</ul>


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


<div class="contenedor_central" style="margin-bottom:45px;">
<div id="appSectionContainer">
</div>
</div>
	  
	  
	  <div class="seccion_derecha_paquetes">
<ul class="aqui_crear_anuncio">
<li onclick="muestra('contenedor_publicar_anuncio');">

</li>
</ul>
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
    



<div id="contenedor_publicar_anuncio" class="contenedor_publicar" style=" display:none">

    <!-- Inicio contenedor pap publicar anuncio aunucio !-->
    <div id="publicar_anuncio" class="pubicar_anuncio_mini">
        <?php $this->load->view('partial/_pasos_anuncio', array('paquetes' => $paquetes, 'estados' => $estados, 'razas' => $razas,'cupones' => $cupones)); ?>

    </div>
</div>
  
<div class="division_menu_inferior" style="display:block;overflow:hidden"></div>
<?php $this->load->view('general/footer_view');?>
</body>
</html>

