<?=$this->load->view('admin/menu_view');?>

<link rel="stylesheet" href="<?php echo base_url()?>css/validator/validationEngine.jquery.css" type="text/css"/>
<script type="text/javascript" src="<?php echo base_url()?>js/validator/languages/jquery.validationEngine-es.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>js/validator/jquery.validationEngine.js"></script>
<script type="text/javascript">
jQuery(document).ready(function(){
 $(".cursor").click(function() {		 	
             var paqueteID = $(this).attr('id'); 
			 muestra('contenedor_modificaciones_paquete'+paqueteID);
     });
	 
  $(".agregar").click(function(e){
        e.preventDefault(); 
		 var paqueteID = $(this).attr('data-rel');  
		 var tipoCupon = $(this).attr('id');
		 var cupones = $('#cupones').val();
		 var contador = 0; 
		 var tienda = $('#cuponTiendaO'+paqueteID).val();
		 var paquete = $('#cuponPaqueteO'+paqueteID).val();
		 var negocio = $('#cuponNegocioTiendaO'+paqueteID).val();
		 var negocioVal = $('#cuponNegocioO'+paqueteID).val();
		$('#cuponTiendaO'+paqueteID).val('');
		$('#cuponPaqueteO'+paqueteID).val('');
		$('#cuponNegocioTiendaO'+paqueteID).val('');
		$('#cuponNegocioO'+paqueteID).val('');
       /* $('#colorP'+productoID).removeClass('validate[required]');
		var color = $('#colorP'+productoID).val();
		$('#colorP'+productoID).val('');
cuponTiendaO
cuponPaqueteO
cuponNegocioTiendaO
cuponNegocioO
		*/
		
		if(tipoCupon == 1){
		$('<p id="cupon'+paqueteID+'"><input name="cuponTienda[]" value="'+tienda+'" type="text" id="cuponTienda" size="3" class="validate[required],custom[number]"/>% <a href="#" id="eliminar" class="eliminar" style="color:#fff; font-size:9px;">Eliminar</a><br /></p>').appendTo('#cupon1'+paqueteID);
		} 
		if(tipoCupon == 2){
		$('<p id="cupon'+paqueteID+'"><input name="cuponPaquete[]" value="'+paquete+'" type="text" id="cuponPaquete" size="3" class="validate[required],custom[number]"/>% <a href="#" id="eliminar" class="eliminar" style="color:#fff; font-size:9px;">Eliminar</a><br /></p>').appendTo('#cupon2'+paqueteID);
		} 
		if(tipoCupon == 3) {
		$('<p id="cupon'+paqueteID+'"><select name="cuponNegocioTienda[]" id="cuponNegocioTienda" class="validate[required]"><option value="'+negocio+'">'+negocio+'</option><?php if($tiendas != null){ foreach ($tiendas as $tienda) { ?><option value="<?=$tienda->nombreNegocio?>"><?=$tienda->nombreNegocio?></option><?php } }?></select><input name="cuponNegocio[]" type="text" id="cuponNegocio" value="'+negocioVal+'" size="3" class="validate[required],custom[number]"/>% <a href="#" id="eliminar" class="eliminar" style="color:#fff; font-size:9px;">Eliminar</a><br /></p>').appendTo('#cupon3'+paqueteID);
		}
		
		contador++;
        
   	 });
	 
	 $("body").on("click",".eliminar", function(e){
            $(this).parent('p').remove(); 
        return false;
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
</script>

<?php foreach($paquetes as $paquete){?>
<form id="paquetes" action="<?=base_url()?>admin/paquetes/editPaquete" method="post">
<div class="contenedor_modificaciones" id="contenedor_modificaciones_paquete<?=$paquete->paqueteID;?>" style="display:none"> <!-- Contenedor negro imagenes-->
<div class="cerrar_modificaciones"> <img src="<?=base_url()?>images/cerrar.png" onclick="oculta('contenedor_modificaciones_paquete<?=$paquete->paqueteID;?>');"/> </div>


<div class="modificaciones"> 
<div class="titulo_modificaciones"> 
EDITAR PAQUETE
</div>
<div class="contenido_intruciones">
<table> 
<tr>
<td width="92">
Paquete:</td> <td width="387"> <strong><?=$paquete->nombrePaquete;?></strong></td>
</tr>
<tr>
<td>
<input type="hidden" name="paqueteID" id="paqueteID" value="<?=$paquete->paqueteID;?>"/>
Fotos:</td> <td> <input name="cantFotos" type="text" id="cantFotos" value="<?=$paquete->cantFotos;?>" class="validate[required],custom[number]" /></td>
</tr>
<tr>
<td>
Texto:</td> <td> <input name="caracteres" type="text" id="caracteres" value="<?=$paquete->caracteres;?>" class="validate[required],custom[number]"/></td>
</tr>
<tr>
<td>
Vigencia:</td> <td> <input name="vigencia" type="text" id="vigencia" value="<?=$paquete->vigencia;?>" class="validate[required],custom[number]"/></td>
</tr>
<tr>
<td>
Videos:</td><td> <input name="videos" type="text" id="videos" value="<?=$paquete->videos;?>" class="validate[required],custom[number]"/></td>
</tr>
<tr>
<td>
Cupones:</td> <td> <input name="cupones" type="text" id="cupones" value="<?=$paquete->cupones;?>" class="validate[required],custom[number]"/></td>
</tr>
<tr>
<td colspan="2">
<strong>Detalle de cupones:</strong>
</br>
</br>
<table class="tabla_cupones" width="482"> 
<tr> 
<th width="138">
TIENDA
</th>
<th width="148">
PAQUETES
</th>
<th width="180">
NEGOCIO
</th>
</tr>
<tr> 
<td id="cupon1<?=$paquete->paqueteID;?>">
<input name="cuponTienda[]" type="hidden" id="cuponTienda" size="3" value="0"/>
<input name="cuponTienda[]" type="text" id="cuponTiendaO<?=$paquete->paqueteID;?>" size="3"/>% <a class="agregar" href="# " id="1" data-rel="<?=$paquete->paqueteID;?>"> Agregar </a>
<?php if($cupones != null){
	foreach($cupones as $cupon){
		if($cupon->paqueteID == $paquete->paqueteID && $cupon->tipoCupon == 1){?>
<p id="cupon<?=$paquete->paqueteID;?>"><input name="cuponTienda[]" type="text" id="cuponTienda" size="3" class="validate[required],custom[number]" value="<?=$cupon->valor?>"/>% <a href="#" id="eliminar" class="eliminar" style="color:#fff; font-size:9px;">Eliminar</a>
<?php }}}?>
</td>
<td id="cupon2<?=$paquete->paqueteID;?>">
<input name="cuponPaquete[]" type="hidden" id="cuponPaquete" size="3" value="0"/>
<input name="cuponPaquete[]" type="text" id="cuponPaqueteO<?=$paquete->paqueteID;?>" size="3"/>% <a class="agregar" href="#" id="2" data-rel="<?=$paquete->paqueteID;?>"> Agregar </a>
<?php if($cupones != null){
	foreach($cupones as $cupon){
		if($cupon->paqueteID == $paquete->paqueteID && $cupon->tipoCupon == 2){?>
<p id="cupon<?=$paquete->paqueteID;?>"><input name="cuponPaquete[]" type="text" id="cuponPaquete" size="3" class="validate[required],custom[number]" value="<?=$cupon->valor?>"/>% <a href="#" id="eliminar" class="eliminar" style="color:#fff; font-size:9px;">Eliminar</a>
<?php }}}?>
</td>
<td id="cupon3<?=$paquete->paqueteID;?>">
<input name="cuponNegocioTienda[]" type="hidden" id="cuponNegocioTienda" size="3" value="0" />
<select name="cuponNegocioTienda[]" id="cuponNegocioTiendaO<?=$paquete->paqueteID;?>">
<option value> Seleccione </option>
<?php if($tiendas != null){
		foreach ($tiendas as $tienda) { ?>
			<option value="<?=$tienda->nombreNegocio?>"><?=$tienda->nombreNegocio?></option>
<?php		}
	}?>
</select> 
<input name="cuponNegocio[]" type="hidden" id="cuponNegocio" size="3" value="0" />
<input name="cuponNegocio[]" type="text" id="cuponNegocioO<?=$paquete->paqueteID;?>" size="3" />% <a class="agregar" href="#" id="3" data-rel="<?=$paquete->paqueteID;?>"> Agregar </a>

<?php if($cupones != null){
	foreach($cupones as $cupon){
		if($cupon->paqueteID == $paquete->paqueteID && $cupon->tipoCupon == 3){?>
<p id="cupon<?=$paquete->paqueteID?>"><select name="cuponNegocioTienda[]"id="cuponNegocioTienda" class="validate[required]">
<option value> Seleccione </option>
<?php if($tiendas != null){
		foreach ($tiendas as $tienda) { ?>
			<option value="<?=$tienda->nombreNegocio?>" <?=($cupon->descripcion == $tienda->nombreNegocio) ? 'selected="selected"' : ''?>><?=$tienda->nombreNegocio?></option>
<?php		}
	}?>
</select><input name="cuponNegocio[]" type="text" id="cuponNegocio" size="3" class="validate[required],custom[number]" value="<?=$cupon->valor;?>"/>% <a href="#" id="eliminar" class="eliminar" style="color:#fff; font-size:9px;">Eliminar</a>
<?php }}}?>

</td>
</tr>
</table>

</br>

</td>
<tr> 
<td> Costo: </td> <td> <input name="precio" type="text" id="precio" value="<?=$paquete->precio;?>"/>$</td>
</tr>
</table>
</p>

</div>
<ul class="morado_reg">
<li>
<input type="submit" value="Guardar" />
</li>
</ul>



</div>

</div> <!-- Fin contenedor negro imagenes -->
</form>
<?php }?>








<div class="contenedor_central">
<div class="titulo_seccion">
PAQUETES- ANUNCIOS
</div>
</br>
<table class="tabla_carrito" width="990">
<tr>
<th width="84">
Paquete
</th>
<!--<th width="81">
Disponibles
</th>-->
<th width="81">
Fotos
</th>
<th width="88">
Texto
</th>
<th width="137">
Vigencia
</th>
<th width="136">
Videos
</th>
<th width="310">
Cupones
</th>
<th width="122">
Costo
</th>
<th width="122">

</th>
</tr>
<?php foreach($paquetes as $paquete){?>

<tr >
<td>
<?php if($paquete->paqueteID == 1){?>
<img src="<?=base_url()?>images/pago_lite.png" width="171" height="86"/>
<?php } elseif($paquete->paqueteID == 2){?>
<img src="<?=base_url()?>images/pago_regular.png" width="171" height="86"/>
<?php }else{?>
<img src="<?=base_url()?>images/pago_premium.png" width="171" height="86"/>
<?php  } ?>
</td>
<!--<td>
1
</td>-->
<td>
<?=$paquete->cantFotos;?>
</td>
<td>
<?=$paquete->caracteres?>
</td>
<td>
<?=$paquete->vigencia?> días
</td>
<td>
<?=$paquete->videos?>
</td>
<td>
<?=$paquete->cupones;?><br /><br />
<?php if($cupones != null){
	foreach($cupones as $cupon){
		if($cupon->paqueteID == $paquete->paqueteID){
			echo $cupon->valor.'% '.$cupon->nombreCupon.'<br>';
			
			?>
        
<?php }
	}
}?>
</td>
<td>
<?=$paquete->precio?>
</td>
<td>
<img src="<?=base_url()?>images/editar.png" class="cursor" id="<?=$paquete->paqueteID;?>"/>
</td>

</tr>
<?php 
	
} ?>


</table>

</div>

</body>
