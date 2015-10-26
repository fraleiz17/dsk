<?php $this->load->view('general/LoginFiles');?>
<?php
$this->load->view('general/general_header_view', array('title' => 'Datos Curiosos',
  'links'                                                      => array('venta'), 'scripts' => array('funciones_curiosos')))
  ?>
<link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>css/curiosos.css" media="screen"></link>
<style>.resp{ max-width:100%; max-height:100%;margin:auto;display:block;}</style>
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
<div class="contenedor_imagen_verde">
  <img class="resp" src="<?php echo base_url() ?>images/datos_curiosos/<?=$fc->foto?>"/> 
</div>
<?php }
}
}?>
<div class="titulo_verde"> <?=$contenidos[0]->nombre?> </div>
<div class="contendor_descripcion_curioso"> <?=substr($contenidos[0]->texto,0,60)?>...</div>
<div class="ver_mas_verde" onclick="window.location.href = '<?=base_url()?>curiosos/detalle/<?=$contenidos[0]->contenidoID?>/1'"> Ver más.. </div>
  </div>  
<div class="margen_20">  </div>
<div class="contenedor_datos_curiosos"> 
<div class="franja_amarilla"> </div>
<?php if($fotoscontenido != null){ 
foreach ($fotoscontenido as $fc){
  if($fc->contenidoID == $contenidos[1]->contenidoID){?>
<div class="contenedor_imagen_amarilla">
  <img class="resp" src="<?php echo base_url() ?>images/datos_curiosos/<?=$fc->foto?>"/> </div>
<?php }
}
}?>
<div class="contenido_horizontal"> <?=$contenidos[1]->nombre?> </div>
<div class="contenido_texto_horizal"> <?=substr($contenidos[1]->texto,0,60)?> ... </div>
<div class="ver_mas_amarillo" onclick="window.location.href = '<?=base_url()?>curiosos/detalle/<?=$contenidos[1]->contenidoID?>/2'"> Ver más... </div>
 </div>
 <div class="margen_horizontal"> </div>
<div class="contenedor_datos_curiosos">
 <div class="titulo_horizontal"><?=$contenidos[2]->nombre?></div>
 <div class="contenido_texto_horizal"> <?=substr($contenidos[2]->texto,0,60)?></div>
 <div class="ver_mas_naranja" onclick="window.location.href ='<?=base_url()?>curiosos/detalle/<?=$contenidos[2]->contenidoID?>/1'"> Ver más... </div>
 
 <div class="contenedor_imagen_horizontal_naranja"> <?php if($fotoscontenido != null){ 
foreach ($fotoscontenido as $fc){
  if($fc->contenidoID == $contenidos[2]->contenidoID){?>

  <img class="resp" src="<?php echo base_url() ?>images/datos_curiosos/<?=$fc->foto?>" /> 
<?php }
}
}?></div>
 <div class="franja_naranja"> </div>  
  </div>
  
  <div class="margen_20"> </div>
<div class="contenedor_datos_curiosos">
<div class="titulo_azul"><?=$contenidos[3]->nombre?></div>
<div class="contendor_descripcion_curioso_azul"> <?=substr($contenidos[3]->texto,0,60)?></div>
<div class="ver_mas_azul" onclick="window.location.href = '<?=base_url()?>curiosos/detalle/<?=$contenidos[3]->contenidoID?>/2'"> Ver más.. </div>
<?php if($fotoscontenido != null){ 
foreach ($fotoscontenido as $fc){
  if($fc->contenidoID == $contenidos[3]->contenidoID){?>
<div class="contenedor_imagen_azul">
  <img class="resp" src="<?php echo base_url() ?>images/datos_curiosos/<?=$fc->foto?>" />  </div>
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