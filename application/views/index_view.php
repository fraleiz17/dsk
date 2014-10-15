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
    <script src="<?php echo base_url() ?>js/funciones_.js" type="text/javascript"></script>


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
        jQuery(document).ready(function () {

            /*$(".paquete_comprar").click(function() {  
            <?php if (is_logged()): ?>  
             var paquete_val = $(this).data('paquete');
             console.log(paquete_val,paquete_val.nombre);
             muestra('contenedor_publicar_anuncio');
            <?php else :?>
                muestra('contenedor_login');
                oculta('contenedor_publicar_anuncio');
            <?php endif;?>
            });*/
        });

         function ajaxValidationCallback(status, form, json, options) {
            if (status === true) {

                 var data = json;
                console.log(data.response);
                if (data.response == true && data.cambioContrasena == false) {
                    
                    if(data.registro == true){
                    $("#confirm").html('<label>Tu usuario ha sido creado exitosamente, por favor activa tu cuenta a traves del e-mail que ha sido enviado a tu cuenta de correo electronico. Para poder anunciarte y publicar anuncios, deberás registrar tu información completa. Esto lo podrás hacer en cualquier momento entrando a tu perfil.</label>');
                    muestra('contenedor_correcto');
                    oculta('contenedor_registro');
                    } else{
                        $("#confirm").html('<label>Inicio de sesion correcto.</label>');
                        muestra('contenedor_correcto');
                        oculta('contenedor_login');
                        window.location.replace(data.url);
                    }

                } else if(data.response == true && data.cambioContrasena == true){
                    muestra('confirmacionCambio');
                    oculta('envio_con');
                } else {
                    muestra('contenedor_error');
                    oculta('contenedor_login');
                }
            }
        }

        jQuery(document).ready(function () {
            // binds form submission and fields to the validation engine
            jQuery("form").validationEngine({
                promptPosition: "topRight",
                scroll: false,
                ajaxFormValidation: true,
                ajaxFormValidationMethod: 'post',
                onAjaxFormComplete: ajaxValidationCallback
            });


        });

        function showMap() {
            var user = $("input:checked").val();
            console.log(user);
            if (user == 1) {
                $('#map-canvas').hide();
            } else {
                $('#map-canvas').show();
            }

        }

        function hideMap() {
            var user = $("input:checked").val();
            console.log(user);
            $('#map-canvas').hide();

        }

        function updateDatabase(newLat, newLng) {
            // make an ajax request to a PHP file
            // on our site that will update the database
            // pass in our lat/lng as parameters
            $("#newLat").val(newLat);
            $("#newLng").val(newLng);
            console.log(newLat, newLng);
        }


    </script>

</head>
<body>

<script type="text/javascript">
    jQuery(document).ready(function ($) {
        <?php if(isset($errorActivo) && isset($mensaje)): ?>
        $('<label>Usuario Activado.</label>').appendTo('#specificError');
        muestra('contenedor_error');
        oculta('contenedor_registro');
        <?php endif; ?>
        <?php if(isset($errorActivo2) && isset($mensaje)): ?>
        $('<label>Lamentablemente, el código de confirmación que intentas activar no existe.</label>').appendTo('#specificError');
        muestra('contenedor_error');
        oculta('contenedor_registro');
        <?php endif; ?>

      
</script>



<!--		CONTENEDOR LOGIN							-->
<!-- ------------------------------------------------------ -->
<form action="<?= base_url() ?>sesion/login/principal/principal" id="login" class="validate" method="post">
    <div class="contenedor_login" id="contenedor_login" style="display:none;">
        <div class="cerrar_registro"><img src="<?php echo base_url() ?>images/cerrar.png"
                                          onclick="oculta('contenedor_login');"/></div>

        <div class="registro_normal">
			
            <div class="titulo_registro"> INGRESAR</div>
			<div id="ingreso_normal">
            <div class="texto_inputs">
                <p> Usuario:</p>

                <p style="margin-top:15px;">Contraseña:</p>

            </div>

            <div class="contendeor_inputs">
                <p><input type="text" name="correo" class="validate[required]"/> *</p>

                <p><input type="password" name="contrasena" class="validate[required]"/> *</p>
            </div>
            </br>
            <div class="subrayado" onclick="muestra('envio_con');oculta('ingreso_normal');">¿Olvidaste contraseña?</div>
            <div class="subrayado" onclick="muestra('contenedor_registro');oculta('contenedor_login');"> Crear cuenta
            </div>
            </br>
            <ul class="morado_reg">
                <li>
                    <input type="submit" class="el_submit"/>
                </li>
            </ul>
			</div>
</form>

            
            <div id="envio_con" class="envio_con">
            <form action="<?= base_url() ?>recuperarcontrasena/sendLink" id="recuperarcontrasena" method="post">
				</br>
                <div class="titulo_registro"></div>
				<div class="texto_inputs">
                <p> Ingresa tu correo:</p>
                </div>

            <div class="contendeor_inputs">
                <p><input type="text" name="correoR" class="validate[required,custom[email]]"/> *</p>
            </div>

                
				<ul class="morado_reg">
                <li>
                   <input type="submit" value="Recuperar" class="el_submit"/>
                </li>
            </ul>
                
            </form>
			</br>
            </div>
			
			<div id="confirmacionCambio" style="display:none; padding:20px;">
			 Se ha enviado contraseña al correo electronico indicado.
			</div>
            

        </div>

    </div>
<!--</form>-->
<!-- ------------------------------------------------------ -->
<!--		FIN    CONTENEDOR LOGIN							-->


<!--		CONTENEDOR REGISTRO							-->
<!-- ------------------------------------------------------ -->
<form action="<?php echo base_url() ?>registro/registrar" id="registerNow" class="validate" method="get" autocomplete="off"
      enctype="multipart/form-data">
<div class="contenedor_registro" id="contenedor_registro" style="display:none;"> <!-- Contenedor negro reistro-->
<div class="cerrar_registro"><img src="<?php echo base_url() ?>images/cerrar.png"
                                  onclick="oculta('contenedor_registro');"/></div>


<div class="registro_normal"> <!-- Contenedor morado registro -->

<div class="titulo_registro"> REGISTRATE</div>

<div class="texto_inputs">
    <p> Nombre:</p>

    <p style="margin-top:15px;">Apellido:</p>

    <p style="margin-top:15px;">Correo:</p>

    <p style="margin-top:15px;">Teléfono:</p>

    <p style="margin-top:15px;">Contrase&ntilde;a:</p>

    <p>Confirmar Contrase&ntilde;a:</p>

</div>
<div class="contendeor_inputs" >
<p><input type="text" name="nombre" id="nombre" class="validate[required],custom[onlyLetterSp]"/> *</p>
<p><input type="text" name="apellido" id="apellido" class="validate[required],custom[onlyLetterSp]"/> *</p>

<p><input type="text" name="correo" class="validate[required,custom[email],ajax[isthereemail]]" /> *</p>

<p><input type="text" name="telefono" class="validate[custom[onlyNumberSp],minSize[10]]"/></p>

<p><input type="password" name="contrasena"  id="contrasena1" class="validate[required],minSize[6],maxSize[12]"/> *</p>
</br>
<p><input type="password" name="confirmar"  id="contrasena2" class="validate[required,equals[contrasena1]]"/> *</p>


</div>


<div class=" informacion_adicional_registro">
    <input type="radio" name="radiog_dark" id="radio1" class="css-checkbox" checked="checked" value="1"/><label
        for="radio1" class="css-label radGroup2"
        onclick="obtener_usuario('datos_faltantes_usuario'); oculta('datos_faltantes_negocio');oculta('datos_faltantes_asociacion');oculta('ocultar_info_adicional');muestra('llenar_info_adicional');">
        Usuario</label>
    &nbsp;&nbsp;
    <input type="radio" name="radiog_dark" id="radio2" class="css-checkbox" value="2"/>
    <label for="radio2" class="css-label radGroup2"
           onclick="obtener_usuario('datos_faltantes_negocio');oculta('datos_faltantes_usuario');oculta('datos_faltantes_asociacion');oculta('ocultar_info_adicional');oculta('ocultar_info_adicional');muestra('llenar_info_adicional');">
        Negocio </label>
    &nbsp;&nbsp;
    <input type="radio" name="radiog_dark" id="radio3" class="css-checkbox" value="3"/><label for="radio3"
                                                                                              class="css-label radGroup2"
                                                                                              onclick="obtener_usuario('datos_faltantes_asociacion'); oculta('datos_faltantes_usuario');oculta('datos_faltantes_negocio');oculta('ocultar_info_adicional');oculta('ocultar_info_adicional');muestra('llenar_info_adicional');">
        Asociación </label>
    </br>
    <p><input name="recibirCorreo" type="checkbox" value="1" checked="checked" /> <label> Quiero recibir información acerca de
            promociones </label></p>


    <p><input name="terminosCondiciones" type="checkbox" value="1" class="validate[required]"/> <label> He leído y acepto los <a href="<?php echo base_url()?>content/terminos_y_condiciones.pdf" target="_blank" class="link_blanco">Términos y Condiciones</a> y <a href="<?php echo base_url()?>content/politica_de_privacidad.pdf" target="_blank" class="link_blanco">la Política de Privacidad</a> *  </label></p>


    <font class="asterisco">Los datos marcados con un astrisco (*) son obligatorios </font>
</div>
</br>
<div class="llenar_info_adicional" id="llenar_info_adicional"
     onclick="mostrar_formulario(); muestra('ocultar_info_adicional'); oculta('llenar_info_adicional');showMap();">
    <input type="hidden" id="elegir_usuario" value="datos_faltantes_usuario"/>
    <img src="<?php echo base_url() ?>images/flecha_blanca.png"/> Llenar información adicional
</div>

<div class="llenar_info_adicional" id="ocultar_info_adicional"
     onclick="oculta('datos_faltantes_usuario');oculta('datos_faltantes_negocio');oculta('datos_faltantes_asociacion');oculta('ocultar_info_adicional'); muestra('llenar_info_adicional');hideMap();"
     style="display:none;">
    <img src="<?php echo base_url() ?>images/flecha_blanca.png"/> Despues llenar información
</div>

<div id="datos_faltantes_usuario" class="datos_faltantes_usuario" style="display:none;">
    </br>
    <div class="datos_fiscales"> Datos fiscales</div>


    <div class="texto_inputs">
        <p> Razón Social:</p>

        <p style="margin-top:15px;">RFC:</p>

        <p style="margin-top:15px;">Calle:</p>

        <p style="margin-top:15px;">No. Exterior:</p>

        <p style="margin-top:15px;">CP:</p>

        <p style="margin-top:15px;">Municipio:</p>

        <p style="margin-top:15px;">Estado:</p>

        <p style="margin-top:15px;">País:</p>


    </div>

    <div class="contendeor_inputs">
        <p><input type="text" name="razon" id="razon" class="custom[onlyLetterSp]"/></p>

        <p><input type="text" name="RFC" id="RFC" class="validate[required]"/></p>

        <p><input type="text" name="calle" id="calle" class="validate[required]"/></p>

        <p><input type="text" name="no_exterior" id="no_exterior" class="custom[onlyNumberSp]"/></p>

        <p><input type="text" name="cp" id="cp" class="custom[onlyNumberSP]"/></p>

        <p><input type="text" name="municipio" id="municipio" class="validate[required],custom[onlyLetterSp]"/></p>

        <p><select name="estado" id="estado" class="validate[required]"/>
                <option> ---</option>
                <?php

                if ($estados != null):
                    foreach ($estados as $edo):
                        ?>
                        <option value="<?php echo $edo->estadoID ?>"><?php echo $edo->nombreEstado ?></option>

                    <?php endforeach;
                endif; ?>
            </select></p>
        <p><select name="pais">
                <option value="147">México</option>
                <?php
                if ($paises != null):
                    foreach ($paises as $pais):
                        ?>
                        <option value="<?php echo $pais->paisID ?>"><?php echo $pais->nombrePais ?></option>

                    <?php endforeach;
                endif; ?>
            </select></p>


    </div>


</div>


<div id="datos_faltantes_negocio" class="datos_faltantes_negocio" style="display:none;"> <!--- Inicio datos negocio -->


    <div class="datos_fiscales"> Datos fiscales</div>

    <div class="texto_inputs">
        <p> Razón Social:</p>

        <p style="margin-top:15px;">RFC:</p>

        <p style="margin-top:15px;">Calle:</p>

        <p style="margin-top:15px;">No. Exterior:</p>

        <p style="margin-top:15px;">CP:</p>

        <p style="margin-top:15px;">Municipio:</p>

        <p style="margin-top:15px;">Estado:</p>

        <p style="margin-top:15px;">País:</p>


    </div>

    <div class="contendeor_inputs">
        <p><input type="text" name="razonN" id="razonN" class="custom[onlyLetterSp]"/></p>

        <p><input type="text" name="RFCN" id="RFCN" class="validate[required]"/></p>

        <p><input type="text" name="calleN" id="calleN"class="validate[required]"/></p>

        <p><input type="text" name="no_exteriorN" id="no_exteriorN" class="custom[onlyNumberSp]"/></p>

        <p><input type="text" name="cpN" id="cpN" class="custom[onlyNumberSP]"/></p>

        <p><input type="text" name="municipioN" id="municipioN" class="validate[required],custom[onlyLetterSp]"/></p>

        <p><select name="estadoN" id="estadoN" class="validate[required]"/>
                <option> ---</option>
                <?php
                if ($estados != null):
                    foreach ($estados as $edo):
                        ?>
                        <option value="<?php echo $edo->estadoID ?>"><?php echo $edo->nombreEstado ?></option>

                    <?php endforeach;
                endif; ?>
            </select></p>
        <p><select name="paisN">
                <option value="147">México</option>
                <?php
                if ($paises != null):
                    foreach ($paises as $pais):
                        ?>
                        <option value="<?php echo $pais->paisID ?>"><?php echo $pais->nombrePais ?></option>

                    <?php endforeach;
                endif; ?>
            </select></p>


    </div>

    <div class="datos_fiscales"> Datos del negocio</div>

    <div class="texto_inputs">
        Nombre:
    </div>

    <div class="contendeor_inputs">
        <p><input type="text" name="nombre_negocio"/></p>
    </div>
    <div class="giro_negocio">

        <div class="contenedor_giros">
            <label>
                <input type="hidden" name="CheckboxGroup1[]" id="CheckboxGroup1[]" value="0"/>
                <input type="checkbox" name="CheckboxGroup1[]" value="1" id="CheckboxGroup1_0"/>
                Accesorios para mascotas</label>
            </br>
            <label>
                <input type="checkbox" name="CheckboxGroup1[]" value="2" id="CheckboxGroup1_1"/>
                Veterinaria</label>
            </br>

            <label>
                <input type="checkbox" name="CheckboxGroup1[]" value="3" id="CheckboxGroup1_2"/>
                Estetica canina</label>
            <label>
                </br>
                <input type="checkbox" name="CheckboxGroup1[]" value="4" id="CheckboxGroup1_3"/>
                Adiestramiento canino</label>


        </div>

        <div class="contenedor_giros">
            <label>
                <input type="checkbox" name="CheckboxGroup1[]" value="5" id="CheckboxGroup1_4"/>
                Centro de sociabilización</label>
            </br>

            <label>
                <input type="checkbox" name="CheckboxGroup1[]" value="6" id="CheckboxGroup1_5"/>
                Criadero de perros</label>
            </br>

            <label>
                <input type="checkbox" name="CheckboxGroup1[]" value="7" id="CheckboxGroup1_6"/>
                Hotel y pensión canina</label>
            <label>
                </br>
                <input type="checkbox" name="CheckboxGroup1[]" value="8" id="CheckboxGroup1_7"/>
                Alimento y medicamento </label>


        </div>
        <div class="contenedor_giros">
            <label>
                <input type="checkbox" name="CheckboxGroup1[]" value="9" id="CheckboxGroup1_8"/>
                Guarderia de perros</label>
            </br>
            <label>
                <input type="checkbox" name="CheckboxGroup1[]" value="10" id="CheckboxGroup1_9"/>
                Tienda de mascotas</label>
            </br>

            <label>
                <input type="checkbox" name="CheckboxGroup1[]" value="11" id="CheckboxGroup1_10"/>
                Servicios funerarios</label>
            <label>
                </br>
                <input type="checkbox" name="CheckboxGroup1[]" value="12" id="CheckboxGroup1_11"/>
                Servico de paseo</label>


        </div>

    </div>


    <div class="texto_inputs">
        <p>Contacto:</p>

        <p style="margin-top:15px;">Teléfono:</p>

        <p style="margin-top:15px;">Calle:</p>

        <p style="margin-top:15px;">Número:</p>

        <p style="margin-top:15px;">Colonia:</p>

        <p style="margin-top:15px;">Municipio:</p>

        <p style="margin-top:15px;">Estado:</p>

        <p style="margin-top:15px;">Código Postal:</p>

        <p style="margin-top:15px;">Correo:</p>

        <p style="margin-top:15px;">Página web:</p>

        <p style="margin-top:15px;">Logo:</p>

        <p style="margin-top:15px;">Descripción:</p>

        <p style="margin-top:35px;">Ubicación:</p>
    </div>

    <div class="contendeor_inputs">
        <p><input type="text" name="nombre_contactoN" id="nombre_contactoN" class="custom[onlyLetterSp]"/></p>

        <p><input style="margin-top:3px;" type="text" name="telefonoN1" id="telefonoN1"class="custom[onlyNumberSp]"/></p>

        <p><input style="margin-top:3px;" type="text" name="calleN1" id="calleN1"class="validate[required]"/></p>

        <p><input style="margin-top:3px;" type="text" name="numN1" id="numN1" class="validate[required]"/></p>

        <p><input style="margin-top:3px;" type="text" name="coloniaN1" id="coloniaN1" class="validate[required]"/></p>

        <p><input style="margin-top:3px;" type="text" name="municipioN1" id="municipioN1"class="validate[required],custom[onlyLetterSp]"/></p>

        <p><select name="estadoN1" id="estadoN1" class="validate[required]"/>
            <option> ---</option>
            <?php
            if ($estados != null):
                foreach ($estados as $edo):
                    ?>
                    <option value="<?php echo $edo->estadoID ?>"><?php echo $edo->nombreEstado ?></option>

                <?php endforeach;
            endif; ?>
            </select> </p>
        <p><input style="margin-top:3px;" type="text" name="cpN1" class="custom[onlyNumberSp]"/></p>

        <p><input style="margin-top:3px;" type="text" name="correoN1"class="validate[required],custom[email]"></p>

        <p><input style="margin-top:3px;" type="text" name="pagina_webN1"/></p>

        <p><input style="margin-top:3px;" type="file" name="logoN1" id="logoN1"/></p>

        <p><textarea rows="3" cols="40" style="margin-top:3px;" name="descripcionN1"> </textarea></p>


    </div>


</div>
<!-- fin datos negocio--->


<div id="datos_faltantes_asociacion" class="datos_faltantes_asociacion" style="display:none;">
    <!--- Inicio datos Asociación -->


    <div class="datos_fiscales"> Datos fiscales</div>

    <div class="texto_inputs">
        <p> Razón Social:</p>

        <p style="margin-top:15px;">RFC:</p>

        <p style="margin-top:15px;">Calle:</p>

        <p style="margin-top:15px;">No. Exterior:</p>

        <p style="margin-top:15px;">CP:</p>

        <p style="margin-top:15px;">Municipio:</p>

        <p style="margin-top:15px;">Estado:</p>

        <p style="margin-top:15px;">País:</p>


    </div>

    <div class="contendeor_inputs">
        <p><input type="text" name="razonAC" id="razonAC" class="validate[required],custom[onlyLetterSp]"/></p>

        <p><input type="text" name="RFCAC" id="RFCAC"></p>

        <p><input type="text" name="calleAC" id="calleAC"></p>

        <p><input type="text" name="no_exterioACr" id="no_exterioACr"class="custom[onlyNumberSp]"></p>

        <p><input type="text" name="cpAC" id="cpAC" class="custom[onlyNumberSp]"></p>

        <p><input type="text" name="municipioAC" id="municipioAC" class="validate[required],custom[onlyLetterSp]"/></p>

        <p><select name="estadoAC" id="estadoAC" class="validate[required]"/>
            <option> ---</option>
            <?php
            if ($estados != null):
                foreach ($estados as $edo):
                    ?>
                    <option value="<?php echo $edo->estadoID ?>"><?php echo $edo->nombreEstado ?></option>

                <?php endforeach;
            endif; ?>
            </select></p>
        <p><select name="paisAC"/>
            <option value="147">México</option>
            <?php
            if ($paises != null):
                foreach ($paises as $pais):
                    ?>
                    <option value="<?php echo $pais->paisID ?>"><?php echo $pais->nombrePais ?></option>

                <?php endforeach;
            endif; ?>
            </select> </p>


    </div>

    <div class="datos_fiscales"> Datos de la Asociación</div>


    <div class="texto_inputs">
        <p> Nombre: </p>

        <p style="margin-top:15px;">Contacto:</p>

        <p style="margin-top:15px;">Teléfono:</p>

        <p style="margin-top:15px;">Calle:</p>

        <p style="margin-top:15px;">Número:</p>

        <p style="margin-top:15px;">Colonia:</p>

        <p style="margin-top:15px;">Municipio:</p>

        <p style="margin-top:15px;">Estado:</p>

        <p style="margin-top:15px;">Código Postal:</p>

        <p style="margin-top:15px;">Correo:</p>

        <p style="margin-top:15px;">Página web:</p>

        <p style="margin-top:15px;">Logo:</p>

        <p style="margin-top:15px;">Descripción:</p>

        <p style="margin-top:35px;">Ubicación:</p>
    </div>

    <div class="contendeor_inputs">
        <p><input type="text" name="nombre_ac" class="validate[required],custom[onlyLetterSp]"/></p>

        <p><input type="text" name="nombre_contactoAC1" class="validate[required]"/></p>

        <p><input style="margin-top:3px;" type="text" name="telefonoAC1" id="telefonoAC1" class="custom[onlyNumberSp]"/></p>

        <p><input style="margin-top:3px;" type="text" name="calleAC1" id="calleAC1" /></p>

        <p><input style="margin-top:3px;" type="text" name="numAC1" id="numAC1" class="custom[onlyNumberSp]"/></p>

        <p><input style="margin-top:3px;" type="text" name="coloniaAC1" id="coloniaAC1"/></p>

        <p><input style="margin-top:3px;" type="text" name="municipioAC1" id="municipioAC1" class="validate[required],custom[onlyLetterSp]"/></p>

        <p><select name="estadoAC1" class="validate[required]"/>
            <option> ---</option>
            <?php
            if ($estados != null):
                foreach ($estados as $edo):
                    ?>
                    <option value="<?php echo $edo->estadoID ?>"><?php echo $edo->nombreEstado ?></option>

                <?php endforeach;
            endif; ?>
            </select> </p>
        <p><input style="margin-top:3px;" type="text" name="cpAC1" class="custom[onlyNumberSp]" /></p>

        <p><input style="margin-top:3px;" type="text" name="correoA1C" class="validate[required],custom[email]"/></p>

        <p><input style="margin-top:3px;" type="text" name="pagina_webAC1"/></p>

        <p><input style="margin-top:3px;" type="file" name="logoAC1" id="logoAC1"/></p>

        <p><textarea rows="3" cols="40" style="margin-top:3px;" name="descripcionAC1"> </textarea></p>


    </div>


</div>
<!-- fin datos Asociacion -->

<div id="map-canvas" style="display:none;">
    <?php $this->load->view($mapaSegundo); ?>

</div>

<input type="hidden" name="newLat" id="newLat" value=""/>
<input type="hidden" name="newLng" id="newLng" value=""/>

</br>
<ul class="morado_reg">
    <li><!--<a href="#" id="suscribir" style="text-decoration:none; color:#FFF;">Suscribirse</a>-->
        <input type="submit" value="Suscribir" class="el_submit"/>
         
    </li>
</ul>


</div>
<!-- fin contenedor morado registro -->

</div>
<!-- Fin contenedor negro registro -->

</form>
<!--		FIN CONTENEDOR REGISTRO							-->
<!-- ------------------------------------------------------ -->


<!--		EXITO REGISTRO							-->
<!-- ------------------------------------------------------ -->
<div class="contenedor_registro" id="contenedor_correcto" style="display:none;"> <!-- Contenedor negro reistro-->
    <div class="cerrar_registro"><img src="<?php echo base_url() ?>images/cerrar.png"
                                      onclick="oculta('contenedor_correcto');$('#registerNow')[0].reset();"/></div>

    <div class="registro_normal"> <!-- Contenedor morado registro -->

        <div class="titulo_registro"> REGISTRATE</div>
        </br>
        <div class="imagen_confirmacion">
            <img src="<?php echo base_url() ?>images/palomita.png"/>
        </div>
        <div class="contenido_confirmacion">
            <strong> Correcto </strong>
            </br></br>
            <div> Bienvenido</div>
            <div id="confirm">
            </div>

        </div>
    </div>
    </br>


</div>

<!--		FIN EXITO REGISTRO						-->
<!-- ------------------------------------------------------ -->


<!--		ERROR REGISTRO							-->
<!-- ------------------------------------------------------ -->

<div class="contenedor_registro" id="contenedor_error" style="display:none;"> <!-- Contenedor negro reistro-->
    <div class="cerrar_registro"><img src="<?php echo base_url() ?>images/cerrar.png"
                                      onclick="oculta('contenedor_error');"/></div>

    <div class="registro_normal"> <!-- Contenedor morado registro -->

        <div class="titulo_registro"> REGISTRATE</div>
        </br>
        <div class="imagen_confirmacion">
            <img src="<?php echo base_url() ?>images/tache.png"/>
        </div>
        <div class="contenido_confirmacion">
            <strong> Ha ocurrido un error </strong>
            </br>
            <div id="specificError">

            </div>
        </div>
    </div>
    </br>

</div>



<!--		FIN ERROR REGISTRO							-->
<!-- ------------------------------------------------------ -->


<div id="contenedor_publicar_anuncio" class="contenedor_publicar" style=" display:none">

    <!-- Inicio contenedor pap publicar anuncio aunucio !-->
    <div id="publicar_anuncio" class="pubicar_anuncio_mini">
        <?php $this->load->view('partial/_pasos_anuncio', array('paquetes' => $paquetes, 'estados' => $estados, 'razas' => $razas,'cupones' => $cupones)); ?>

    </div>
</div>

<div id="iconos_ocultos" class="iconos_ocultos">


    <ul class="iconos_estatus">
        <li   <?php if ($this->session->userdata('idUsuario') !== FALSE): ?>  onclick="window.location='<?= base_url() ?>carrito';" <?php else: ?>  <?php endif; ?>>

            <img id="horizontal_compras_mini"
                 onmouseover="mostrar_icono('horizontal_compras'); ocultar_icono('horizontal_compras_mini');"
                 class="iconos_flotantes" src="<?php echo base_url() ?>images/compras_horizontal_mini.png"/>

            <img class="iconos_flotantes2"
                 onmouseout="mostrar_icono('horizontal_compras_mini'); ocultar_icono('horizontal_compras');"
                 id="horizontal_compras" src="<?php echo base_url() ?>images/compras_horizontal.png"
               />

        </li>
        <li <?php if ($this->session->userdata('idUsuario') !== FALSE): ?>
       <?php else: ?> onclick="muestra('contenedor_login');oculta('envio_con');muestra('ingreso_normal');" <?php endif; ?>>
            <img id="horizontal_ingresar_mini"
                 onmouseover="mostrar_icono('horizontal_ingresar'); ocultar_icono('horizontal_ingresar_mini');"
                 class="iconos_flotantes" src="<?php echo base_url() ?>images/ingresar_horizontal_mini.png"/>

            <img class="iconos_flotantes2"
                 onmouseout="mostrar_icono('horizontal_ingresar_mini'); ocultar_icono('horizontal_ingresar');"
                id="horizontal_ingresar"
                 src="<?php echo base_url() ?>images/ingresar_horizontal.png"/>
        </li>

        <li  <?php if ($this->session->userdata('idUsuario') !== FALSE): ?>  <?php else: ?>onclick="muestra('contenedor_registro');" <?php endif; ?>>
            <img id="horizontal_registrate_mini"
                 onmouseover="mostrar_icono('horizontal_registrate'); ocultar_icono('horizontal_registrate_mini');"
                 class="iconos_flotantes" src="<?php echo base_url() ?>images/registrate_horizontal_mini.png"/>

            <img class="iconos_flotantes2"
                 onmouseout="mostrar_icono('horizontal_registrate_mini'); ocultar_icono('horizontal_registrate');"
                 id="horizontal_registrate" src="<?php echo base_url() ?>images/registrate_horizontal.png"/>
        </li>
    </ul>
</div>
<?php $this->load->view('general/menu_view'); ?>

<center>
</br>
<div id="contenedor_central">

<div id="espacio_izquierda" class="seccion_izquierda">
    <ul class="iconos" id="iconos_grandes">
        <li <?php if ($this->session->userdata('idUsuario') !== FALSE): ?>  onclick="window.location='<?= base_url() ?>carrito';" <?php else: ?>  <?php endif; ?>>
            <div class="indicadores"> 
                <?php echo $carritoT ?>
                
            </div> 

            <img src="<?php echo base_url() ?>images/compras.png"/></li>
        <li 
        <?php if ($this->session->userdata('idUsuario') !== FALSE): ?>
       <?php else: ?> onclick="muestra('contenedor_login');oculta('envio_con');muestra('ingreso_normal');" <?php endif; ?>>
        
        
        
            <div class="indicador">
             <?php if ($this->session->userdata('idUsuario') !== FALSE): ?>
             <img src="images/indicador_si.png" title="Ya estas logueado">
             <?php else: ?>
             <img src="images/indicador_no.png">
             <?php endif; ?>
              </div>
            <img src="<?php echo base_url() ?>images/sesion.png"/></li> 
            
        <li <?php if ($this->session->userdata('idUsuario') !== FALSE): ?>  <?php else: ?>onclick="muestra('contenedor_registro');" <?php endif; ?>>
            <div class="indicador"> 
            <?php if ($this->session->userdata('idUsuario') !== FALSE): ?>
             <img src="images/indicador_si.png" title="Ya estas registrado">
             <?php else: ?>
             <img src="images/indicador_no.png">
             <?php endif; ?>
             </div>
            <img src="<?php echo base_url() ?>images/registrate.png"/>
        </li>
    </ul>
</div>
<div id="banner_central">
    <div class="container" id="carousel_container">
        <div class="row">
            <div class="span12">
                <div id="artCarousel" class="carousel slide">
                    <ol class="carousel-indicators">
                        <li data-target="#artCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#artCarousel" data-slide-to="1"></li>
                        <li data-target="#artCarousel" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">

                        <?php $banner = $this->session->userdata('banner'); ?>
            <?php if (is_logged() && ($this->session->userdata('tipoUsuario') == 2 || $this->session->userdata('tipoUsuario') == 3)) {
                if ($banner != null) {

                    foreach ($banner as $contenido) {
                        if ($this->session->userdata('zonaID') == $contenido->zonaID && $contenido->posicion == 2 && $contenido->seccionID == $seccion) {
                            ?>
                            <div class="item"><a href="<?php echo base_url() ?>#" target="_blank"><img
                                    src="<?php echo base_url() ?>images/<?php echo $contenido->imgbaner; ?>" alt="Model 2"></a>

                            <div class="carousel-caption">
                                <?php echo $contenido->texto; ?>
                            </div>

                        </div>

                            <?php
                        }
                    }
                }
            } else {
                if ($banner !== null && !empty($banner)) {
                    foreach ($banner as $contenido) {
                        if ($contenido->zonaID == 9 && $contenido->posicion == 2 && $contenido->seccionID == $seccion) {
                            ?>    <div class="item"><a href="<?php echo base_url() ?>#" target="_blank"><img
                                    src="<?php echo base_url() ?>images/<?php echo $contenido->imgbaner; ?>" alt="Model 2"></a>

                            <div class="carousel-caption">
                                <?php echo $contenido->texto; ?>
                            </div>

                        </div>
                            <?php }
                        }
                    }
                } ?>

                    </div>
                    <a class="left carousel-control" href="<?php echo base_url() ?>#artCarousel"
                       data-slide="prev">&lsaquo;</a> <a class="right carousel-control"
                                                         href="<?php echo base_url() ?>#artCarousel"
                                                         data-slide="next">&rsaquo;</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="seccion_derecha" id="seccion_derecha">
    <div id="contenido_fb" style="height:192px; margin-bottom:15px; ">
        <!-- MyFavoritePetShop -->
        <div id="fb-root"></div>
        <div id="fb-root"></div>
        <script>
		   window.fbAsyncInit = function() {
        FB.init({
          appId      : '343695012453981',
          xfbml      : true,
          version    : 'v2.0'
        });
      };
		
		
		 (function(d, s, id){
         var js, fjs = d.getElementsByTagName(s)[0];
         if (d.getElementById(id)) {return;}
         js = d.createElement(s); js.id = id;
         js.src = "//connect.facebook.net/en_US/sdk.js";
         fjs.parentNode.insertBefore(js, fjs);
       }(document, 'script', 'facebook-jssdk'));
       </script>
        <div class="fb-like-box" data-href="https://www.facebook.com/quierounperro.com.mx"
             data-height="192" data-width="215" data-colorscheme="light" data-show-faces="false" data-header="false"
             data-stream="true" data-show-border="false"></div>
    </div>

    <div id="banner_publicidad_derecha" class="slideshow_dos" style="height:200px; margin-top:10px;">
         <?php $banner = $this->session->userdata('banner'); ?>
            <?php if (is_logged() && ($this->session->userdata('tipoUsuario') == 2 || $this->session->userdata('tipoUsuario') == 3)) {
                if ($banner != null) {

                    foreach ($banner as $contenido) {
                        if ($this->session->userdata('zonaID') == $contenido->zonaID && $contenido->posicion == 4 && $contenido->seccionID == $seccion) {
                            ?>
                            <img src="<?php echo base_url() ?>images/<?php echo $contenido->imgbaner; ?>" width="638"
                            height="93"/>

                            <?php
                        }
                    }
                }
            } else {
                if ($banner !== null && !empty($banner)) {
                    foreach ($banner as $contenido) {
                        if ($contenido->zonaID == 9 && $contenido->posicion == 4 && $contenido->seccionID == 17) {
                            ?>    <img src="<?php echo base_url() ?>images/<?php echo $contenido->imgbaner; ?>" width="215"
                            height="190"/>
                            <?php }
                        }
                    }
                } ?>

    </div>

</div>
<div id="contenedor_paquetes" class="contenedor_paquetes">

<a href="#"  class="paquete_comprar reset"
   data-paquete='{"id":"<?php echo $paquetes[0]->paqueteID ?>","nombre":"<?php echo $paquetes[0]->nombrePaquete ?>","vigencia":"<?php echo $paquetes[0]->vigencia ?>","precio":"<?php echo $paquetes[0]->precio ?>","caracteres":"<?php echo $paquetes[0]->caracteres ?>","cantFotos":"<?php echo $paquetes[0]->cantFotos ?>","videos":"<?php echo $paquetes[0]->videos ?>","cupones":"<?php echo $paquetes[0]->cupones ?>"}'>
    <div class="paquetes_izquierda">
        <div class="title_paquetes">
            <div class="lateral_lite"></div>
            <img src="<?php echo base_url() ?>images/perrito_lite.png" class="margen"/> <font
                class="title_paquetes_titilos"> PAQUETE <?php echo strtoupper($paquetes[0]->nombrePaquete) ?> </font>
        </div>
        <div class="precio_paquete_lite">
            <?php if ($paquetes[0]->precio == 0): ?>
                <div class="el_titulo_paquete_lite"> Gratis</div>
                <div class="descripcion_precio_paquete_lite">al crear tu usuario</div>
            <?php else: ?>
                <div class="precio_paquete_regular"> $<?php echo $paquetes[0]->precio ?></div>
            <?php endif; ?>
        </div>
        <br/>

        <div class="descripcion_paquetes">
            <strong>Incluye:</strong>
            <ul class="contenido_paquetes">
                <li>
                    * <?php echo $paquetes[0]->cantFotos ?> fotos
                </li>

                <li>
                    * Texto de <?php echo $paquetes[0]->caracteres ?> caracteres
                </li>
                <li>
                    * Vigencia de <?php echo $paquetes[0]->vigencia ?> días.
                </li>
            </ul>
        </div>
        <div class="iconos_paquetes">
            <ul>
                <li>
                    <?php if ($paquetes[0]->cantFotos > 0): ?>
                        <div class="cantidades_detalle_paquete_lite"> <?php echo $paquetes[0]->cantFotos ?></div>
                        <img src="<?php echo base_url() ?>images/icono_camara.png"/>
                    <?php else: ?>
                        <div class="cantidades_detalle_paquete_of"> <?php echo $paquetes[0]->cantFotos ?></div>
                        <img src="<?php echo base_url() ?>images/icono_camara_of.png"/>
                    <?php endif; ?>
                </li>
                <li>
                    <div class="cantidades_detalle_paquete_lite"> <?php echo $paquetes[0]->caracteres ?></div>
                    <img src="<?php echo base_url() ?>images/icono_texto.png">
                </li>
                <li>
                    <div class="cantidades_detalle_paquete_lite"> <?php echo $paquetes[0]->vigencia ?></div>
                    <img src="<?php echo base_url() ?>images/icono_calendario.png"/>
                </li>
                <li>
                    <?php if ($paquetes[0]->cupones > 0): ?>
                        <div class="cantidades_detalle_paquete_lite"> <?php echo $paquetes[0]->cupones ?></div>
                        <img src="<?php echo base_url() ?>images/icono_ticket.png"/>
                    <?php else: ?>
                        <div class="cantidades_detalle_paquete_of"> <?php echo $paquetes[0]->cupones ?></div>
                        <img src="<?php echo base_url() ?>images/icono_ticket_of.png"/>
                    <?php endif; ?>
                </li>
                <li>
                    <?php if ($paquetes[0]->videos > 0): ?>
                        <div class="cantidades_detalle_paquete_lite"> <?php echo $paquetes[0]->videos ?></div>
                        <img src="<?php echo base_url() ?>images/icono_video_lite.png"/>
                    <?php else: ?>
                        <div class="cantidades_detalle_paquete_of"> <?php echo $paquetes[0]->videos ?></div>
                        <img src="<?php echo base_url() ?>images/icono_video_of.png"/>
                    <?php endif; ?>
                </li>
            </ul>
        </div>
    </div>
</a>
<a href="<?php echo base_url() ?>#" class="paquete_comprar reset"
   data-paquete='{"id":"<?php echo $paquetes[1]->paqueteID ?>","nombre":"<?php echo $paquetes[1]->nombrePaquete ?>","vigencia":"<?php echo $paquetes[1]->vigencia ?>","precio":"<?php echo $paquetes[1]->precio ?>","caracteres":"<?php echo $paquetes[1]->caracteres ?>","cantFotos":"<?php echo $paquetes[1]->cantFotos ?>","videos":"<?php echo $paquetes[1]->videos ?>","cupones":"<?php echo $paquetes[1]->cupones ?>"}'>
    <div class="paquetes">
        <div class="title_paquetes">
            <div class="lateral_regular"></div>
            <img src="<?php echo base_url() ?>images/perrito_regular.png" class="margen"/>
            <font
                class="title_paquetes_titilos"> PAQUETE <?php echo strtoupper($paquetes[1]->nombrePaquete) ?> </font>

        </div>
        <div class="precio_paquete_regular"> $<?php echo $paquetes[1]->precio ?></div>
        <br/>

        <div class="descripcion_paquetes">
            <strong>Incluye:</strong>
            <ul class="contenido_paquetes">
                <li>
                    * <?php echo $paquetes[1]->cantFotos ?> fotos
                </li>
                <li>
                    * Texto de <?php echo $paquetes[1]->caracteres ?> caracteres
                </li>
                <li>
                    * <?php echo $paquetes[1]->videos ?> video
                </li>
                <li>
                    * <?php echo $paquetes[1]->cupones ?> cupones
                </li>
                <li>
                    * Vigencia de <?php echo $paquetes[1]->vigencia ?> días.
                </li>
            </ul>
        </div>
        <div class="iconos_paquetes">
            <ul>
                <li>
                    <?php if ($paquetes[1]->cantFotos > 0): ?>
                        <div class="cantidades_detalle_paquete_regular"><?php echo $paquetes[1]->cantFotos ?></div>
                        <img src="<?php echo base_url() ?>images/icono_camara_regular.png"/>
                    <?php else: ?>
                        <div class="cantidades_detalle_paquete_of"><?php echo $paquetes[1]->cantFotos ?></div>
                        <img src="<?php echo base_url() ?>images/icono_camara_of.png"/>
                    <?php endif; ?>
                </li>
                <li>
                    <div class="cantidades_detalle_paquete_regular"> <?php echo $paquetes[1]->caracteres ?></div>
                    <img src="<?php echo base_url() ?>images/icono_texto_regular.png">
                </li>
                <li>
                    <div class="cantidades_detalle_paquete_regular"><?php echo $paquetes[1]->vigencia; ?></div>
                    <img src="<?php echo base_url() ?>images/icono_calendario_regular.png"/>
                </li>
                <li>
                    <?php if ($paquetes[1]->cupones > 0): ?>
                        <div class="cantidades_detalle_paquete_regular"><?php echo $paquetes[1]->cupones ?></div>
                        <img src="<?php echo base_url() ?>images/icono_ticket_regular.png"/>
                    <?php else: ?>
                        <div class="cantidades_detalle_paquete_of"><?php echo $paquetes[1]->cupones ?></div>
                        <img src="<?php echo base_url() ?>images/icono_ticket_of.png"/>
                    <?php endif; ?>
                </li>

                <li>
                    <?php if ($paquetes[1]->videos > 0): ?>
                        <div class="cantidades_detalle_paquete_regular"><?php echo $paquetes[1]->videos ?></div>
                        <img src="<?php echo base_url() ?>images/icono_video_regular.png"/>
                    <?php else: ?>
                        <div class="cantidades_detalle_paquete_of"><?php echo $paquetes[1]->videos ?></div>
                        <img src="<?php echo base_url() ?>images/icono_video_of.png"/>
                    <?php endif; ?>
                </li>

            </ul>
        </div>

    </div>

</a>
<a href="<?php echo base_url() ?>#" class="paquete_comprar reset"
   data-paquete='{"id":"<?php echo $paquetes[2]->paqueteID ?>","nombre":"<?php echo $paquetes[2]->nombrePaquete ?>","vigencia":"<?php echo $paquetes[2]->vigencia ?>","precio":"<?php echo $paquetes[2]->precio ?>","caracteres":"<?php echo $paquetes[2]->caracteres ?>","cantFotos":"<?php echo $paquetes[2]->cantFotos ?>","videos":"<?php echo $paquetes[2]->videos ?>","cupones":"<?php echo $paquetes[2]->cupones ?>"}'>
    <div class="paquetes_derecha">
        <div class="title_paquetes">
            <div class="lateral_premium"></div>
            <img src="<?php echo base_url() ?>images/perrito_premium.png" class="margen"/> <font
                class="title_paquetes_titilos"> PAQUETE <?php echo strtoupper($paquetes[2]->nombrePaquete) ?> </font>

        </div>
        <div class="precio_paquete_premium"> $<?php echo $paquetes[2]->precio ?></div>
        <br/>

        <div class="descripcion_paquetes">
            <strong>Incluye:</strong>
            <ul class="contenido_paquetes">
                <li>
                    * <?php echo $paquetes[2]->cantFotos ?> fotos
                </li>
                <li>
                    * Texto de <?php echo $paquetes[2]->caracteres ?> caracteres
                </li>
                <li>
                    * <?php echo $paquetes[2]->videos ?> video
                </li>
                <li>
                    * <?php echo $paquetes[2]->cupones ?> cupones
                </li>
                <li>
                    * Vigencia de <?php echo $paquetes[2]->vigencia ?> días
                </li>
            </ul>
        </div>
        <div class="iconos_paquetes">
            <ul>
                <li>
                    <div class="cantidades_detalle_paquete_premium"><?php echo $paquetes[2]->cantFotos ?></div>
                    <img src="<?php echo base_url() ?>images/icono_camara_premium.png"/>
                </li>
                <li>
                    <div class="cantidades_detalle_paquete_premium"> <?php echo $paquetes[2]->caracteres ?></div>
                    <img src="<?php echo base_url() ?>images/icono_texto_premium.png">
                </li>
                <li>
                    <div class="cantidades_detalle_paquete_premium"><?php echo $paquetes[2]->vigencia ?></div>
                    <img src="<?php echo base_url() ?>images/icono_calendario_premium.png"/>
                </li>
                <li>
                    <?php if ($paquetes[2]->cupones > 0): ?>
                        <div class="cantidades_detalle_paquete_premium"><?php echo $paquetes[2]->cupones ?></div>
                        <img src="<?php echo base_url() ?>images/icono_ticket_premium.png"/>

                    <?php else: ?>
                        <div class="cantidades_detalle_paquete_of"><?php echo $paquetes[2]->cupones ?></div>
                        <img src="<?php echo base_url() ?>images/icono_ticket_of.png"/>
                    <?php endif; ?>
                </li>
                <li>
                    <?php if ($paquetes[2]->videos > 0): ?>
                        <div class="cantidades_detalle_paquete_premium"><?php echo $paquetes[2]->videos ?></div>
                        <img src="<?php echo base_url() ?>images/icono_video_premium.png"/>
                    <?php else: ?>
                        <div class="cantidades_detalle_paquete_of"><?php echo $paquetes[2]->videos ?></div>
                        <img src="<?php echo base_url() ?>images/icono_video_of.png"/>
                    <?php endif; ?>
                </li>
            </ul>
        </div>
    </div>
</a>
</div>
<!-- Contenedor de paquetes  -->


<!-- Inician secciones de contenido -->
<!-- perros perdidos -->
<a href="<?php echo base_url() ?>perdidos" style="text-decoration:none; color:#000;"
   onmouseover="Mostrar('ver_perdidos');Ocultar('ver_raza');Ocultar('ver_mes');Ocultar('ver_curiosos');">
    <div id="perros_perdidos" class="seccion_inferior_izquierda">

        <div class="contenido_secciones">
            <p class="titulo_segunda_seccion"> PERROS PERDIDOS </p>

            <p><strong> Nombre:</strong> <?=$contenidosP->titulo?>
                <strong>Raza:</strong> <?=$contenidosP->raza?>
                <strong>Caracteristicas:</strong> <?=substr($contenidosP->descripcion,0,20)?>...</p>

        </div>
        <div class="sub_imagenes_dos">

            <img align="center" style="width:50%; max-width:150px;" class="imagen_relleno" src="<?php echo base_url() ?><?=$contenidosP->foto?>"/>

          

        </div> 
         <div id="ver_perdidos" class="ver_mas" style=" display:none;"> Ver más...</div>
    </div>
</div>
</a>
<!-- End perros perdidos -->
<!-- Raza del mes -->
<a href="<?php echo base_url() ?>raza" style="text-decoration:none; color:#000;"
   onmouseover="Mostrar('ver_raza'); Ocultar('ver_perdidos');Ocultar('ver_mes'); Ocultar('ver_curiosos')">
    <div id="la_raza_mes" class="seccion_inferior_izquierda">
        <div class="contenido_secciones">
            <p class="titulo_segunda_seccion"> LA RAZA DEL MES </p>

            <p>
                <?=substr($contenidos[0]->origenes,0,40)?>
            </p>

        </div>
        <div class="sub_imagenes_dos">
			<?php 
if($fotocontenido != null){
foreach($fotocontenido as $foto){
	if($foto->contenidoID == $contenidos[0]->contenidoID){?>
 <img align="center" class="imagen_relleno" src="<?php echo base_url() ?>images/raza_mes/<?=$foto->foto;?>"
                 width="87" height="103"/>
<?php }
}
}?>
            
        </div>
        <div id="ver_raza" class="ver_mas" style=" display:none;"> Ver más...</div>

    </div>
</a>
<!-- End raza del mes -->

<!-- Eventos del mes -->
<a href="<?php echo base_url() ?>evento" style="text-decoration:none; color:#000;"
   onmouseover="Mostrar('ver_mes');Ocultar('ver_raza'); Ocultar('ver_perdidos');Ocultar('ver_curiosos');">
    <div id="eventos_mes" class="seccion_inferior">
        <div class="contenido_secciones">
            <p class="titulo_segunda_seccion"> EVENTOS DEL MES </p>

            <p> <strong>Título:</strong> <?=$contenidosE[0]->nombre?><br />
                <strong>Fecha del evento:</strong> <?=$contenidosE[0]->fecha?>
            </p>

        </div>
        <div class="sub_imagenes_dos">
         <?php if($fotocontenido != null){
	 	foreach($fotocontenido as $p){
			if($p->contenidoID == $contenidosE[0]->contenidoID){?>
            <img class="imagen_relleno" src="<?php echo base_url() ?>images/eventos/<?=$p->foto?>" width="144"
                 height="110"/>
 <?php }
	}
}?>
            
            
        </div>
        <div id="ver_mes" class="ver_mas" style=" display:none;"> Ver más...</div>

    </div>
</a>
<!-- End eventos del mes -->
<!-- Datos curiosos -->
<a href="<?php echo base_url() ?>curiosos" style="text-decoration:none; color:#000;"
   onmouseover="Mostrar('ver_curiosos');Ocultar('ver_raza'); Ocultar('ver_perdidos');Ocultar('ver_mes');">
    <div id="datos_curiosos" class="seccion_inferior_derecha">
        <div class="contenido_secciones">
            <p class="titulo_segunda_seccion"> DATOS CURIOSOS </p>

            <p>
                <?=substr($contenidosD[0]->texto,0,60)?>...
            </p>

        </div>
        <div class="sub_imagenes_dos">
        	<?php if($fotocontenido != null){
	 	foreach($fotocontenido as $p){
			if($p->contenidoID == $contenidosD[0]->contenidoID){?>
            <img class="imagen_relleno" src="<?php echo base_url() ?>images/datos_curiosos/<?=$p->foto?>" width="63"
                 height="119"/>
 <?php }
	}
}?>

           
    </div>
    
     <div id="ver_curiosos" class="ver_mas" style=" display:none;"> Ver más...</div>

        </div>

</a>
<!-- End datos curioso -->

</div><!-- Contenedor central -->


<div class="separacion_final">

</div>



<?php $this->load->view('general/footer_view'); ?>

</center>
<script src="<?php echo base_url() ?>js/bootstrap.min.js"></script>
<script>
    $('#artCarousel').carousel({
        interval: 4000,
        effect: 'random',
        cycle: true
    });
</script>


</body>
</html>
