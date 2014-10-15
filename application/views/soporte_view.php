<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Quierounperro</title>
    <link rel="shortcut icon" href="<?php echo base_url() ?>images/ico.ico"/>
    <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>css/reset.css" media="screen"></link>

    <link rel="stylesheet" href="<?php echo base_url() ?>css/nivo-slider.css" type="text/css" media="screen"/>
    <link rel="stylesheet" href="<?php echo base_url() ?>css/responsiveslides.css">
    <link href="<?php echo base_url() ?>css/bootstrap.min.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="<?php echo base_url() ?>css/validator/validationEngine.jquery.css" type="text/css"/>

    <script type="text/javascript" src="<?php echo base_url() ?>js/jquery-1.8.2.min.js"></script>
    <script type="text/javascript"
            src="<?php echo base_url() ?>js/validator/languages/jquery.validationEngine-es.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>js/validator/jquery.validationEngine.js"></script>


    <!--<script src="<?php echo base_url() ?>js/jquery-latest.js" type="text/javascript"></script>-->
    <script src="<?php echo base_url() ?>js/funciones_index.js" type="text/javascript"></script>


  <link type="text/css" rel="stylesheet" href="<?php echo base_url()?>css/index_.css" media="screen"></link> <link type="text/css" rel="stylesheet" href="<?php echo base_url()?>css/general.css" media="screen"></link> 

    <!-- [if lt IE ]>
    <link type="text/css" rel="stylesheet" href="<?php echo base_url()?>css/index_explorer.css" media="screen"></link>
    <![endif]-->

    <!-- <script src="<?php echo base_url() ?>js/jquery_1.4.js" type="text/javascript"></script>-->
    <!-- <script src="<?php echo base_url() ?>js/jquery-1.10.2.js"></script>
 <script src="<?php echo base_url() ?>js/jquery.validate.js" type="text/javascript"></script>-->
    <script src="<?php echo base_url() ?>js/funciones_index.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>js/jquery.nivo.slider.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>js/responsiveslides.min.js"></script>
    <script src="<?php echo base_url() ?>js/jquery-ui.js"></script>
    <!-- include jQuery library -->

    <!-- include Cycle plugin -->
    <script type="text/javascript" src="<?php echo base_url() ?>js/jquery.cycle.all.js"></script>

    <script>
jQuery(document).ready(function(){

	
	$("#pub").submit(function(e) {
		 	e.preventDefault();
            var form = $(this);
                $.ajax({
                                    url: '<?=base_url()?>quienes/publicidad_do',
                                    data: $('#pub').serialize(),
                                    dataType: 'JSON',
                                    type: 'post',
                                    success: function(data) {
                                       if(data.response = true){
										   alert('Mensaje Enviado');
										   muestra('contenedor_correctoQUP');			   
										} else {
											muestra('contenedor_error');
										}
                                    }
                                });
     });
	 
	 $("#sop").submit(function(e) {
		 	e.preventDefault();
            var form = $(this);
                $.ajax({
                                    url: '<?=base_url()?>quienes/soporte',
                                    data: $('#sop').serialize(),
                                    dataType: 'JSON',
                                    type: 'post',
                                    success: function(data) {
                                       if(data.response = true){
										   alert('Mensaje Enviado');
										   oculta('soporteQUP');
										   muestra('contenedor_correctoQUP');	   
										} else {
											muestra('contenedor_error');
										}
                                    }
                                });
     });
	 

});

        jQuery(document).ready(function () {
            // binds form submission and fields to the validation engine
            jQuery("form").validationEngine({
                promptPosition: "topRight",
                scroll: false,
                ajaxFormValidation: false,
                ajaxFormValidationMethod: 'post'
            });


        });



    </script>

</head>
<body>
<?php if($tipo == 1 ){?>
 <!-- /////   Contenedor publicidad -->
 <!-- -->
 <!-- -->
<div class="contenedor_negro" id="soporteQUPP" style="display:;">
<div class="cerrar_publi"> <img src="<?php echo base_url() ?>images/cerrar.png" onclick="window.location.href='<?=base_url()?>'"/> </div>
<div class="contenedor_publicidad">
<div class="titulo_publicidad"> PUBLICIDAD </div>
<div class="instrucciones"> ¿Quieres anunciar tu marca, producto, servicio o evento con nosotros? </div>
<div class="contenedor_perrito_instrucciones"> <img src="<?php echo base_url() ?>images/pero_paso_uno.png" width="94" height="84" /><div class="instrucciones_perrito"> Envianos tus datos y nos ponemos en contacto contigo</div></div>
</br>
</br>
<form action="<?=base_url()?>quienes/publicidad" method="post" id="pub">
<table class="tabla_contacto_publicidad"> 
<tr> 
<td height="30"> Contacto: </td>
<td> <input name="nombre" type="text" class="input_bg_gris validate[required]" id="nombre" placeholder=" Nombre" /> <input name="apellido" type="text" class="input_bg_gris validate[required]" id="apellido" placeholder=" Apellidos" /></td>
</tr>
<tr>
<td height="30"> E-mail: </td>
<td><input name="correo" type="text" class="input_bg_gris validate[required]" id="correo" placeholder="ejemplo@uno.com" /> </td>
</tr>
<tr>
<td height="31"> Teléfono: </td>
<td> <input name="telefono" type="text" class="input_bg_gris validate[required]" id="telefono" /> </td>
</tr>
<tr> 
<td height="30"> Empresa: </td>
<td> <input name="empresa" type="text" class="input_bg_gris" id="empresa" /> </td>
</tr>
<tr> 
<td height="30"> Sitio Web: </td>
<td> <input name="web" type="text" class="input_bg_gris" id="web"/> </td>
</tr>
</table>
<div class="separador_morado_publicidad"> </div>
<table class="tabla_contacto_publicidad"> 
<tr>
<td height="30" >¿Como te enteraste de nosotros?: </td>
<td > <select name="fuente" class="input_bg_gris validate[required]" id="fuente" >
    <option> ---- </option>
    <option> Redes sociales </option>
    <option> Buscadores web </option>
    <option> Publicidad Impresa </option>
    <option> Evento </option>
    <option> Otro </option>
 </select> </td>
</tr>
<tr> 
<td colspan="3">
Comentarios: 
</br>
<textarea name="comentarios" cols="40" rows="5" class="input_bg_gris validate[required]" id="comentarios" ></textarea>
 </td>
</tr>
</table>

<ul class="morado_pub">
<li>
<input type="submit" value="Enviar" />
</li>
</ul>
</form>
</div>
 </div>
 <?php } else { ?>
 <!-- /////   Contenedor soporte -->
 <!-- -->
 <!-- -->
 
 <div class="contenedor_negro" id="soporteQUP" style="display:;">
 <div class="cerrar_publi"> <img src="<?=base_url()?>images/cerrar.png" onclick="window.location.href='<?=base_url()?>'"/> </div>
 <div class="contenedor_publicidad">
 <div class="titulo_publicidad"> SOPORTE </div>
<div class="instrucciones"> ¿Tienes problemas en nuestra pagina? </div>
<div class="contenedor_perrito_instrucciones"> <img src="<?=base_url()?>images/pero_paso_uno.png" width="94" height="84" /><div class="instrucciones_perrito_soporte"> Si estás teniendo problemas con la compra de algún paquete, la creación de tu anuncio o tienes cualquier comentario, contáctanos.</div>

</div>
</br>
<form action="<?=base_url()?>quienes/soporte" method="post" id="sop">
<table width="692" class="tabla_soporte">
<tr> 
<td width="115" height="30"> Contacto: </td>
<td width="336"> <input name="nombre" type="text" class="input_bg_gris" id="nombre" placeholder=" Nombre" /> <input name="apellido" type="text" class="input_bg_gris" id="apellido" placeholder=" Apellidos" /> </td>
<td width="73"> E-mail:</td>
<td width="166"> <input name="correo" type="text" class="input_bg_gris" id="correo" placeholder="ejemplo@hotmail.com"/> </td>
</tr>
<tr>
<td height="30"> Asunto: </td>
<td colspan="3"><input type="text" class="input_bg_gris" /></td>
 </tr>
<tr> 
<td height="30"> Comentarios: </td>
<td colspan="3"> <textarea name="comentarios" cols="67" class="input_bg_gris" id="comentarios"> </textarea></td>
</tr>
 </table>
 </br>
 </br>
 
 <ul class="morado_pub">
<li>
<input type="submit" value="Enviar" />
</li>
</ul>
</form>
 </div>
 
  </div>

<?php }?>

<script type="text/javascript">

</script>

<!--		EXITO REGISTRO							-->
<!-- ------------------------------------------------------ -->
<div class="contenedor_modificaciones" id="contenedor_correctoQUP" style="display:none"> <!-- Contenedor negro imagenes-->
<div class="cerrar_modificaciones"> <img src="<?=base_url()?>images/cerrar.png" onclick="window.location.href='<?=base_url()?>'"/> </div>


<div class="modificaciones"> 
<div class="titulo_modificaciones"> 
CORRECTO
</div>

<div class="contenido_intruciones">
</br>
El correo se envió exitosamente
</div>
</div>

</div> <!-- Fin contenedor negro imagenes -->

<!--		FIN EXITO REGISTRO						-->
<!-- ------------------------------------------------------ -->


<!--		ERROR REGISTRO							-->
<!-- ------------------------------------------------------ -->

<div class="contenedor_modificaciones" id="contenedor_errorQUP" style="display:none"> <!-- Contenedor negro imagenes-->
<div class="cerrar_modificaciones"> <img src="<?=base_url()?>images/cerrar.png" onclick="window.location.href='<?=base_url()?>'"/> </div>


<div class="modificaciones"> 
<div class="titulo_modificaciones"> 
ERROR
</div>

<div class="contenido_intruciones">
</br>
Intente nuevamente por favor.
</div>
</div>

</div> <!-- Fin contenedor negro imagenes -->


<!--		FIN ERROR REGISTRO							-->
<!-- ------------------------------------------------------ -->


</body>
</html>