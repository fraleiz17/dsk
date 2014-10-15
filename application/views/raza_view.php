<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es-419">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>La raza-Quierounperro.com</title>
<link rel="shortcut icon" href="<?php echo base_url() ?>images/ico.ico" />  
<link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>css/reset.css" media="screen"></link>
 <link rel="stylesheet" href="<?php echo base_url() ?>css/jPages.css">
 <link href="<?php echo base_url() ?>css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>css/general.css" media="screen"></link> <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>css/venta.css" media="screen"></link><link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>css/la_raza.css" media="screen"></link>
  </script>
   <script src="<?php echo base_url() ?>js/jquery-1.10.2.js"></script>
     <script src="<?php echo base_url() ?>js/jPages.js"></script>
<script src="<?php echo base_url() ?>js/funciones_venta.js"></script>
     <script src="<?php echo base_url() ?>js/funciones_negocio.js"></script>
   <script src="<?php echo base_url() ?>js/jquery-ui.js"></script>
   <script type="text/javascript" src="<?php echo base_url() ?>js/jquery.cycle.all.js"></script>
   <script src="<?php echo base_url() ?>js/funciones_.js" type="text/javascript"></script>
   <script src="<?php echo base_url() ?>js/funciones_index.js" type="text/javascript"></script>
   <script src="<?php echo base_url() ?>js/funciones_raza.js"></script>

  
  


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
LA RAZA DEL MES
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

</br>
<div class="contenedor_central" style="margin-bottom:45px;">
<div class="raza_mes" style="margin-bottom:45px; display:" id="razaMes<?=$contenidos[0]->contenidoID?>">


<div class="contenedor_slide_perro_mes">
<?php 
if($fotoscontenido != null){
foreach($fotoscontenido as $foto){
	if($foto->contenidoID == $contenidos[0]->contenidoID){?>
<img src="images/raza_mes/<?=$foto->foto?>" width="358" height="439"/>
<?php }
}
}?>
</div>
    

<div class="contenedor_descripcion">

<div class="title_raza_big"><?=strtoupper($contenidos[0]->nombre)?></div>

  <div class="title_raza">  Orígenes de la raza </div>
  </br>
<p>  
<?=$contenidos[0]->origenes?>
</p>
<div class="title_raza"> Carácter y temperamento </div>
</br>
<p><?=$contenidos[0]->caracter?></p>

</div>

<div> 
</br>
</br>
<div class="title_raza_long">  Cualidades de esta raza </div>
</br>
<p>
<?=$contenidos[0]->cualidades?>
</p>
<div class="title_raza_long">Colores característicos: </div>
</br>
<p><?=$contenidos[0]->colores?></p>

<div class="title_raza_long">Sobre la raza: </div>
</br>
<p><?=$contenidos[0]->acercaDe?></p>

</div>
</div>


<!--dos-->
<div class="raza_mes" style="margin-bottom:45px; display:none" id="razaMes<?=$contenidos[1]->contenidoID?>">


<div class="contenedor_slide_perro_mes">
<?php 
if($fotoscontenido != null){
foreach($fotoscontenido as $foto){
	if($foto->contenidoID == $contenidos[1]->contenidoID){?>
<img src="images/raza_mes/<?=$foto->foto?>" width="358" height="439"/>
<?php }
}
}?>
</div>
    

<div class="contenedor_descripcion">

<div class="title_raza_big"><?=strtoupper($contenidos[1]->nombre)?></div>

  <div class="title_raza">  Orígenes de la raza </div>
  </br>
<p>  
<?=$contenidos[1]->origenes?>
</p>
<div class="title_raza"> Carácter y temperamento </div>
</br>
<p><?=$contenidos[1]->caracter?></p>

</div>

<div> 
</br>
</br>
<div class="title_raza_long">  Cualidades de esta raza </div>
</br>
<p>
<?=$contenidos[1]->cualidades?>
</p>
<div class="title_raza_long">Colores característicos: </div>
</br>
<p><?=$contenidos[1]->colores?></p>

<div class="title_raza_long">Sobre la raza: </div>
</br>
<p><?=$contenidos[1]->acercaDe?></p>

</div>
</div>

<!--tres-->
<div class="raza_mes" style="margin-bottom:45px; display:none" id="razaMes<?=$contenidos[2]->contenidoID?>">


<div class="contenedor_slide_perro_mes">
<?php 
if($fotoscontenido != null){
foreach($fotoscontenido as $foto){
	if($foto->contenidoID == $contenidos[2]->contenidoID){?>
<img src="images/raza_mes/<?=$foto->foto?>" width="358" height="439"/>
<?php }
}
}?>
</div>
    

<div class="contenedor_descripcion">

<div class="title_raza_big"><?=strtoupper($contenidos[2]->nombre)?></div>

  <div class="title_raza">  Orígenes de la raza </div>
  </br>
<p>  
<?=$contenidos[2]->origenes?>
</p>
<div class="title_raza"> Carácter y temperamento </div>
</br>
<p><?=$contenidos[2]->caracter?></p>

</div>

<div> 
</br>
</br>
<div class="title_raza_long">  Cualidades de esta raza </div>
</br>
<p>
<?=$contenidos[2]->cualidades?>
</p>
<div class="title_raza_long">Colores característicos: </div>
</br>
<p><?=$contenidos[2]->colores?></p>

<div class="title_raza_long">Sobre la raza: </div>
</br>
<p><?=$contenidos[2]->acercaDe?></p>

</div>
</div>

<!--cuatro-->
<div class="raza_mes" style="margin-bottom:45px; display:none" id="razaMes<?=$contenidos[3]->contenidoID?>">


<div class="contenedor_slide_perro_mes">
<?php 
if($fotoscontenido != null){
foreach($fotoscontenido as $foto){
	if($foto->contenidoID == $contenidos[3]->contenidoID){?>
<img src="images/raza_mes/<?=$foto->foto?>" width="358" height="439"/>
<?php }
}
}?>
</div>
    

<div class="contenedor_descripcion">

<div class="title_raza_big"><?=strtoupper($contenidos[3]->nombre)?></div>

  <div class="title_raza">  Orígenes de la raza </div>
  </br>
<p>  
<?=$contenidos[3]->origenes?>
</p>
<div class="title_raza"> Carácter y temperamento </div>
</br>
<p><?=$contenidos[3]->caracter?></p>

</div>

<div> 
</br>
</br>
<div class="title_raza_long">  Cualidades de esta raza </div>
</br>
<p>
<?=$contenidos[3]->cualidades?>
</p>
<div class="title_raza_long">Colores característicos: </div>
</br>
<p><?=$contenidos[3]->colores?></p>

<div class="title_raza_long">Sobre la raza: </div>
</br>
<p><?=$contenidos[3]->acercaDe?></p>

</div>
</div>


<a href="#" style="text-decoration:none;color:#000;" onmouseover="muestra('ver_perdidos');oculta('ver_raza');oculta('ver_mes');oculta('ver_curiosos');" onclick="muestra('razaMes<?=$contenidos[0]->contenidoID?>');oculta('razaMes<?=$contenidos[1]->contenidoID?>');oculta('razaMes<?=$contenidos[2]->contenidoID?>');oculta('razaMes<?=$contenidos[3]->contenidoID?>');">
<div  id="perros_perdidos" class="seccion_inferior_izquierda_raza" >

<div class="contenido_secciones_raza">
<p class="titulo_segunda_seccion_raza"><?=$contenidos[0]->mes?></p>

</div>
<div  class="sub_imagenes_dos_raza" >
<?php 
if($fotocontenido != null){
foreach($fotocontenido as $foto){
	if($foto->contenidoID == $contenidos[0]->contenidoID){?>
<img align="center" class="imagen_relleno" src="images/raza_mes/<?=$foto->foto;?>" width="87" height="103" />
<?php }
}
}?>



<div id="ver_perdidos" class="ver_mas_raza" style=" display:none;">  Ver más...  </div>

</div>
</div>

</a>
<!-- End perros perdidos -->
<!-- Raza del mes -->
<a href="#" style="text-decoration:none; color:#000;" onmouseover="muestra('ver_raza'); oculta('ver_perdidos');oculta('ver_mes'); oculta('ver_curiosos')" onclick="muestra('razaMes<?=$contenidos[1]->contenidoID?>');oculta('razaMes<?=$contenidos[0]->contenidoID?>');oculta('razaMes<?=$contenidos[2]->contenidoID?>');oculta('razaMes<?=$contenidos[3]->contenidoID?>');">
<div id="la_raza_mes" class="seccion_inferior_izquierda_raza">
<div class="contenido_secciones_raza">
<p class="titulo_segunda_seccion_raza"><?=$contenidos[1]->mes?></p>
</div>
<div  class="sub_imagenes_dos_raza" >

<?php 
if($fotocontenido != null){
foreach($fotocontenido as $foto){
	if($foto->contenidoID == $contenidos[1]->contenidoID){?>
<img align="center" class="imagen_relleno" src="images/raza_mes/<?=$foto->foto;?>" width="87" height="103" />
<?php }
}
}?>

<div id="ver_raza" class="ver_mas_raza" style=" display:none;">  Ver más...  </div>

</div>
</div>
</a>
<!-- End raza del mes -->

<!-- Eventos del mes -->
<a href="#" style="text-decoration:none; color:#000;" onmouseover="muestra('ver_mes');oculta('ver_raza'); oculta('ver_perdidos');oculta('ver_curiosos');" onclick="muestra('razaMes<?=$contenidos[2]->contenidoID?>');oculta('razaMes<?=$contenidos[0]->contenidoID?>');oculta('razaMes<?=$contenidos[1]->contenidoID?>');oculta('razaMes<?=$contenidos[3]->contenidoID?>');">
<div id="eventos_mes" class="seccion_inferior_raza">
<div class="contenido_secciones_raza">
<p class="titulo_segunda_seccion_raza"><?=$contenidos[2]->mes?></p>
</div>
<div  class="sub_imagenes_dos_raza" >

<?php 
if($fotocontenido != null){
foreach($fotocontenido as $foto){
	if($foto->contenidoID == $contenidos[2]->contenidoID){?>
<img align="center" class="imagen_relleno" src="images/raza_mes/<?=$foto->foto;?>" width="87" height="103" />
<?php }
}
}?>

<div id="ver_mes" class="ver_mas_raza" style=" display:none;">  Ver más...  </div>

</div>
</div>
</a>
<!-- End eventos del mes -->
<!-- Datos curiosos -->
<a href="#" style="text-decoration:none; color:#000;" onmouseover="muestra('ver_curiosos');oculta('ver_raza'); oculta('ver_perdidos');oculta('ver_mes');"  onclick="muestra('razaMes<?=$contenidos[3]->contenidoID?>');oculta('razaMes<?=$contenidos[0]->contenidoID?>');oculta('razaMes<?=$contenidos[1]->contenidoID?>');oculta('razaMes<?=$contenidos[2]->contenidoID?>');">
<div id="datos_curiosos" class="seccion_inferior_derecha_raza">
<div class="contenido_secciones_raza">
<p class="titulo_segunda_seccion_raza"><?=$contenidos[3]->mes?></p>
</div>
<div  class="sub_imagenes_dos_raza" >

<?php 
if($fotocontenido != null){
foreach($fotocontenido as $foto){
	if($foto->contenidoID == $contenidos[3]->contenidoID){?>
<img align="center" class="imagen_relleno" src="images/raza_mes/<?=$foto->foto;?>" width="87" height="103" />
<?php }
}
}?>


<div id="ver_curiosos" class="ver_mas_raza" style=" display:none;">  Ver más...  </div>

</div>

</div>
</a>
</div>

	  
 <div class="seccion_derecha_paquetes">
<ul class="aqui_crear_anuncio">
<li onclick="muestra('contenedor_publicar_anuncio');">

</li>
</ul>
</div>
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
  
<div class="division_menu_inferior"></div>
<?php $this->load->view('general/footer_view');?>
</body>
</html>

