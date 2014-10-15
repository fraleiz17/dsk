<?php if($usuarios != null){
		foreach($usuarios as $usuario){?>
<tr>
<td height="74" width="78"><?=$usuario->idUsuario?></td>
<td width="97">
<label id="nombre<?=$usuario->idUsuario?>"><?=$usuario->nombre?></label>
</td>
<td width="148">
<label id="apellido<?=$usuario->idUsuario?>"><?=$usuario->apellido?></label>
</td>
<td width="133">
<label id="correo<?=$usuario->idUsuario?>"><?=$usuario->correo?></label>
</td>
<td width="161">
<?=$usuario->telefono?>
</td>
<td width="172"><?=($usuario->tipoUsuario == 1 && $usuario->tipoUsuario != 0) ? 'Normal' : (($usuario->tipoUsuario == 2 && $usuario->tipoUsuario != 0) ? 'Negocio' : (($usuario->tipoUsuario == 3 && $usuario->tipoUsuario != 0) ? 'Asociacion' : 'Administrador'))?></td>
<td width="169">
<img class="usuarioAB" id="<?=$usuario->idUsuario?>" src="<?=base_url()?>images/baja_contenido.png"/>
</td>

</tr>

<?php }
} else {?>
<tr><td colspan="7">Sin resultados</td></tr>
<?php }?>

<script>
jQuery(document).ready(function(){

	$(".usuarioAB").click(function(){
		var usuarioID = $(this).attr('id');
		var nombre = $('#nombre'+usuarioID).text();
		var apellido  = $('#apellido'+usuarioID).text();
		var correo = $('#correo'+usuarioID).text();
		console.log(usuarioID,nombre,apellido,correo);
		$('#nombreUB').val(nombre);
		$('#apellidoUB').val(apellido);
		$('#correoUB').val(correo);
		$('#usuarioUB').val(usuarioID);
		muestra('contenedor_modificar_usuario');
		      
	});
	
	

});

</script>