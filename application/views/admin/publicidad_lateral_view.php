<?php $this -> load -> view('admin/menu_view') ?>
<script type="text/javascript" src="<?php echo base_url()?>js/jquery-1.8.2.min.js"></script>
<script>
jQuery(document).ready(function(){
	var zona = <?php if(isset($zonaT)){ echo $zonaT;} else {echo $zonaT = 9;}?>;
	var seccion = <?php if(isset($seccion)){ echo $seccion;} else {echo $seccion = 1;}?>;
	
	$(".row").hide();
	$(".zona"+zona+seccion).show();
	if(seccion == 17){
				 $(".superior").fadeIn();
			 } 
			 
	
	 
	 $(".addContent").click(function() {
		 	
             var posicion = $(this).attr('data-rel');
			 $("#posicion").val(posicion);
             var uno = $("#posicion").val(posicion);
             
			 muestra('contenedor_modificaciones');
             //console.log(uno);
     });
	 
	 $(".addContentText").click(function() {
		 	
            var zonaN = $("#zonaIDR").val();
             var seccionN = $("#numeroSeccionR").val();
			  $("#zonaContentN").val(zonaN);
			  $("#seccionContentN").val(seccionN);
			  
             
			 muestra('contenedor_texto_apoyo');
             //console.log(uno);
     });
	 
	 $(".deleteContent").click(function() {
		 	
             var bannerIDel = $(this).attr('data-rel');
			 var posicionDel = $(this).attr('id');
             var zonaDel = $("#zonaIDR").val();
             var seccionDel = $("#numeroSeccionR").val();
			  $("#zonaContentDel").val(zonaDel);
			  $("#seccionContentDel").val(seccionDel);
			  $("#posicionContentDel").val(posicionDel);
			  $("#bannerIDContentDel").val(bannerIDel);
			  muestra('contenedor_delete');
              console.log(bannerIDel,zonaDel, seccionDel,posicionDel);
     });
	 
	 $(".deleteContentText").click(function() {
		 	
             var bannerIDT = $(this).attr('data-rel');
			 var posicionT = $(this).attr('id');
			 var tipo = $(this).attr('name');
			 
			 if(tipo == 1){
				 $('#deleteTextForm').attr('action', '<?=base_url()?>admin/principal/deleteBannerText');
		     } else {
				 $('#deleteTextForm').attr('action', '<?=base_url()?>admin/principal/deleteTextApoyo'); 
			 }
			 
             var zonaT = $("#zonaIDR").val();
             var seccionT = $("#numeroSeccionR").val();
			  $("#zonaContentT").val(zonaT);
			  $("#seccionContentT").val(seccionT);
			  $("#posicionContentT").val(posicionT);
			  $("#bannerIDContentT").val(bannerIDT);
			  muestra('contenedor_delete_text');
              console.log(bannerID,zonaT, seccionT,posicionT);
     });
	 
	  $(".updateText").click(function() {
		 	
             var bannerID = $(this).attr('data-rel');
			 var posicionD = $(this).attr('id');
             var zonaD = $("#zonaIDR").val();
             var seccionD = $("#numeroSeccionR").val();
			  $("#zonaContent").val(zonaD);
			  $("#seccionContent").val(seccionD);
			  $("#posicionContent").val(posicionD);
			  $("#bannerIDContent").val(bannerID);
			  muestra('contenedor_modificaciones_texto');
              console.log(bannerID,zonaD, seccionD,posicionD);
     });
	 

     $("#genero").change(
                function(){
					$("#personalizado").remove();
                    var thisValue = $(this).val();
                    var nombreZona = $('#genero option:selected').html();
                    //console.log(thisValue, nombreZona);
                    $("#nombreZona").detach();
             		$('<label id="nombreZona">'+nombreZona+'</label>').appendTo('#zonaNombre');
                    $("#zonaIDR").val(thisValue);
					numeroZona = thisValue;
					numeroSeccion = $("#numeroSeccionR").val();
					$(".row").hide();
					$(".zona"+numeroZona+numeroSeccion).show();
					console.log(".zona"+numeroZona+numeroSeccion);
    }); 
	
	
	
	
	 $("#saveBanner").click(function() {
              zona = $("#zonaIDR").val();
              uno = $("#numeroSeccionR").val();
             var dos = $("#nombreSeccionR").val();
                         

             //console.log(uno, dos, zona);
			 
			/* $.ajax({
                url:'<?=base_url()?>admin/principal/uploadBanner',
                type:'POST',
                dataType: 'json',
                data: $("#addBanner").serialize(),
                success: function(data){
                  
                }
    		});*/
     });  
	 
	$(".filtro").click(
	function(){
		$("#personalizado").remove();		
		goToSearch();		        
	});


	 
});

function goToSearch(){
	
	$.ajax({
		url     : '<?=base_url()?>admin/principal/tablasDinamicas',
		type    : 'POST',
		data    : $('#addBanner').serialize(),
		success : function(data){	
			$(".personalizado").remove();		
			$('#tablasDinamicasA').html(data);
		}                                       
	});
}
</script>



<!-- ---------------------------------------------------- contenedor_modificaciones --------------- -->

<form id="addBanner" method="post" action="<?=base_url()?>admin/principal/uploadBanner" enctype="multipart/form-data">

<div class="contenedor_modificaciones" id="contenedor_modificaciones" style="display:none"> <!-- Contenedor negro imagenes-->
<div class="cerrar_modificaciones"> <img src="<?php echo base_url()?>images/cerrar.png" onclick="oculta('contenedor_modificaciones');"/> </div>
<input type="hidden" name="numeroSeccionR" id="numeroSeccionR" value="<?=$seccion?>" />
<input type="hidden" name="nombreSeccionR" id="nombreSeccionR" value=""/>
<input type="hidden" name="zonaIDR" id="zonaIDR" value="<?=$zonaT?>"/>
<input type="hidden" name="posicion" id="posicion" value="4"/>

<div class="modificaciones"> 
<div class="titulo_modificaciones"> 
AGREGAR IMAGEN
</div>

<div class="contenido_intruciones">
<p>Ingrese las imagenes para BP00001:</p>
<br>
<input type="file" name="banner" id="banner" />



</div>
<ul class="morado_reg">
<li>
<input type="submit" />
</li>
</ul>

</div>

</div> <!-- Fin contenedor negro imagenes -->
</form>
<!-- ---------------------------------------------------- contenedor_modificaciones --------------- -->


<!-- ---------------------------------------------------- contenedor_modificaciones_texto --------------- -->

<form action="<?=base_url()?>admin/principal/uploadText" method="post">
<div class="contenedor_modificaciones" id="contenedor_texto_apoyo" style="display:none"> <!-- Contenedor negro imagenes-->
<div class="cerrar_modificaciones"> <img src="<?php echo base_url()?>images/cerrar.png" onclick="oculta('contenedor_texto_apoyo');"/> </div>
<input type="hidden" id="zonaContentN" name="zonaContentN" value="<?=$zonaT?>" />
<input type="hidden" id="seccionContentN" name="seccionContentN" value="<?=$seccion?>" />
<input type="hidden" id="posicionContentN" name="posicionContentN" value="2" />

<div class="modificaciones"> 
<div class="titulo_modificaciones"> 
AGREGAR TEXTO
</div>
<div class="contenido_intruciones">
<p> Introduzca el texto para BC0001-0000001 </p>
</brSS>
<textarea cols="65" rows="7" name="textoContentN" id="textoContentN"></textarea>

</div>
<ul class="morado_reg">
<li>
<input type="submit" value="Guardar" />
</li>
</ul>



</div>

</div> <!-- Fin contenedor negro imagenes -->
</form>
<!-- ---------------------------------------------------- contenedor_modificaciones_texto --------------- -->




<!-- ---------------------------------------------------- contenedor_modificaciones_texto --------------- -->

<form action="<?=base_url()?>admin/principal/updateBannerText" method="post">
<div class="contenedor_modificaciones" id="contenedor_modificaciones_texto" style="display:none"> <!-- Contenedor negro imagenes-->
<div class="cerrar_modificaciones"> <img src="<?php echo base_url()?>images/cerrar.png" onclick="oculta('contenedor_modificaciones_texto');"/> </div>
<input type="hidden" id="zonaContent" name="zonaContent" value="<?=$zonaT?>" />
<input type="hidden" id="seccionContent" name="seccionContent" value="<?=$seccion?>" />
<input type="hidden" id="posicionContent" name="posicionContent" value="" />
<input type="hidden" id="bannerIDContent" name="bannerIDContent" value="" />

<div class="modificaciones"> 
<div class="titulo_modificaciones"> 
AGREGAR TEXTO
</div>
<div class="contenido_intruciones">
<p> Introduzca el texto para BC0001-0000001 </p>
</brSS>
<textarea cols="65" rows="7" name="texto" id="texto"></textarea>

</div>
<ul class="morado_reg">
<li>
<input type="submit" value="Guardar" />
</li>
</ul>



</div>

</div> <!-- Fin contenedor negro imagenes -->
</form>
<!-- ---------------------------------------------------- contenedor_modificaciones_texto --------------- -->



<!-- ---------------------------------------------------- contenedor_delete --------------- -->
<form action="<?=base_url()?>admin/principal/deleteContent" method="post">

<div class="contenedor_modificaciones" id="contenedor_delete" style="display:none"> <!-- Contenedor negro imagenes-->
<div class="cerrar_modificaciones"> <img src="<?php echo base_url()?>images/cerrar.png" onclick="oculta('contenedor_delete');"/> </div>


<div class="modificaciones"> 
<div class="titulo_modificaciones"> 
ELIMINAR CONTENIDO</div>
<div class="contenido_intruciones">
<p>El contenido seleccionado será borrado </p>
</brSS>

<input type="hidden" id="zonaContentDel" name="zonaContent" value="<?=$zonaT?>" />
<input type="hidden" id="seccionContentDel" name="seccionContent" value="<?=$seccion?>" />
<input type="hidden" id="posicionContentDel" name="posicionContent" value="4" />
<input type="hidden" id="bannerIDContentDel" name="bannerIDContent" value="" />

</div>
<ul class="morado_reg">
<li>
<input type="submit" value="Borrar" />
</li>
</ul>



</div>

</div> <!-- Fin contenedor negro imagenes -->
</form>
<!-- ---------------------------------------------------- contenedor_delete--------------- -->


<!-- ---------------------------------------------------- contenedor_delete_text --------------- -->
<form action="<?=base_url()?>admin/principal/deleteBannerText" method="post" id="deleteTextForm">

<div class="contenedor_modificaciones" id="contenedor_delete_text" style="display:none"> <!-- Contenedor negro imagenes-->
<div class="cerrar_modificaciones"> <img src="<?php echo base_url()?>images/cerrar.png" onclick="oculta('contenedor_delete_text');"/> </div>


<div class="modificaciones"> 
<div class="titulo_modificaciones"> 
ELIMINAR TEXTO</div>
<div class="contenido_intruciones">
<p>El contenido seleccionado será borrado </p>
</brSS>

<input type="hidden" id="zonaContentT" name="zonaContentT" value="<?=$zonaT?>" />
<input type="hidden" id="seccionContentT" name="seccionContentT" value="<?=$seccion?>" />
<input type="hidden" id="posicionContentT" name="posicionContentT" value="" />
<input type="hidden" id="bannerIDContentT" name="bannerIDContentT" value="" />
<input type="hidden" id="textoT" name="textoT" value=""/>

</div>
<ul class="morado_reg">
<li>
<input type="submit" value="Borrar" />
</li>
</ul>



</div>

</div> <!-- Fin contenedor negro imagenes -->
</form>
<!-- ---------------------------------------------------- contenedor_delete_text--------------- -->


<!-- ---------------------------------------------------- encabezado --------------- -->





<div class="contenedor_central">
<div class="titulo_seccion">
PANTALLAS- <label id="nombreSeccion"><label id="seccion"><?=$seccionNombre->seccionNombre?></label>
</div>
<div class="contenedor_buscador">
<div class="fondo_select">
<select class="estilo_select filtro" id="genero" name="genero">
 <option style="background-color: #999;" value = "">Seleccione la zona
 </option>
 <?php if ($zonageografica != Null):
 	foreach ($zonageografica as $zona) {?>
<option style="background-color: #999;" value = "<?php echo $zona -> zonaID; ?>" title="<?php echo $zona -> zona;?>"<?=($zonaT == $zona -> zonaID) ? 'selected="selected"' : ''?>?> <?php echo $zona -> zona;?>
 </option>
 <?php } endif;?>

</select>
</div>
</div>

<div class="subtitulo">
ZONA- <label id="zonaNombre"><label id="nombreZona"><?=$zonaNombre->zona?></label></label>
</div>

<!--       CONTENIDO SUPERIOR       -->
<table class="tabla_carrito superior" width="990" style="display:none">
<tr>
<th width="84">
Nivel 1
</th>
<th width="81">
Nivel 2
</th>
<th width="88">
Nivel 3
</th>
<th width="137">
Tipo
</th>
<th width="136">
Ubicación
</th>
<th width="310">
Contenido
</th>
<th width="122">
Ajustes
</th>
</tr>
<tr>
<td bgcolor="#E6E7E8" class="nivel">
BP00001
</td>
<td bgcolor="#E6E7E8">

</td>
<td bgcolor="#E6E7E8">

</td>
<td bgcolor="#E6E7E8">
Banner Publicidad
</td>
<td bgcolor="#E6E7E8">
  Lateral
</td>
<td bgcolor="#E6E7E8">

</td>

<td bgcolor="#E6E7E8">
<img src="<?php echo base_url()?>images/agregar.png" class="addContent" data-rel="4"/>
<img src="<?php echo base_url()?>images/baja_contenido.png" class="deleteContent" data-rel="0" id="4"/>
</td>

</tr>

<?php if($contenido != null):
	  $contador = 0;
	  foreach($contenido as $c):

	  if($c->posicion == 4):?>
<tr class="zona<?=$c->zonaID?><?=$c->seccionID?> row" style="display:none;">
<td>

</td>
<td>
<?=++$contador?>
</td>
<td>
<input type="hidden" id="bannerID" name="bannerID" value="<?=$c->bannerID?>"/>
</td>
<td>
Imagen
</td>




<td>

</td>
<td>
<img src="<?php echo base_url()?>images/<?php echo $c->imgbaner?>" width="290" height="40" />
</td>
<td>
<img src="<?php echo base_url()?>images/baja_contenido.png" class="deleteContent" data-rel="<?php echo $c->bannerID?>" id="4"/>
</td>

</tr>
	  <?php 
	  endif;
	  endforeach;
	  endif; ?>

</table>
<!--       CONTENIDO SUPERIOR       -->