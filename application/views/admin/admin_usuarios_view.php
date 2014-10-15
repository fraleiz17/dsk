<?php $this -> load -> view('admin/menu_view.php') ?>
<link rel="stylesheet" href="<?php echo base_url()?>css/validator/validationEngine.jquery.css" type="text/css"/>
<script src="<?php echo base_url()?>js/funciones_.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>js/funciones_index.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url()?>js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>js/validator/languages/jquery.validationEngine-es.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>js/validator/jquery.validationEngine.js"></script>
 
<script>
jQuery(document).ready(function(){
	buscar();
	
	$(".search").change(
	function(){
		buscar();		        
	}
	);
	
	$("#bloquearUsuario").submit(function(e) {
		 	e.preventDefault();
            var form = $(this);
                $.ajax({
                                    url: '<?=base_url()?>admin/principal/banear',
                                    data: $('#bloquearUsuario').serialize(),
                                    dataType: 'JSON',
                                    type: 'post',
                                    success: function(data) {
                                       if(data.response = true){
										   muestra('contenedor_correcto');
										   oculta('contenedor_modificar_usuario');
										   buscar();										   
										} else {
											muestra('contenedor_error');
										}
                                    }
                                });
     });
	 
	 $("#addAdmin").submit(function(e) {
		 	e.preventDefault();
            var form = $(this);
                $.ajax({
                                    url: '<?=base_url()?>admin/principal/registrarAdmin',
                                    data: $('#addAdmin').serialize(),
                                    dataType: 'JSON',
                                    type: 'post',
                                    success: function(data) {
                                       if(data.response = true){
										   muestra('contenedor_correcto');
										   oculta('contenedor_modificaciones');
										   $('#addAdmin')[0].reset();
										   buscar();										   
										} else {
											muestra('contenedor_error');
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

function buscar(){
	$("#resultadosU").html('<tr><td colspan="7" style="width: 100% important; text-align: center !important;"> BUSCANDO... </td></tr>');
	$.ajax({
		url     : '<?=base_url()?>admin/principal/buscarUsuario/',
		type    : 'POST',
		data    : $("#buscador").serialize(),
		success : function(data){
			$('#resultadosU').html(data);
		}                                       
	})
}

</script>

<div class="contenedor_modificaciones" id="contenedor_modificaciones" style="display:none"> <!-- Contenedor negro imagenes-->
<div class="cerrar_modificaciones"> <img src="<?=base_url()?>images/cerrar.png" onclick="oculta('contenedor_modificaciones');"/> </div>


<div class="modificaciones"> 
<div class="titulo_modificaciones"> 
ALTAS ADMINISTRADOR
</div>

<div class="contenido_intruciones">

<form action="<?=base_url()?>admin/principal/registrarAdmin" method="post" id="addAdmin">
<table> 
<tr valign="top"> 
<td width="115" height="33"> Nombre: </td>
<td width="264"><input type="text" name="nombre" id="nombre" class="validate[required],custom[onlyLetterSp]"/> *</td>
</tr>
<tr height="33"> 
<td> Apellido: </td>
<td><input type="text" name="apellido" id="apellido" class="validate[required],custom[onlyLetterSp]"/> *</td>
</tr>
<tr height="33"> 
<td> E-mail: </td>
<td><input type="text" name="correo" class="validate[required,custom[email]]" /> *</td>
</tr>
<tr height="33"> 
<td> Teléfono: </td>
<td><input type="text" name="telefono" class="validate[custom[onlyNumberSp],minSize[10]]"/></td>
</tr>
<tr height="33"> 
<td> Contraseña: </td>
<td><input type="password" name="contrasena"  id="contrasena1" class="validate[required],minSize[6],maxSize[12]"/> *</td>
</tr>
<tr height="33"> 
<td> Confirmar contraseña: </td>
<td valign="bottom"><input type="password" name="confirmar"  id="contrasena2" class="validate[required,equals[contrasena1]]"/> *</td>
</tr>
</table>


</div>
<ul class="morado_reg">
<li>
<input type="submit" value="Agregar" />
</li>
</ul>
</form>
</div>

</div> <!-- Fin contenedor negro imagenes -->




</div> <!-- Fin contenedor negro imagenes -->






<div class="contenedor_modificaciones" id="contenedor_modificar_usuario" style="display:none"> <!-- Contenedor negro imagenes-->
<div class="cerrar_modificaciones"> <img src="<?=base_url()?>images/cerrar.png" onclick="oculta('contenedor_modificar_usuario');"/> </div>


<div class="modificaciones"> 
<div class="titulo_modificaciones"> 
USUARIOS
</div>

<div class="contenido_intruciones">
</br>
<form action="<?=base_url()?>admin/principal/banear" id="bloquearUsuario" method="post">
<table > 
<tr> 
<td width="91"> Nombre: </td>
<td width="317"> <input type="text" name="nombreUB" id="nombreUB"/> </td>
</tr>
<tr> 
<td> Apellido: </td>
<td> <input type="text" name="apellidoUB" id="apellidoUB"/> </td>
</tr>
<tr> 
<td> E-mail: </td>
<td> <input type="text" name="correoUB" id="correoUB"/> </td>
</tr>
</table>


<input type="hidden" name="usuarioUB" id="usuarioUB" />
</div>
<ul class="morado_reg">
<li>
<input type="submit" value="Dar de baja" />
</li>
</ul>
</form>
</div>

</div> <!-- Fin contenedor negro imagenes -->





<!--		EXITO REGISTRO							-->
<!-- ------------------------------------------------------ -->
<div class="contenedor_modificaciones" id="contenedor_correcto" style="display:none"> <!-- Contenedor negro imagenes-->
<div class="cerrar_modificaciones"> <img src="<?=base_url()?>images/cerrar.png" onclick="oculta('contenedor_correcto');"/> </div>


<div class="modificaciones"> 
<div class="titulo_modificaciones"> 
BLOQUEADO
</div>

<div class="contenido_intruciones">
</br>
El usuario ha sido dado de baja exitosamente
</div>
</div>

</div> <!-- Fin contenedor negro imagenes -->

<!--		FIN EXITO REGISTRO						-->
<!-- ------------------------------------------------------ -->


<!--		ERROR REGISTRO							-->
<!-- ------------------------------------------------------ -->

<div class="contenedor_modificaciones" id="contenedor_error" style="display:none"> <!-- Contenedor negro imagenes-->
<div class="cerrar_modificaciones"> <img src="<?=base_url()?>images/cerrar.png" onclick="oculta('contenedor_error');"/> </div>


<div class="modificaciones"> 
<div class="titulo_modificaciones"> 
BLOQUEADO
</div>

<div class="contenido_intruciones">
</br>
El usuario no ha sido dado de baja, intente nuevamente
</div>
</div>

</div> <!-- Fin contenedor negro imagenes -->


<!--		FIN ERROR REGISTRO							-->
<!-- ------------------------------------------------------ -->















<div class="contenedor_central">
<div class="titulo_seccion">
USUARIOS
</div>
<div class="contenedor_buscador">
<form id="buscador" method="post">
<div class="fondo_select">
<select   class="estilo_select search" id="tipoUsuario" name="tipoUsuario">
<option style="background-color: #999;" value="0"> Administrador </option>
<option style="background-color: #999;" value="1"> Normal </option>
<option style="background-color: #999;" value="2"> Negocio </option>
<option style="background-color: #999;" value="3"> Asociación </option>
</select>
</div>
<div class="fondo_select">
<select   class="estilo_select search" id="zona" name="zona">
<option style="background-color: #999;" value="">Seleccione la zona
 </option>
 <?php if ($zonageografica != Null):
 	foreach ($zonageografica as $zona) {?>
<option style="background-color: #999;" value = "<?php echo $zona -> zonaID; ?>" title="<?php echo $zona -> zona;?>"> <?php echo $zona -> zona;?></option>
 <?php } endif;?>
</select> 
</div>
</form>
</div>

<div class="subtitulo">
LISTADO DE USUARIOS
</div>

<div id="resultados">
<table class="tabla_carrito" width="990">
<tr>
<th width="78">
ID Usuario
</th>
<th width="97">
Nombre
</th>
<th width="148">
Apellido
</th>
<th width="133">
Correo
</th>
<th width="161">
Teléfono
</th>
<th width="172">
Tipo de usuario
</th>
<th width="169">
Ajustes
</th>
</tr>


<tr>
<td bgcolor="#E6E7E8">

</td>
<td bgcolor="#E6E7E8">

</td>
<td bgcolor="#E6E7E8">

</td>
<td bgcolor="#E6E7E8">&nbsp;</td>
<td bgcolor="#E6E7E8">&nbsp;</td>
<td bgcolor="#E6E7E8">

</td>

<td bgcolor="#E6E7E8">
<img src="<?=base_url()?>images/agregar.png" onclick="muestra('contenedor_modificaciones');"/>

</td>

</tr>

</table>
<table class="tabla_carrito" width="990" id="resultadosU">
</table>
</div>

</body>
