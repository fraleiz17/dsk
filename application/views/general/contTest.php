
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


        $('#recuperarcontrasena').submit(function() {
        $(".recuperar").fadeOut(350, function(){
            $(".enviando").show();
        });
    });

});

      
</script>



<!--		CONTENEDOR LOGIN							-->
<!-- ------------------------------------------------------ -->
<form action="<?= base_url() ?>sesion/login/principal/principal" id="login" class="validate" method="post">
    <div class="contenedor_login" id="contenedor_login" style="display:none;text-align:left;">
        <div class="cerrar_registro"><img src="<?php echo base_url() ?>images/cerrar.png"
                                          onclick="oculta('contenedor_login');"/></div>

        <div class="registro_normal">
			
            <div class="titulo_registro"> INGRESAR</div>
			<div id="ingreso_normal">
            <div class="texto_inputs" style="margin-top:10px;">
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
            
            <ul class="enviando" style="display:none;">
                <li>
                   Enviando informacion
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
<div class="contenedor_registro" id="contenedor_registro" style="display:none;text-align:left;"> <!-- Contenedor negro reistro-->
<div class="cerrar_registro"><img src="<?php echo base_url() ?>images/cerrar.png"
                                  onclick="oculta('contenedor_registro');"/></div>


<div class="registro_normal"> <!-- Contenedor morado registro -->

<div class="titulo_registro"> REGISTRATE</div>

<div class="texto_inputs" style="margin-top:9px;" >
    <p> Nombre:</p>

    <p style="margin-top:12px;">Apellido:</p>

    <p style="margin-top:-1px;">Correo:</p>

    <p style="margin-top:3px;">Teléfono:</p>

    <p style="margin-top:5px;">Contrase&ntilde;a:</p>

    <p style="margin-top:-3px;">Confirmar Contrase&ntilde;a:</p>

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


    <div class="texto_inputs" style="margin-top:12px;">
        <p> Razón Social:</p>

        <p style="margin-top:0px;">RFC:</p>

        <p style="margin-top:5px;">Calle:</p>

        <p style="margin-top:8px;">No. Exterior:</p>

        <p style="margin-top:-2px;">CP:</p>

        <p style="margin-top:-1px;">Municipio:</p>

        <p style="margin-top:-1px;">Estado:</p>

        <p style="margin-top:-2px;">País:</p>


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
                
            </select></p>


    </div>


</div>


<div id="datos_faltantes_negocio" class="datos_faltantes_negocio" style="display:none;"> <!--- Inicio datos negocio -->


    <div class="datos_fiscales"> Datos fiscales</div>

    

    <div class="texto_inputs" style="margin-top:12px;">
        <p> Razón Social:</p>

        <p style="margin-top:0px;">RFC:</p>

        <p style="margin-top:5px;">Calle:</p>

        <p style="margin-top:8px;">No. Exterior:</p>

        <p style="margin-top:-2px;">CP:</p>

        <p style="margin-top:-1px;">Municipio:</p>

        <p style="margin-top:-1px;">Estado:</p>

        <p style="margin-top:-2px;">País:</p>


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


    <div class="texto_inputs" style="margin-top:8px;">
        <p>Contacto:</p>

        <p style="margin-top:11px;">Teléfono:</p>

        <p style="margin-top:15px;">Calle:</p>

        <p style="margin-top:11px;">Número:</p>

        <p style="margin-top:12px;">Colonia:</p>

        <p style="margin-top:13px;">Municipio:</p>

        <p style="margin-top:-1px;">Estado:</p>

        <p style="margin-top:3px;">Código Postal:</p>

        <p style="margin-top:10px;">Correo:</p>

        <p style="margin-top:14px;">Página web:</p>

        <p style="margin-top:12px;">Logo:</p>

        <p style="margin-top:15px;">Descripción:</p>

        <p style="margin-top:45px;">Ubicación:</p>
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

    <div class="texto_inputs" style="margin-top:12px;">
        <p> Razón Social:</p>

        <p style="margin-top:0px;">RFC:</p>

        <p style="margin-top:5px;">Calle:</p>

        <p style="margin-top:8px;">No. Exterior:</p>

        <p style="margin-top:-2px;">CP:</p>

        <p style="margin-top:-1px;">Municipio:</p>

        <p style="margin-top:-1px;">Estado:</p>

        <p style="margin-top:-2px;">País:</p>


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
            
            </select> </p>


    </div>

    <div class="datos_fiscales"> Datos de la Asociación</div>


    <div class="texto_inputs" style="margin-top:8px;">

        <p style="margin-top:5px;"> Nombre: </p>

        <p>Contacto:</p>

        <p style="margin-top:11px;">Teléfono:</p>

        <p style="margin-top:15px;">Calle:</p>

        <p style="margin-top:11px;">Número:</p>

        <p style="margin-top:12px;">Colonia:</p>

        <p style="margin-top:13px;">Municipio:</p>

        <p style="margin-top:-1px;">Estado:</p>

        <p style="margin-top:3px;">Código Postal:</p>

        <p style="margin-top:10px;">Correo:</p>

        <p style="margin-top:14px;">Página web:</p>

        <p style="margin-top:12px;">Logo:</p>

        <p style="margin-top:15px;">Descripción:</p>

        <p style="margin-top:45px;">Ubicación:</p>
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

<div id="map-canvas" style="display:none;margin-top:-26px;">
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



<div style="display:block;float:left;widht:100px;height:344px;">
<div id="espacio_izquierda" class="seccion_izquierda_secciones">
<ul class="iconos" id="iconos_grandes">
        <li <?php if ($this->session->userdata('idUsuario') !== FALSE): ?>  onclick="window.location='<?= base_url() ?>carrito';" <?php else: ?>  <?php endif; ?>>
            <div class="indicadores" style="margin-top: 78px;margin-left: 60px;"> 
                <?php echo $carritoT ?>
                
            </div> 

            <img src="<?php echo base_url() ?>images/compras.png"/></li>
        <li 
        <?php if ($this->session->userdata('idUsuario') !== FALSE): ?>
       <?php else: ?> onclick="muestra('contenedor_login');oculta('envio_con');muestra('ingreso_normal');" <?php endif; ?>>
        
        
        
            <div class="indicador" style="margin-top: 78px;margin-left: 60px;">
             <?php if ($this->session->userdata('idUsuario') !== FALSE): ?>
             <img src="<?php echo base_url() ?>images/indicador_si.png" title="Ya estas logueado">
             <?php else: ?>
             <img src="<?php echo base_url() ?>images/indicador_no.png">
             <?php endif; ?>
              </div>
            <img src="<?php echo base_url() ?>images/sesion.png"/></li> 
            
        <li <?php if ($this->session->userdata('idUsuario') !== FALSE): ?>  <?php else: ?>onclick="muestra('contenedor_registro');" <?php endif; ?>>
            <div class="indicador" style="margin-top: 78px;margin-left: 60px;"> 
            <?php if ($this->session->userdata('idUsuario') !== FALSE): ?>
             <img src="<?php echo base_url() ?>images/indicador_si.png" title="Ya estas registrado">
             <?php else: ?>
             <img src="<?php echo base_url() ?>images/indicador_no.png">
             <?php endif; ?>
             </div>
            <img src="<?php echo base_url() ?>images/registrate.png"/>
        </li>
    </ul>
</div></div>