<div class="titulo_seccion_admin hidden">
<div class="perrito_perfil">
<img src="<?php echo base_url()?>images/perrito_perfil.png" />
</div>
<div class="admin_title"> Administrador de anuncios </div>
</div>
</br>
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
</br>
<div id="anunciar" style="display:block;">
<table class="tabla_perfil" width="795" >
  <tr>
  <th width="76"> Paquete </th>
  <th width="71"> Sección </th>
  <th width="191"> Titúlo </th>
  <th width="86"> Estatus </th>
  <th width="105"> Vencimiento </th>
  <th width="92"> Popularidad </th>
  <th width="142"> Renovar/</br>Cancelar </th>
  </tr>
  <?php if ($anuncios != null) {?>
  <?php 
  foreach ($anuncios as $anuncio) { ?>
    <tr>
            <?php if ($anuncio->NombrePaquete =='Lite'){?>
                <td><img src="<?php echo base_url()?>images/ico_lite.png" width="34" height="34"/>
                    </br>
                <font class="lite"> Lite </font> </td>
            <?php } elseif ($anuncio->NombrePaquete == 'Regular') {?>
                <td><img src="<?php echo base_url()?>images/ico_regular.png" width="34" height="34"/>
                </br>
                <font class="regular"> Regular </font> </td>        
            <?php  } else { ?>
                <td><img src="<?php echo base_url()?>images/ico_premium.png" width="34" height="34"/>
                </br><font class="premium"> Premium </font> </td>        
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
                Inactivo
                <?php } ?>

            </td>
            <td> <?php echo $anuncio->fechaVencimiento ?> </td>
            <td> <?php echo $anuncio->numeroVisitas ?> </td>
            <td> <ul class="boton_gris_perfil_tabla"> <li>

            <!--BOTON -->
            <?php if ($anuncio->vigente == 1 && $anuncio->aprobada == 1) { ?>
            <p data-id="<?=$anuncio->publicacionID?>" class=" cancelar_anuncio">Cancelar</p>
                <?php } elseif($anuncio->vigente == 1 && $anuncio->aprobada == 0)  { ?>
            <p data-id="<?=$anuncio->publicacionID?>" class=" cancelar_anuncio">Cancelar</p>
                <?php } elseif($anuncio->vigente == 1 && $anuncio->aprobada == 2)  { ?>
            <a href="#"  class="paquete_renovarr reset"
   data-paquete='{"id":"<?php echo $anuncio->paqueteID ?>","nombre":"<?php echo $anuncio->NombrePaquete ?>","vigencia":"<?php echo $anuncio->vigencia ?>","precio":"<?php echo $anuncio->precio ?>","caracteres":"<?php echo $anuncio->caracteres ?>","cantFotos":"<?php echo $anuncio->cantFotos ?>","videos":"<?php echo $anuncio->videos ?>","cupones":"<?php echo $anuncio->cupones ?>","seccion":"<?php echo $anuncio->seccion?>","publicacionID":"<?php echo $anuncio->publicacionID?>","expirado":"<?php  if ($anuncio->vigente == 1 && $anuncio->aprobada == 1) {
        echo 'false'; } elseif( $anuncio->vigente == 1 && $anuncio->aprobada == 0)  { echo 'false';} elseif($anuncio->vigente == 1 && $anuncio->aprobada == 2) {
echo 'false'; } elseif($anuncio->vigente == 0) { echo 'true';}?>"}'>Renovar</a>
                <?php } elseif($anuncio->vigente == 0) { ?>
            <a href="#"  class="paquete_renovarr reset"
   data-paquete='{"id":"<?php echo $anuncio->paqueteID ?>","nombre":"<?php echo $anuncio->NombrePaquete ?>","vigencia":"<?php echo $anuncio->vigencia ?>","precio":"<?php echo $anuncio->precio ?>","caracteres":"<?php echo $anuncio->caracteres ?>","cantFotos":"<?php echo $anuncio->cantFotos ?>","videos":"<?php echo $anuncio->videos ?>","cupones":"<?php echo $anuncio->cupones ?>","seccion":"<?php echo $anuncio->seccion?>","publicacionID":"<?php echo $anuncio->publicacionID?>","expirado":"<?php  if ($anuncio->vigente == 1 && $anuncio->aprobada == 1) {
        echo 'false'; } elseif( $anuncio->vigente == 1 && $anuncio->aprobada == 0)  { echo 'false';} elseif($anuncio->vigente == 1 && $anuncio->aprobada == 2) {
echo 'false'; } elseif($anuncio->vigente == 0) { echo 'true';}?>"}'>Renovar</a>
                <?php } ?>
            <!-- BOTON -->

            
            </li> </ul> </td>
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
  <th width="142"> Renovar/</br>Cancelar </th>
  </tr>
<?php if ($anunciosAct != null) {?>
  <?php 
  foreach ($anunciosAct as $anuncio) { ?>
    <tr>
            <?php if ($anuncio->NombrePaquete =='Lite'){?>
                <td><img src="<?php echo base_url()?>images/ico_lite.png" width="34" height="34"/>
                    </br>
                <font class="lite"> Lite </font> </td>
            <?php } elseif ($anuncio->NombrePaquete == 'Regular') {?>
                <td><img src="<?php echo base_url()?>images/ico_regular.png" width="34" height="34"/>
                </br>
                <font class="regular"> Regular </font> </td>        
            <?php  } else { ?>
                <td><img src="<?php echo base_url()?>images/ico_premium.png" width="34" height="34"/>
                </br><font class="premium"> Premium </font> </td>        
            <?php } ?>
            
            <td> <?php echo $anuncio->seccionNombre ?> </td>
            <td> <?php echo $anuncio->titulo ?> </td>
            <td>
                <?php if ($anuncio->vigente == 1) {?>
                Activo
                <?php } else { ?>
                Inactivo
                <?php } ?>

            </td>
            <td> <?php echo $anuncio->fechaVencimiento ?> </td>
            <td> <?php echo $anuncio->numeroVisitas ?> </td>
            <td> <ul class="boton_gris_perfil_tabla"> <li> Renovar </li> </ul> </td>
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
  <th width="142"> Renovar/</br>Cancelar </th>
  </tr>
<?php if ($anunciosInAct != null) {?>
  <?php 
  foreach ($anunciosInAct as $anuncio) { ?>
  
    <tr>
            <?php if ($anuncio->NombrePaquete =='Lite'){?>
                <td><img src="<?php echo base_url()?>images/ico_lite.png" width="34" height="34"/>
                    </br>
                <font class="lite"> Lite </font> </td>
            <?php } elseif ($anuncio->NombrePaquete == 'Regular') {?>
                <td><img src="<?php echo base_url()?>images/ico_regular.png" width="34" height="34"/>
                </br>
                <font class="lite"> Regular </font> </td>        
            <?php  } else { ?>
                <td><img src="<?php echo base_url()?>images/ico_premium.png" width="34" height="34"/>
                </br><font class="lite"> Premium </font> </td>        
            <?php } ?>
            
            <td> <?php echo $anuncio->seccionNombre ?> </td>
            <td> <?php echo $anuncio->titulo ?> </td>
            <td>
                <?php if ($anuncio->vigente == 1) {?>
                Activo
                <?php } else { ?>
                Inactivo
                <?php } ?>

            </td>
            <td> <?php echo $anuncio->fechaVencimiento ?> </td>
            <td> <?php echo $anuncio->numeroVisitas ?> </td>
            <td> <ul class="boton_gris_perfil_tabla"> <li> Renovar </li> </ul> </td>
    </tr>
  <?php } ?>
  <?php } ?>

 </table>
 </div>




 
 
 <!--EDICION DE ANUNCIO-->
<div id="contenedor_publicar_anuncio" class="contenedor_publicar" style=" display:none">

    <!-- Inicio contenedor pap publicar anuncio aunucio !-->
    <div id="publicar_anuncio" class="pubicar_anuncio_mini">
        <?php $this->load->view('partial/_pasos_anuncio_renovar', array('paquetes' => $paquetes, 'estados' => $estados, 'razas' => $razas,'cupones' => $cupones,'anuncios'=> $anuncios)); ?>

    </div>
</div>

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