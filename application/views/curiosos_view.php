<!--<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es-419">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Datos curiosos-Quierounperro.com</title>
<link rel="shortcut icon" href="<?php echo base_url() ?>images/ico.ico" />  
<link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>css/reset.css" media="screen"></link>
 <link rel="stylesheet" href="css/jPages.css">
 <?php //$this->load->view('general/LoginFiles');?>
<link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>css/general.css" media="screen"></link>
<link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>css/venta.css" media="screen"></link>
<link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>css/directorio.css" media="screen"></link> 

   <script src="<?php echo base_url() ?>js/jquery-1.10.2.js"></script>
     <script src="<?php echo base_url() ?>js/jPages.js"></script>
   <script src="<?php echo base_url() ?>js/jquery-ui.js"></script>
   <script type="text/javascript" src="<?php echo base_url() ?>js/jquery.cycle.all.js"></script>
   <script src="<?php echo base_url() ?>js/funciones_.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>js/funciones_curiosos.js" type="text/javascript"></script>-->

<?php $this->load->view('general/LoginFiles');?>
<?php
$this->load->view('general/general_header_view', array('title' => 'Datos Curiosos',
  'links'                                                      => array('venta'), 'scripts' => array('funciones_curiosos')))
  ?>
<link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>css/curiosos.css" media="screen"></link>

</head>

<body>





<?php $this->load->view('general/menu_view')?>

<div class="titulo_seccion">
DATOS CURIOSOS

</div>
<div class="contenedor_buscador">

</div>

<div id="contenedor_central">
<?php $this->load->view('general/contTest');?>

<div class="central_curiosos"> 
  
<div class="contenedor_datos_curiosos">
<div class="franja_verde">  </div>
<?php if($fotoscontenido != null){ 
foreach ($fotoscontenido as $fc){
  if($fc->contenidoID == $contenidos[0]->contenidoID){?>
<div class="contenedor_imagen_verde"><img src="<?php echo base_url() ?>images/datos_curiosos/<?=$fc->foto?>" width="100%" height="100%"/> </div>
<?php }
}
}?>
<div class="titulo_verde"> <?=$contenidos[0]->nombre?> </div>
<div class="contendor_descripcion_curioso"> <?=substr($contenidos[0]->texto,0,60)?>...</div>
<div class="ver_mas_verde" onclick="window.location.href = '<?=base_url()?>curiosos/detalle/<?=$contenidos[0]->contenidoID?>'"> Ver más.. </div>
  </div>  
<div class="margen_20">  </div>

<div class="contenedor_datos_curiosos"> 
<div class="franja_amarilla"> </div>
<?php if($fotoscontenido != null){ 
foreach ($fotoscontenido as $fc){
  if($fc->contenidoID == $contenidos[1]->contenidoID){?>
<div class="contenedor_imagen_amarilla"><img src="<?php echo base_url() ?>images/datos_curiosos/<?=$fc->foto?>" width="100%" height="100%"/> </div>
<?php }
}
}?>
<div class="contenido_horizontal"> <?=$contenidos[1]->nombre?> </div>
<div class="contenido_texto_horizal"> <?=substr($contenidos[1]->texto,0,60)?> ... </div>
<div class="ver_mas_amarillo" onclick="window.location.href = '<?=base_url()?>curiosos/detalle/<?=$contenidos[1]->contenidoID?>'"> Ver más... </div>

 </div>
 <div class="margen_horizontal"> </div>


 <div class="contenedor_datos_curiosos">
 <div class="titulo_horizontal"><?=$contenidos[2]->nombre?></div>
 <div class="contenido_texto_horizal"> <?=substr($contenidos[2]->texto,0,60)?></div>
 <div class="ver_mas_naranja" onclick="window.location.href ='<?=base_url()?>curiosos/detalle/<?=$contenidos[2]->contenidoID?>'"> Ver más... </div>
 
 <div class="contenedor_imagen_horizontal_naranja"> <?php if($fotoscontenido != null){ 
foreach ($fotoscontenido as $fc){
  if($fc->contenidoID == $contenidos[2]->contenidoID){?>
<div class="contenedor_imagen_naranja"><img src="<?php echo base_url() ?>images/datos_curiosos/<?=$fc->foto?>" width="100%" height="100%" /> </div>
<?php }
}
}?></div>
 <div class="franja_naranja"> </div>  
  </div>
  
  <div class="margen_20"> </div>
<div class="contenedor_datos_curiosos">
<div class="titulo_azul"><?=$contenidos[3]->nombre?></div>
<div class="contendor_descripcion_curioso_azul"> <?=substr($contenidos[3]->texto,0,60)?></div>
<div class="ver_mas_azul" onclick="window.location.href = '<?=base_url()?>curiosos/detalle/<?=$contenidos[3]->contenidoID?>'"> Ver más.. </div>
<?php if($fotoscontenido != null){ 
foreach ($fotoscontenido as $fc){
  if($fc->contenidoID == $contenidos[3]->contenidoID){?>
<div class="contenedor_imagen_azul"><img src="<?php echo base_url() ?>images/datos_curiosos/<?=$fc->foto?>" width="100%" height="100%"/>  </div>
<?php }
}
}?>

<div class="franja_azul"> </div>
 </div>

</div>
<div id="slideshow_anuncio" class="contenedor_banner"> 
<?php $banner = $this->session->userdata('banner'); ?>
                <?php
                if (is_logged() && ($this->session->userdata('tipoUsuario') == 2 || $this->session->userdata('tipoUsuario') == 3)) {
                    if ($banner != null) {

                        foreach ($banner as $contenido) {
                            if ($this->session->userdata('zonaID') == $contenido->zonaID && $contenido->posicion == 3 && $contenido->seccionID == $seccion) {
                                ?>
                                <img src="<?php echo base_url()?>images/<?php echo $contenido->imgbaner; ?>" width="200" height="476"/>
                            <?php
                            }
                        }
                    }
                } else {

                    if ($banner !== null && !empty($banner)) {
                        foreach ($banner as $contenido) {
                            if ($contenido->zonaID == 9 && $contenido->posicion == 3 && $contenido->seccionID == $seccion) {
                                ?>
                                <img src="<?php echo base_url()?>images/<?php echo $contenido->imgbaner; ?>" width="200" height="476"/>
                            <?php
                            }
                        }
                    }
                }
                ?> 
 </div>

 </div>     
</br>
</br>
</br>
</br>    
<div class="division_menu_inferior"></div>
<?php $this->load->view('general/footer_view');?>
</body>
</html>