<style>
    #paso_dos > div > div.paquetes_izquierda_mini > label > div.precio_paquete_lite_mini > div{
        color:#E95D0F !important;
    }
    </style>
<div class="titulo_seccion_admin hidden">
<div class="perrito_perfil">
<img src="<?php echo base_url()?>images/perrito_perfil.png" />
</div>
<div class="admin_title"> Administrador de anuncios </div>
</div>
<br>
<ul class="menu_perfil_mini">
<li class="icono_seleccion_mini">
<p style=" margin-top:3px; margin-left:5px;" onclick="muestra('anunciar');oculta('anunciosAct');oculta('anunciosInAct');"> Todos (<?php echo count($anuncios)?>) </p>
</li>
<li>
<p style=" margin-top:3px; margin-left:5px;" onclick="muestra('anunciosAct');oculta('anunciar');oculta('anunciosInAct');"> Activos (<?php echo count($anunciosAct)?>) </p>
</li>
<li>
<p style=" margin-top:3px; margin-left:5px;" onclick="muestra('anunciosInAct');oculta('anunciosAct');oculta('anunciar');"> Expirados (<?php echo count($anunciosInAct)?>) </p>
</li>
</ul>
<br>
<div id="anunciar" style="display:block;">
<table class="tabla_perfil" width="795" >
  <tr>
  <th width="76"> Paquete </th>
  <th width="71"> Sección </th>
  <th width="191"> Titúlo </th>
  <th width="86"> Estatus </th>
  <th width="105"> Vencimiento </th>
  <th width="92"> Popularidad </th>
  <th width="142"> Renovar/<br>Cancelar </th>
  </tr>
  <?php if ($anuncios != null) {?>
  <?php 
  foreach ($anuncios as $anuncio) { ?>
    <tr>
            <?php if ($anuncio->NombrePaquete =='Lite'){?>
                <td><img src="<?php echo base_url()?>images/ico_lite.png" width="34" height="34"/>
                    <br>
                <font class="lite"> Lite </font> </td>
            <?php } elseif ($anuncio->NombrePaquete == 'Regular') {?>
                <td><img src="<?php echo base_url()?>images/ico_regular.png" width="34" height="34"/>
                <br>
                <font class="regular"> Regular </font> </td>        
            <?php  } else { ?>
                <td><img src="<?php echo base_url()?>images/ico_premium.png" width="34" height="34"/>
                <br><font class="premium"> Premium </font> </td>        
            <?php } ?>
            
            <td> <?php echo $anuncio->seccionNombre ?> </td>
            <td> <?php echo $anuncio->titulo ?> </td>
            <td>
                <?php if ($anuncio->vigente == 1 && $anuncio->aprobada == 1) {
        echo '<input type="hidden" name="expirado" id="expirado" value="true"/>'?>
                Activo
                <?php } elseif($anuncio->vigente == 1 && $anuncio->aprobada == 0)  {
          echo '<input type="hidden" name="expirado" id="expirado" value="false"/>' ?>
                Pendiente de Aprobacion
                <?php } elseif($anuncio->vigente == 1 && $anuncio->aprobada == 2)  {
          echo '<input type="hidden" name="expirado" id="expirado" value="false"/>' ?>
                Declinado
                <?php } elseif($anuncio->vigente == 0) { 
        echo '<input type="hidden" name="expirado" id="expirado" value="true"/>'?>
                Expirado
                <?php } ?>

            </td>
            <td> <?php echo $anuncio->fechaVencimiento ?> </td>
            <td> <?php echo $anuncio->numeroVisitas ?> </td>
            <td>
              <!--BOTON -->
            <?php if ($anuncio->vigente == 1 && $anuncio->aprobada == 1) { ?>
            <ul class="boton_gris_perfil_tabla"> <li>
            <p data-id="<?=$anuncio->publicacionID?>" class=" cancelar_anuncio">Cancelar</p>
            </li> </ul> 
                <?php } elseif($anuncio->vigente == 1 && $anuncio->aprobada == 0)  { ?>
            <ul class="boton_gris_perfil_tabla"> <li>
            <p data-id="<?=$anuncio->publicacionID?>" class=" cancelar_anuncio">Cancelar</p>
            </li> </ul> 
                <?php } elseif($anuncio->vigente == 1 && $anuncio->aprobada == 2 && $anuncio->seccion != 4 && $anuncio->seccion != 11 )  { ?>
            <ul class="boton_gris_perfil_tabla"> <li>
            <a href="<?=base_url().'negocio/principal/getAnuncioRenovar/'?><?php echo $anuncio->publicacionID?>" style="text-decoration:none; color:white;" class="" >Renovar</a>
            </li> </ul> 
            <?php } elseif($anuncio->vigente == 1 && $anuncio->aprobada == 2 && ($anuncio->seccion == 4 || $anuncio->seccion == 11) )  { ?>
            <ul class="boton_gris_perfil_tabla"> <li>
            <a href="<?=base_url().'directorio/renovacion/'?><?php echo $anuncio->publicacionID?>" style="text-decoration:none; color:white;" class="" >Renovar</a>
            </li> </ul> 
                <?php } elseif($anuncio->vigente == 0) { ?>
            <!-- <a href="#"  style="text-decoration:none; color:white;" onclick="muestra('contenedor_publicar_anuncio');">Renovar</a> -->
                <?php } ?>
            <!-- BOTON -->
              
            </td>
    </tr>
  <?php } ?>

  <?php }?>
 </table>
</div>


<div id="anunciosAct" style="display:none;"> 
  <table class="tabla_perfil" width="795" >
  <tr>
  <th width="76"> Paquete </th>
  <th width="71"> Sección </th>
  <th width="191"> Titúlo </th>
  <th width="86"> Estatus </th>
  <th width="105"> Vencimiento </th>
  <th width="92"> Popularidad </th>
  <th width="142"> Renovar/<br>Cancelar </th>
  </tr>
<?php if ($anunciosAct != null) {?>
  <?php 
  foreach ($anunciosAct as $anuncio) { ?>
    <tr>
            <?php if ($anuncio->NombrePaquete =='Lite'){?>
                <td><img src="<?php echo base_url()?>images/ico_lite.png" width="34" height="34"/>
                    <br>
                <font class="lite"> Lite </font> </td>
            <?php } elseif ($anuncio->NombrePaquete == 'Regular') {?>
                <td><img src="<?php echo base_url()?>images/ico_regular.png" width="34" height="34"/>
                <br>
                <font class="regular"> Regular </font> </td>        
            <?php  } else { ?>
                <td><img src="<?php echo base_url()?>images/ico_premium.png" width="34" height="34"/>
                <br><font class="premium"> Premium </font> </td>        
            <?php } ?>
            
            <td> <?php echo $anuncio->seccionNombre ?> </td>
            <td> <?php echo $anuncio->titulo ?> </td>
            <td>
                <?php if ($anuncio->vigente == 1 && $anuncio->aprobada == 1) {
        echo '<input type="hidden" name="expirado" id="expirado" value="true"/>'?>
                Activo
                <?php } elseif($anuncio->vigente == 1 && $anuncio->aprobada == 0)  {
          echo '<input type="hidden" name="expirado" id="expirado" value="false"/>' ?>
                Pendiente de Aprobacion
                <?php } elseif($anuncio->vigente == 1 && $anuncio->aprobada == 2)  {
          echo '<input type="hidden" name="expirado" id="expirado" value="false"/>' ?>
                Declinado
                <?php } elseif($anuncio->vigente == 0) { 
        echo '<input type="hidden" name="expirado" id="expirado" value="true"/>'?>
                Expirado
                <?php } ?>

            </td>
            <td> <?php echo $anuncio->fechaVencimiento ?> </td>
            <td> <?php echo $anuncio->numeroVisitas ?> </td>
            <td>
              <!--BOTON -->
            <?php if ($anuncio->vigente == 1 && $anuncio->aprobada == 1) { ?>
            <ul class="boton_gris_perfil_tabla"> <li>
            <p data-id="<?=$anuncio->publicacionID?>" class=" cancelar_anuncio">Cancelar</p>
            </li> </ul> 
                <?php } elseif($anuncio->vigente == 1 && $anuncio->aprobada == 0)  { ?>
            <ul class="boton_gris_perfil_tabla"> <li>
            <p data-id="<?=$anuncio->publicacionID?>" class=" cancelar_anuncio">Cancelar</p>
            </li> </ul> 
                <?php } elseif($anuncio->vigente == 1 && $anuncio->aprobada == 2 && $anuncio->seccion != 4 && $anuncio->seccion != 11 )  { ?>
            <ul class="boton_gris_perfil_tabla"> <li>
            <a href="<?=base_url().'negocio/principal/getAnuncioRenovar/'?><?php echo $anuncio->publicacionID?>" style="text-decoration:none; color:white;" class="" >Renovar</a>
            </li> </ul> 
            <?php } elseif($anuncio->vigente == 1 && $anuncio->aprobada == 2 && ($anuncio->seccion == 4 || $anuncio->seccion == 11) )  { ?>
            <ul class="boton_gris_perfil_tabla"> <li>
            <a href="<?=base_url().'directorio/renovacion/'?><?php echo $anuncio->publicacionID?>" style="text-decoration:none; color:white;" class="" >Renovar</a>
            </li> </ul> 
                <?php } elseif($anuncio->vigente == 0) { ?>
            <!-- <a href="#"  style="text-decoration:none; color:white;" onclick="muestra('contenedor_publicar_anuncio');">Renovar</a> -->
                <?php } ?>
            <!-- BOTON -->

            </td>
    </tr>
  <?php } ?>
  <?php }?>
 </table>
 </div>

<div id="anunciosInAct" style="display:none;">  
  <table class="tabla_perfil" width="795" >
  <tr>
  <th width="76"> Paquete </th>
  <th width="71"> Sección </th>
  <th width="191"> Titúlo </th>
  <th width="86"> Estatus </th>
  <th width="105"> Vencimiento </th>
  <th width="92"> Popularidad </th>
  <th width="142"> Renovar/<br>Cancelar </th>
  </tr>
<?php if ($anunciosInAct != null) {?>
  <?php 
  foreach ($anunciosInAct as $anuncio) { ?>
  
    <tr>
            <?php if ($anuncio->NombrePaquete =='Lite'){?>
                <td><img src="<?php echo base_url()?>images/ico_lite.png" width="34" height="34"/>
                    <br>
                <font class="lite"> Lite </font> </td>
            <?php } elseif ($anuncio->NombrePaquete == 'Regular') {?>
                <td><img src="<?php echo base_url()?>images/ico_regular.png" width="34" height="34"/>
                <br>
                <font class="lite"> Regular </font> </td>        
            <?php  } else { ?>
                <td><img src="<?php echo base_url()?>images/ico_premium.png" width="34" height="34"/>
                <br><font class="lite"> Premium </font> </td>        
            <?php } ?>
            
            <td> <?php echo $anuncio->seccionNombre ?> </td>
            <td> <?php echo $anuncio->titulo ?> </td>
            <td>
                <?php if ($anuncio->vigente == 1 && $anuncio->aprobada == 1) {
        echo '<input type="hidden" name="expirado" id="expirado" value="true"/>'?>
                Activo
                <?php } elseif($anuncio->vigente == 1 && $anuncio->aprobada == 0)  {
          echo '<input type="hidden" name="expirado" id="expirado" value="false"/>' ?>
                Pendiente de Aprobacion
                <?php } elseif($anuncio->vigente == 1 && $anuncio->aprobada == 2)  {
          echo '<input type="hidden" name="expirado" id="expirado" value="false"/>' ?>
                Declinado
                <?php } elseif($anuncio->vigente == 0) { 
        echo '<input type="hidden" name="expirado" id="expirado" value="true"/>'?>
                Expirado
                <?php } ?>

            </td>
            <td> <?php echo $anuncio->fechaVencimiento ?> </td>
            <td> <?php echo $anuncio->numeroVisitas ?> </td>
            <td> 
              <!--BOTON -->
            <?php if ($anuncio->vigente == 1 && $anuncio->aprobada == 1) { ?>
            <ul class="boton_gris_perfil_tabla"> <li>
            <p data-id="<?=$anuncio->publicacionID?>" class=" cancelar_anuncio">Cancelar</p>
            </li> </ul> 
                <?php } elseif($anuncio->vigente == 1 && $anuncio->aprobada == 0)  { ?>
            <ul class="boton_gris_perfil_tabla"> <li>
            <p data-id="<?=$anuncio->publicacionID?>" class=" cancelar_anuncio">Cancelar</p>
            </li> </ul> 
                <?php } elseif($anuncio->vigente == 1 && $anuncio->aprobada == 2 && $anuncio->seccion != 4 && $anuncio->seccion != 11 )  { ?>
            <ul class="boton_gris_perfil_tabla"> <li>
            <a href="<?=base_url().'negocio/principal/getAnuncioRenovar/'?><?php echo $anuncio->publicacionID?>" style="text-decoration:none; color:white;" class="" >Renovar</a>
            </li> </ul> 
            <?php } elseif($anuncio->vigente == 1 && $anuncio->aprobada == 2 && ($anuncio->seccion == 4 || $anuncio->seccion == 11) )  { ?>
            <ul class="boton_gris_perfil_tabla"> <li>
            <a href="<?=base_url().'directorio/renovacion/'?><?php echo $anuncio->publicacionID?>" style="text-decoration:none; color:white;" class="" >Renovar</a>
            </li> </ul> 
                <?php } elseif($anuncio->vigente == 0) { ?>
            <!-- <a href="#"  style="text-decoration:none; color:white;" onclick="muestra('contenedor_publicar_anuncio');">Renovar</a> -->
                <?php } ?>
            <!-- BOTON -->
             </td>
    </tr>
  <?php } ?>
  <?php } ?>

 </table>
 </div>




 
 
 <!--EDICION DE ANUNCIO 
<div id="contenedor_publicar_anuncio" class="contenedor_publicar" style=" display:none">

   Inicio contenedor pap publicar anuncio aunucio 
    <div id="publicar_anuncio" class="pubicar_anuncio_mini">
        <?php //$this->load->view('partial/_pasos_anuncio_renovar', array('paquetes' => $paquetes, 'estados' => $estados, 'razas' => $razas,'cupones' => $cupones,'anuncios'=> $anuncios)); ?>

    </div>
</div>!-->

<script type="text/javascript">
  $('.cancelar_anuncio').on('click', function () {
      
      var pubID = $(this).attr('data-id');
      var m = confirm('¿Estás seguro de cancelar la publicación de este anuncio?');
      if(m === true){
      $.ajax({
                    url:'<?php echo base_url('usuario/cuenta/cancelarAnuncio') ?>',
                    type:'post',
                    dataType: 'JSON',
                    data: 'publicacionID='+pubID,
                    success: function(data){
                    location.reload();
                  }
                });
      } 
        });

        
</script>