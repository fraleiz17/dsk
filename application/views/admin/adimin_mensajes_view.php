<?php $this -> load -> view('admin/menu_view.php') ?>
<link rel="stylesheet" href="<?php echo base_url()?>css/validator/validationEngine.jquery.css" type="text/css"/>
<script src="<?php echo base_url()?>js/funciones_.js" type="text/javascript"></script>
<!--<script type="text/javascript" src="<?php echo base_url()?>js/jquery-1.8.2.min.js"></script>-->
<script type="text/javascript" src="<?php echo base_url()?>js/validator/languages/jquery.validationEngine-es.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>js/validator/jquery.validationEngine.js"></script>
 
<script>
jQuery(document).ready(function(){
	 $("#destinatario").change(function() {
		 	var usuarioID = $('#destinatario option:selected').attr('data-rel');
			console.log(usuarioID);
			$('#usuarioID').val(usuarioID);
     });
	  $(".mensaje").click(function() {
	  	    $('#mensajesEnvio')[0].reset();
		 	var mensajeID = $(this).attr('id');
		 	muestra('mensaje_envio');
			$('#mensajeID').val(mensajeID);
			$('#informacion').html('');
			muestra('contenedor_enviar_mensaje'); 
     });
	 
	  $("#mensajesEnvio").submit(function(e) {
	  		
		 	e.preventDefault();
            var form = $(this);
            oculta('mensaje_envio');
            $('#informacion').html('<div class="">Enviando...</div>');
                $.ajax({
                                    url: '<?=base_url()?>admin/principal/enviarMensaje',
                                    data: form.serialize(),
                                    dataType: 'JSON',
                                    type: 'post',
                                    success: function(data) {
                                       if(data.response = true){
                                       	   oculta('mensaje_envio');
                                       	   $('#informacion').html('<div class="">Mensaje enviado con éxito</div>');
										   //oculta('contenedor_enviar_mensaje');
										   $('#mensajesEnvio')[0].reset();
										} else {
											alert('Intenta Nuevamente');
										}
                                    }
                                });
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
<div class="contenedor_central">
<div class="titulo_seccion">
ENVIO DE MENSAJES
</div>
<div class="contenedor_buscador">

</div>

<div class="subtitulo">
Administraci&oacute;n de mensajes
</div>

</br>

<?php if($mensajes != null){
		foreach($mensajes as $mensaje){?>
<div class="contenedor_modificaciones" id="contenedor_mensaje<?=$mensaje->mensajeID?>" style="display:none"> <!-- Contenedor negro imagenes-->
<div class="cerrar_modificaciones"> <img src="<?php echo base_url()?>images/cerrar.png" onclick="oculta('contenedor_mensaje<?=$mensaje->mensajeID?>');"/> </div>


<div class="modificaciones"> 
<div class="titulo_modificaciones"> 
MENSAJE
</div>
<form action="<?=base_url()?>admin/principal/guardarMensaje/2/<?=$mensaje->mensajeID?>" method="post" id="mensajes">
<div class="mensaje_envio">

<table> 
<tr> 
<td>
Tipo:
 </td>
 <td> <select name="tipoMensaje" id="tipoMensaje" class="validate[required]"> 
 <option value> --- </option> 
 <option value="Oferta" <?=($mensaje->tipoMensaje == "Oferta") ? 'selected="selected"' : ''?>> Oferta </option>
 <option value="Alerta" <?=($mensaje->tipoMensaje == "Alerta") ? 'selected="selected"' : ''?>> Alerta </option>
 <option value="Informativo" <?=($mensaje->tipoMensaje == "Informativo") ? 'selected="selected"' : ''?>> Informativo </option>
 </select> </td>
</tr>
<tr>
<td> Asunto: </td>
<td> <input name="asunto" type="text" class="validate[required]" id="asunto" value="<?=$mensaje->asunto?>" maxlength="80"/> </td>
 </tr>
 <tr> 
 <td> Contenido: </td>
 <td> <textarea name="contenido" id="contenido" class="validate[required]"><?=$mensaje->contenido?></textarea> </td>
 </tr>
</table>

</div>
<ul class="morado_reg">
<li>
<input type="submit" value="Guardar" />
</li>
</ul>

</form>

</div>

</div> <!-- Fin contenedor negro imagenes -->
<?php }
}?>



<div class="contenedor_modificaciones" id="contenedor_enviar_mensaje" style="display:none"> <!-- Contenedor negro imagenes-->
<div class="cerrar_modificaciones"> <img src="<?php echo base_url()?>images/cerrar.png" onclick="oculta('contenedor_enviar_mensaje');"/> </div>


<div class="modificaciones"> 
<div class="titulo_modificaciones"> 
ENVIAR MENSAJE
</div>

<div class="contenido_intruciones" id="mensaje_envio">
<form action="#" method="post" id="mensajesEnvio">
<table> 
<tr>
<td> Mensaje ID</td>
<td> <select name="mensajeID" id="mensajeID" class="validate[requiered]"> 
<option value> --- </option>
<?php if($mensajes != null){
		foreach($mensajes as $mensaje){?>
        <option value="<?=$mensaje->mensajeID?>"><?=$mensaje->mensajeID.' - '.$mensaje->tipoMensaje?></option>
<?php }
} ?> 
</select> </td>
 </tr>
<tr> 
<td> Destinatario: </td>
<td>
<select name="destinatario" id="destinatario" class="validate[requiered]"> 
<option value="todos" data-rel="0"> TODOS </option>
<?php if($usuarios != null){
		foreach($usuarios as $usuario){?>
        <option value="<?=$usuario->correo?>" data-rel="<?=$usuario->idUsuario?>"><?=$usuario->nombre.' '.$usuario->apellido.' - '.$usuario->correo?></option>
<?php }
} ?> 
</select> 
<input type="hidden" value="0" name="usuarioID" id="usuarioID" />
</td>
</tr>

</table>



<ul class="morado_reg">
<li>
<input type="submit" value="Enviar" />
</li>
</ul>
</form>
</div>
<div class="informacion" id="informacion"> 

</div>
</div>

</div> <!-- Fin contenedor negro imagenes -->


<div class="contenedor_modificaciones" id="contenedor_mensaje" style="display:none"> <!-- Contenedor negro imagenes-->
<div class="cerrar_modificaciones"> <img src="<?php echo base_url()?>images/cerrar.png" onclick="oculta('contenedor_mensaje');"/> </div>


<div class="modificaciones"> 
<div class="titulo_modificaciones"> 
MENSAJE
</div>
<form action="<?=base_url()?>admin/principal/guardarMensaje/1/null" method="post" id="mensajes">
<div class="contenido_intruciones">

<table> 
<tr> 
<td>
Tipo:
 </td>
 <td> <select name="tipoMensaje" id="tipoMensaje" class="validate[required]"> 
 <option value> --- </option> 
 <option value="Oferta"> Oferta </option>
 <option value="Alerta"> Alerta </option>
 <option value="Informativo"> Informativo </option>
 </select> </td>
</tr>
<tr>
<td> Asunto: </td>
<td> <input name="asunto" type="text" class="validate[required]" id="asunto" maxlength="80"/> </td>
 </tr>
 <tr> 
 <td> Contenido: </td>
 <td> <textarea name="contenido" id="contenido" class="validate[required]"></textarea> </td>
 </tr>
</table>

</div>
<ul class="morado_reg">
<li>
<input type="submit" value="Guardar" />
</li>
</ul>

</form>

</div>

</div> <!-- Fin contenedor negro imagenes -->

<table width="992" height="213" align="center" class="tabla_carrito"> 
<tr> 
<th width="66"> ID </th>
<th width="66"> Tipo </th>
<th width="131"> Asunto </th>
<th width="76"> Contenido </th>
<th width="37"> </th>
</tr>
<tr> 
<td height="74" bgcolor="#E6E7E8"> </td>
<td bgcolor="#E6E7E8"> </td>
<td bgcolor="#E6E7E8"> </td>
<td bgcolor="#E6E7E8"> </td>
<td bgcolor="#E6E7E8"> <img src="<?php echo base_url()?>images/agregar.png" onclick="muestra('contenedor_mensaje');"/> </td>
</tr>
<?php if($mensajes != null){
		foreach($mensajes as $mensaje){?>
<tr> 
<td height="74"><?=$mensaje->mensajeID?>  </td>
<td height="74"><?=$mensaje->tipoMensaje?> </td>
<td><?=$mensaje->asunto?></td>
<td><?=$mensaje->contenido?>
</td>
<td> <img src="<?php echo base_url()?>images/enviar_mail.png" class="mensaje" id="<?=$mensaje->mensajeID?>"/>&nbsp;&nbsp;
<img src="<?php echo base_url()?>images/editar.png" onclick="muestra('contenedor_mensaje<?=$mensaje->mensajeID?>');"/> </td>
</tr>
<?php }
}?>
</table>

</div>

</body>
