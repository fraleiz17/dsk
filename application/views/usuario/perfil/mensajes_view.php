<style>
.ver_masi {
    width: 237px;
    height: 23px;
    margin-top: -23px;
    position: absolute;
    text-align: right;
    padding-right: 5px;
    color: #6D398B;
    font-weight: bold;
}

.ver_masi:hover {
    color: #762EA4;
    font-weight: bold;
    font-size: 16px;
    cursor: pointer;
}
</style>

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
<strong><?php echo substr($mensaje->mensaje,0,15); ?> </strong>
<?php echo $mensaje->mensaje ?>
</div>
</div>
</div>
<table class="tabla_mensajes" width="795">
 
     <td width="221"> 
   <img src="<?php echo base_url()?>images/sobre_perfil.png" width="43" height="34" style="padding:5px 8px 5px 8px;overflow:hidden;display:block;float:left;"/> <?php echo $mensaje->asunto ?> 
  </td>
  <td width="311"> <span style="margin:0px -5px 0px 8px;"> <?php echo substr($mensaje->mensaje,0,15); ?> </span> </td>
  <td width="247">
 <font class="ver_masi" onclick="muestra('contenedor_ver_mensaje<?php echo $mensaje->mensajeID ?>');"> Ver más... </font>
  </td>
  </tr>
            
  <?php } ?><?php } ?>

 

