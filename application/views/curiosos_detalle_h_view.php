<?php $this->load->view('general/LoginFiles');?>
<?php
$this->load->view('general/general_header_view', array('title' => 'Datos Curiosos detalle',
  'links'                                                      => array('venta'), 'scripts' => array('funciones_curiosos')))
  ?>
<link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>css/curiosos.css" media="screen"></link>
<style>   .resp{max-width:100%; max-height:100%;margin:auto;display:block;}</style>
</head>
<body>
<?php $this->load->view('general/menu_view')?>
<div class="titulo_seccion">
DATOS CURIOSOS H
</div>
<div class="contenedor_buscador"></div>
<div id="contenedor_central">
<?php $this->load->view('general/contTest');?>
<div class="central_curiosos"> 
<?php if($contenidos != null){
    foreach($contenidos as $cv){
        if($cv->contenidoID == $ID){?>
<div id="main_content">
<div class="titulo_detalle"> <?=$cv->nombre?> </div>
<div class="texto_descripcion_detalle">
<div class="contenedor_imagen_detalle"> 
 <?php if($fotocontenido != null){
        foreach($fotocontenido as $p){
            if($p->contenidoID == $cv->contenidoID){?>
 <img class="resp" src="<?php echo base_url()?>images/datos_curiosos/<?=$p->foto?>"/>
 <?php }
    }
}?>
 </div>
<?=$cv->texto?></div>
</div>
<?php }
    }
}?>
<div class="contenedor_curiosos_mini"> 
<div class="contenedor_datos_curiosos_mini"> 
<div class="franja_amarilla_mini"> </div>
<div class="contenedor_imagen_horizontal_mini" style="width:181px; height:57px;">
 <?php if($fotocontenido != null){
        foreach($fotocontenido as $p){
            if($p->contenidoID == $contenidos[1]->contenidoID){?>
 <img class="resp"src="<?php echo base_url()?>images/datos_curiosos/<?=$p->foto?>" />
 <?php }
    }
 }?></div>
<div class="contenido_horizontal_mini"> <?=$contenidos[1]->nombre?> </div>
<div class="contenido_texto_horizal_mini"> <?=substr($contenidos[1]->texto,0,60)?> ... </div>
<div class="ver_mas_amarillo_mini" onclick="window.location.href = '<?=base_url()?>curiosos/detalle/<?=$contenidos[1]->contenidoID?>/2'"> Ver más... </div>
  </div>
<div class="divisor_mini"> </div>
<div class="contenedor_datos_curiosos_mini">
<div class="titulo_horizontal_mini"> <?=$contenidos[2]->nombre?> </div>
<div class="contenido_texto_horizal_mini"> <?=substr($contenidos[2]->texto,0,60)?> </div>
<div class="ver_mas_naranja_mini" onclick="window.location.href = '<?=base_url()?>curiosos/detalle/<?=$contenidos[2]->contenidoID?>/2'"> Ver más... </div>
<div class="contenedor_imagen_horizontal_naranja_mini" style="width:181px; height:57px;">
<?php if($fotocontenido != null){
        foreach($fotocontenido as $p){
            if($p->contenidoID == $contenidos[2]->contenidoID){?>
 <img class="resp" src="<?php echo base_url()?>images/datos_curiosos/<?=$p->foto?>"/>
 <?php }
    }
  }?></div>
 <div class="franja_naranja_mini"> </div>
</div>
<div class="divisor_mini"> </div>
     <div class="contenedor_datos_curiosos_mini">
<div class="titulo_azul_mini"> <?=$contenidos[3]->nombre?> </div>
<div class="contendor_descripcion_curioso_azul_mini"> <?=substr($contenidos[3]->texto,0,60)?>...</div>
<div class="ver_mas_azul_mini" onclick="window.location.href = '<?=base_url()?>curiosos/detalle/<?=$contenidos[3]->contenidoID?>/1'"> Ver más.. </div>
<div class="contenedor_imagen_azul_mini" style="height:132px; width:72px;"> <?php if($fotocontenido != null){
        foreach($fotocontenido as $p){
            if($p->contenidoID == $contenidos[3]->contenidoID){?>
 <img class="resp"src="<?php echo base_url()?>images/datos_curiosos/<?=$p->foto?>" />
 <?php }
    }
  }?>
 </div>
<div class="franja_azul_mini"> </div>
</div>
<div class="divisor_mini"> </div>
<div class="contenedor_datos_curiosos_mini">
<div class="franja_verde_mini">  </div>
<div class="contenedor_imagen_verde_mini" style="width:181px; height:57px;">
    <?php if($fotocontenido != null){
        foreach($fotocontenido as $p){
            if($p->contenidoID == $contenidos[0]->contenidoID){?>
 <img class="resp" src="<?php echo base_url()?>images/datos_curiosos/<?=$p->foto?>" />
 <?php }
    }
  }?> </div>
<div class="titulo_verde_mini"> <?=$contenidos[0]->nombre?> </div>
<div class="contendor_descripcion_curioso_mini"> <?=substr($contenidos[0]->texto,0,60)?>...</div>
<div class="ver_mas_verde_mini" onclick="window.location.href = '<?=base_url()?>curiosos/detalle/<?=$contenidos[0]->contenidoID?>/1'"> Ver más.. </div>
 </div>
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
</div><br><br><br><br>    
<div class="division_menu_inferior"></div>
<?php $this->load->view('general/footer_view');?>
</body>
</html>