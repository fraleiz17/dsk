<div class="titulo_seccion_admin">
<div class="perrito_perfil">
<img src="<?php echo base_url()?>images/sobre_perfil.png" />
</div>
<div class="admin_title"> Tienes <?php echo count($mensajes);?> mensajes </div>
</div>
<?php if ($mensajes != Null) {?>
<?php   foreach ($mensajes as $mensaje) { ?>

<div id="contenedor_ver_mensaje<?php echo $mensaje->mensajeID ?>" class="contenedor_publicar_anuncio" style="display:none;">
<div class="cerrar_mensaje">
<img src="<?php echo base_url()?>images/cerrar.png" onclick="oculta('contenedor_ver_mensaje<?php echo $mensaje->mensajeID ?>');"/>
</div>
<div id="ver_mensaje" class="ver_mensaje">
<div class="contenedor_titulo_mensaje">
<font class="titulo_mensaje"> MENSAJE </font>
</div>
<div class="mensaje"> 
<strong> <?php echo $mensaje->asunto ?></strong>
</br>
<strong><?php echo substr($mensaje->mensaje,0,15); ?> </strong>
</br></br>
<?php echo $mensaje->mensaje ?>

</div>

</div>

</div>



</br>
<table class="tabla_mensajes" width="795">
 
     <td width="221"> 
   <img src="<?php echo base_url()?>images/sobre_perfil.png" width="43" height="34"/> <?php echo $mensaje->asunto ?> 
  </td>
  <td width="311">  <?php echo substr($mensaje->mensaje,0,15); ?> </td>
  <td width="247">
 <font class="ver_mas" onclick="muestra('contenedor_ver_mensaje<?php echo $mensaje->mensajeID ?>');"> Ver más... </font>
  </td>
  </tr>
            
  <?php } ?><?php } ?>

 

