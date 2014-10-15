<?php
/**
 * requiere el listado de los giros, estados, planes, datos de myInfo de usuario
 */
?>
<style>
    #paso_tres_negocio label{
        display: inline-block;
        width: auto;
        margin-right: 5px;
    }
    #body_form_partial label{
        width: 84px;
    }
    #paso_tres_negocio input, #paso_tres_negocio select{
        margin: 0 15px 0 0!important;
        padding: 0!important;
        width: 140px;
        height: 16px;
    }
    #paso_tres_negocio textarea{
        width: 90%;
    }
    .listado_numeros_anuncio li{
        width: 95px!important;
        height: 68px!important;
    }
</style>
<div id="contenedor_publicar_anuncio_negocio" class="contenedor_publicar_anuncio" style=" display:none;">
    <!-- Inicio contenedor pap publicar anuncio anuncio !-->
    <div id="publicar_anuncio_negocio" class="pubicar_anuncio">
        <?php if (is_logged() /*&& $this->session->userdata('tipoUsuario') == 2*/): ?>
            <form method="post" name="form_anuncio_negocio" id="form_anuncio_negocio">
                <div class="numeros_publicar_anuncio">
                    <ul class="listado_numeros_anuncio">
                        <li data-titulo="Selecciona el giro de tu negocio" data-p="paso_uno_negocio" class="numero_seccion view_step">1</li>
                        <li data-titulo="Planes" data-p="paso_dos_negocio" >2</li>
                        <li data-titulo="Completa tu información" data-p="paso_tres_negocio">3</li>
                        <li data-titulo="Vista previa de tu anuncio" data-p="paso_cuatro_negocio">4</li>
                        <li data-titulo="Detalle de compra:" data-p="paso_cinco_negocio">5</li>
                        <li data-titulo="Pago:" data-p="paso_seis_negocio">6</li>

                    </ul>
                </div>
                <div class="crerar_publicar_anuncio">
                    <img src="<?php echo base_url() ?>images/cerrar.png" onclick="oculta('contenedor_publicar_anuncio_negocio');"/>
                </div>
                <br/>            
                <!-- Inicio Paso UNO -->
                <div id="paso_uno_negocio" class="paso view_step">

                    <div class="descipcion_pasos">
                        <div class="titulo_de_pasos"> PUBLICAR EN DIRECTORIO </div>
                        <div class="instrucciones_pasos"> Selecciona el giro de tu negocio</div>
                        <div class="contenido_indicacion">
                            <img src="<?php echo base_url() ?>images/pero_paso_uno.png" class="perrito_uno"/>

                            <div class="contenedor_checkbox">
                                <?php foreach ($giros as $index => $giro): ?>
                                    <?php if ($index % 2 !== 0): ?>
                                        <label style="display: inline-block; margin-bottom: 2px;">
                                            <input class="giro_form validate[required]" type="checkbox" name="giro_<?php echo ($index + 1) ?>_form" value="<?php echo $giro->giroID ?>" id="CheckboxGiro_0" />
                                            <?php echo $giro->nombreGiro; ?>
                                        </label>
                                        <br />
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                            <div class="contenedor_checkbox">

                                <?php foreach ($giros as $index => $giro): ?>
                                    <?php if ($index % 2 === 0): ?>
                                        <label style="display: inline-block; margin-bottom: 2px;">
                                            <input class="giro_form validate[required]" type="checkbox" name="giro_<?php echo ($index + 1) ?>_form" value="<?php echo $giro->giroID ?>" id="CheckboxGiro_0" />
                                            <?php echo $giro->nombreGiro; ?>
                                        </label>
                                        <br />
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                            <br/>                        
                            <div>
                                <ul class="morado_directorio">
                                    <li class="sig_paso">
                                        Continuar
                                    </li>
                                </ul>
                                <br/>
                                <br/>
                                <div id="msj_paso" style="font-size: 10px;display: inline-block; vertical-align: bottom; height: 38px;"></div>
                            </div>                        
                        </div>
                    </div>
                </div>
                <!-- FIN anuncio UNO -->

                <!-- Inicio paso DOS -->
                <div id="paso_dos_negocio" class="paso" style="display:none;">
                    <div class="descipcion_pasos">
                        <div class="titulo_de_pasos"> PUBLICAR EN DIRECTORIO </div>
                        <div class="instrucciones_pasos"> Planes</div>
                        <div class="contenido_indicacion">
                            <br/>
                            <table class="tabla_pago"  width="500" style=" margin-left:167px;">
                                <tr>
                                    <th>
                                        Tiempo de exposición
                                    </th>
                                    <th> Descuento </th>
                                    <th> Precio </th>
                                </tr>
                                <?php foreach ($planes as $plan): ?>
                                    <tr>
                                        <td>
                                            <label>
                                                <input data-vigencia="<?php echo intval($plan->vigencia / 30) ?>" data-descuento="<?php echo $plan->valor ?>" data-precio="<?php echo $plan->precio ?>" type="radio" name="plan_form" class="validate[required]" value="<?php echo $plan->paqueteID ?>" id="RadioGroup2_0" />
                                                <?php echo intval($plan->vigencia / 30) ?>&nbsp;<?php echo ($plan->vigencia / 30 > 1) ? 'meses' : 'mes' ?></label>
                                        </td>
                                        <td><?php echo $plan->valor ?>% </td>
                                        <td> $<?php echo $plan->precio ?> </td>
                                    </tr>
                                <?php endforeach; ?>

                            </table>

                            <br/>
                            <br/>
                            <div>
                                <ul class="morado_directorio">
                                    <li class="sig_paso">
                                        Continuar
                                    </li>
                                </ul>
                                <br/>
                                <br/>
                                <div id="msj_paso" style="font-size: 10px;display: inline-block; vertical-align: bottom; height: 38px;"></div>
                            </div>  
                        </div>
                    </div>
                </div>
                <!-- FIN paso dos !-->
                <!-- INICIO paso TRES -->
                <div id="paso_tres_negocio" class="paso" style="display:none;" >
                    <div class="descipcion_pasos_largo">
                        <div class="titulo_de_pasos"> PUBLICAR EN DIRECTORIO </div>
                        <div class="instrucciones_pasos"> Completa tu información</div>
                        <div class="sub_instrucciones_pasos"> Datos de contacto </div>
                        <div class="contenido_indicacion_formulario" style="height: auto!important;">
                            <p class="margen_15_left" >
                                <label>Nombre:</label><input name="nombre_negocio" value="<?php echo $user->nombre; ?>" type="text" class="background_morado_35 validate[required]" readonly="readonly" /> 
                                <label>Apellido:</label><input name="apellido_negocio" value="<?php echo $user->apellido; ?>" type="text" class="background_morado_35 validate[required]" readonly="readonly" />  
                                <label>Correo electrónico:</label><input name="email_negocio" value="<?php echo $user->correo; ?>" type="text" class="background_morado validate[required, custom[email]]" readonly="readonly" />
                            </p>
                            <br/>
                            <p class="margen_15_left"> 
                                <label>Teléfono:</label><input name="telefono_negocio" value="<?php echo $user->telefono; ?>" type="text" class="background_gris_35 validate[required, custom[phone]]"/> 
                                <label>Mostrar teléfono en el anuncio:</label><select name="muestra_telefono_negocio" class="background_gris validate[required]">
                                    <option value="0">--</option>
                                    <option value="1"> Si </option>
                                    <option value="0"> No </option>
                                </select>

                            </p>
                            <br/>
                            <p class="margen_15_left"> 
                                <label>Nombre del negocio:</label>
                                <input name="nombre_negocio_form" type="text" class="background_gris_55 validate[required]" value="<?php echo $user->nombreNegocio ?>"/>
                            </p>
                            <br/>
                            <div class="sub_instrucciones_pasos"> Horarios atención </div>
                            <br/>
                            <p>
                                <label>Favor de colocar el horario y días de atención.</label> <textarea name="horarios_negocio" class="background_gris validate[required]" cols="95" rows="6" ></textarea>
                            </p>
                            <div class="sub_instrucciones_pasos"> Detalles del anuncio </div>
                            <br/>
                            <div id="body_form_partial">
                                <p class="margen_15_left">
                                    <label>Estado:</label><select name="estado_negocio" class="background_gris_100 validate[required]">
                                        <option value=""> --- </option>
                                        <?php foreach ($estados as $edo) : ?>
                                            <option value="<?php echo $edo->estadoID ?>" <?php echo $user->estadoID === $edo->estadoID ? 'selected' : ''; ?>> <?php echo $edo->nombreEstado ?> </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <label>Municipio:</label><input name="ciudad_negocio" value="<?php echo $user->municipio; ?>" class="background_gris_100 validate[required]"/>
                                    <label>Colonia:</label><input name="colonia_negocio" value="<?php echo $user->colonia; ?>" type="text" class="background_gris validate[required]"/> </p>
                                <br/>

                                <p class="margen_15_left"> 
                                    <label>Calle:</label><input name="calle_negocio" type="text" value="<?php echo $user->calle; ?>" class="background_gris_55 validate[required]"  /> 
                                    <label>Número:</label><input name="numero_negocio" type="text" value="<?php echo $user->noExterior; ?>" class="background_gris validate[required]" />
                                    <label>Vencimiento:</label><input name="vencimiento_negocio" class="background_morado validate[required]" type="text" readonly/>
                                </p>
                                <br/>

                                <p class="margen_15_left"> 
                                    <label>CP:</label><input name="cp_negocio" value="<?php echo $user->cp; ?>" type="text" class="background_gris_55 validate[required,maxSize[5],minSize[5],custom[integer]]"/> 
                                    <label>E-mail:</label><input name="email_negocio" type="text" value="<?php echo $user->correo; ?>" class="background_gris validate[required]"/>
                                    <label>Pagina Web:</label><input name="pagina_web_negocio" value="<?php echo $user->paginaWeb; ?>" class="background_gris validate[required,custom[url]]" type="text"/>
                                </p>
                            </div>
                            <br/>
                            <p class="margen_15_left">
                                <label>Descripción:</label><textarea name="descripcion_negocio" class="background_gris validate[required]" cols="95" rows="3" ></textarea>
                            </p>
                            <br/>
                            <p class="margen_15_left">
                                <label>Ubicación:</label>
                            <div id="mapa_negocio" style="height: 300px;"></div>
                            <input type="hidden" value="" name="latitud_negocio" id="latitud_negocio"/>
                            <input type="hidden" value="" name="longitud_negocio" id="longitud_negocio"/>
                            </p>
                            <br/>
                            <p class="margen_15_left">
                            <div id="fileuploader" >
                                Seleccionar Logotipo
                            </div>
                            <input name="name_logo_form" value="" type="hidden"/>
                            <div class="row-fluid">
                                <span id="error_logo" style="display:none;" class="alert alert-error"></span>
                                <img id="logo_image" class="span6 thumbnail" src=""/>
                            </div>
                            </p>
                            <div style="width:800px; height:150px;">
                                <p>
                                <h3>Notas</h3>
                                </p>                            
                            </div>

                            <div>
                                <ul class="morado_directorio">
                                    <li class="sig_paso">
                                        Continuar
                                    </li>
                                </ul>
                                <br/>
                                <br/>
                                <div id="msj_paso" style="font-size: 10px;display: inline-block; vertical-align: bottom; height: 38px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- FIN paso TRES -->

                <div id="paso_cuatro_negocio" class="paso" style="display:none;" > <!-- inicio del contendor paso 4 -->
                    <div class="descipcion_pasos_mediano">
                        <div class="titulo_de_pasos"> PUBLICAR EN DIRECTORIO </div>
                        <div class="instrucciones_pasos"> Vista previa de tu anuncio</div>
                        <div class="contenedor_total_directorio_mini">
                            <div class="contenido_directorio_mini">
                                <div class="contenedor_logotipo_directorio_mini"> <img id="name_logo_form" src="<?php echo base_url() ?>images/negocio_logo/marab.png" width="145" height="145" /></div>
                                <div id="nombre_negocio_form" class="contenedor_nombre_empresa_mini"> 
                                    CENTRO DE ADIESTRAMIENTO CANINO VON MARAB
                                </div>
                            </div>

                            <div style=" margin-left:8px; margin-right:8px;" class="contenido_directorio_mini">
                                <div class="contenedor_titulo_informcacion_mini"> CONTACTANOS </div>
                                <div class="contenedor_informacion_mini">
                                    <p><span id="estado_negocio">Querétaro</span>,
                                        <span id="calle_negocio">Querétaro</span> <span id="numero_negocio">Querétaro</span> <span id="colonia_negocio"></span>
                                        <span id="ciudad_negocio"></span> C.P. <span id="cp_negocio"></span></p>

                                    <p>Tel: <span id="telefono_negocio">442 181 42 14</span></p>

                                    <p>Contacto: <span id="nombre_negocio"> Luis</span> <span id="apellido_negocio">Garay</span></p>

                                    <p>Pagina Web: <span id="pagina_web_negocio">von_marab.com</span></p>
                                    <br/>
                                    <ul class="boton_morado_mini">
                                        <li> Enviar mail </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="contenido_directorio_mini">
                                <div class="contenedor_titulo_informcacion_mini"> SERVICIOS </div>
                                <div id="giro_form" class="contenedor_informacion_mini">
                                    <p> <img src="<?php echo base_url() ?>images/giros_negocio/adistramiento_canino.png" width="24" height="20"/> Adiestramiento Canino </p>

                                    <p style="margin-top:7px;"> <img src="<?php echo base_url() ?>images/giros_negocio/criadero.png" width="24" height="20"/> Criadero de Perros </p>
                                </div>
                            </div>
                            <div id="descripcion_negocio" class="contenedor_descripcion_detalle_mini" style="word-break: normal; word-wrap: break-word;">
                                Somos una empresa con el fin de ofrecerte todos los adiestrmientos que tu mascota necesita en un solo lugar, esto nos hace el único centro integral para tu mascota en la región.
                                A través de los años hemos conocido adiestradores, veterinarios e incluso estéticas caninas los cuales les dan un trato pésimo y con violencia a los animales... Nosotros no!...  para nosotros no son solo animales son nuestros amigos que nos acompañan durante algunas etapas de nuestra vida... porque ¿Que es lo que nos diferencia de los animales?.. solo la capacidad de ser humanos, pero a veces los animales son mas humanos que el hombre... ¡NOSOTROS SI CUIDAMOS A TU MEJOR AMIGO!
                            </div>
                            <div id="mapa_selected" class="contenedor_del_mapa_mini"></div>
                            <div class="contenedor_horarios_mini">
                                <div class="contenedor_titulo_informcacion_mini"> HORARIOS </div>
                                <br/>
                                <div id="horarios_negocio" class="contenedor_datos_horario_mini" style="word-break: normal; word-wrap: break-word;">

                                </div>
                            </div>
                        </div>
                        <br/>

                        <div id="contendedor_morado" class="contenedor_morado">
                            <ul class="morado_15_sinmargen" >
                                <li data-titulo="Completa tu información" data-p="paso_tres_negocio">
                                    Editar
                                </li>
                            </ul>
                            <ul class="morado_15_sinmargen" >
                                <li class="sig_paso">
                                    Continuar
                                </li>
                            </ul>
                            <br/>
                            <div id="msj_paso" style="font-size: 10px;display: inline-block; vertical-align: bottom; height: 38px;"></div>
                        </div>
                    </div>
                </div> <!-- final del contendor paso 4 -->
                <!-- Inicio paso 5 -->
                <div id="paso_cinco_negocio" class="paso" style="display:none;">
                    <div class="descipcion_pasos_mediano">
                        <div class="titulo_de_pasos"> PUBLICAR EN DIRECTORIO </div>
                        <div class="instrucciones_pasos"> Detalle de compra: </div>
                        <br/>
                        <table class="tabla_pago" style="margin-left:70px;" width="700">
                            <tr>
                                <th width="158">
                                    PRODUCTO
                                </th>
                                <th width="345">
                                    DETALLE
                                </th>
                                <th width="181">
                                    COSTO
                                </th>
                            </tr>
                            <tr>
                                <td>
                                    Publicación en directorio por <span class="descripcion_plan">6</span> meses
                                </td>
                                <td id="detalle_plan">
                                    <p>* Datos de contacto </p>
                                    <p>* Envio de correo de contacto</p>
                                    <p>* Ubicación google maps</p>
                                    <p>* Vigencia <span class="descripcion_plan">6</span> meses</p>
                                </td>
                                <td>
                                    <p id="totales" class="totales">$435.00</p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <p>SUBTOTAL:</p>
                                </td>
                                <td>
                                    <p id="subtotal" class="totales"> $435.00 </p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <p>IVA:</p>
                                </td>
                                <td>
                                    <p id="iva" class="totales"> $435.00 </p>
                                </td>
                            </tr>
                            <tr>
                                <th colspan="2">
                                    TOTAL
                                </th>
                                <th>
                            <p class="totales" id="total" style="color: #FFF;">$435.00</p>
                            </th>
                            </tr>
                        </table>
                        <br/>
                        <div>
                            <ul class="morado_directorio">
                                <li class="sig_paso">
                                    <input type="submit" value="comprar"/>
                                </li>
                            </ul>
                            <br/>
                            <br/>
                            <div id="msj_paso" style="font-size: 10px;display: inline-block; vertical-align: bottom; height: 38px;"></div>
                        </div>                    
                    </div>
                </div>
                <!-- Fin  paso 5 -->

                <div id="paso_seis_negocio" class="paso" style="display:none;">
                    <div class="descipcion_pasos_mediano">
                        <div class="titulo_de_pasos"> PUBLICAR EN DIRECTORIO </div>
                        <div class="instrucciones_pasos"> Pago del directorio: </div>
                        <div id="iframe"></div>
                        <br/>
                    </div>
                </div>
            </form>
        <?php else: ?>
            <div class="numeros_publicar_anuncio">
                <ul class="listado_numeros_anuncio">
                    <li class="numero_seccion view_step">1</li>
                </ul>
            </div>
            <div class="crerar_publicar_anuncio">
                <img src="<?php echo base_url() ?>images/cerrar.png" onclick="oculta('contenedor_publicar_anuncio_negocio');"/>

            </div>
            <div class="descipcion_pasos" style="margin-top: 90px!important;">
                <div class="titulo_de_pasos"> PUBLICAR EN DIRECTORIO </div>
                <div class="instrucciones_pasos"> Favor de registrarte o <a href="<?php echo base_url('principal/index') ?>">iniciar sesión.</a></div>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php if (is_logged()): ?>
    <script>

        var map;
        var mapSelected;
        var marker;
        var markerSelected;
        var g;
        var myLatlng;

        var latitudField = document.getElementById('latitud_negocio');
        var longitudField = document.getElementById('longitud_negocio');

        function initialize() {
            g = google.maps.event;
            myLatlng = new google.maps.LatLng(<?php echo $this->session->userdata('latitud') !== FALSE ? $this->session->userdata('latitud') : '20.5593958' ?>, <?php echo $this->session->userdata('longitud') !== FALSE ? $this->session->userdata('longitud') : '-100.4190292' ?>);

            var mapOptions = {
                zoom: 16,
                center: myLatlng,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                draggable: true
            };

            var mapOptionsSelected = {
                zoom: 13,
                center: myLatlng,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                draggable: false
            };

            map = new google.maps.Map(document.getElementById("mapa_negocio"), mapOptions);

            mapSelected = new google.maps.Map(document.getElementById("mapa_selected"), mapOptionsSelected);

            marker = new google.maps.Marker({
                position: myLatlng,
                map: map,
                draggable: true,
                animation: google.maps.Animation.DROP,
                title: 'Ubica tu negocio.'
            });

            markerSelected = new google.maps.Marker({
                position: myLatlng,
                map: mapSelected,
                draggable: false,
                animation: google.maps.Animation.DROP,
                title: 'Hey aqui esta tu negocio.'
            });


            latitudField.value = myLatlng.lat();
            longitudField.value = myLatlng.lng();

            google.maps.event.addListener(marker, 'click', toggleBounce);
            google.maps.event.addListener(marker, 'dragend', getPositionMarker);

        }

        function toggleBounce() {

            if (marker.getAnimation() !== null) {
                marker.setAnimation(null);
            } else {
                marker.setAnimation(google.maps.Animation.BOUNCE);
            }
        }

        function getPositionMarker() {
            var position = marker.getPosition();

            latitudField.value = position.lat();
            longitudField.value = position.lng();

            markerSelected.setPosition(new google.maps.LatLng(position.lat(), position.lng()));

            mapSelected.setCenter(markerSelected.getPosition());

        }

        function loadScript() {
            var script = document.createElement("script");
            script.type = "text/javascript";
            script.src = "http://maps.googleapis.com/maps/api/js?key=AIzaSyBMU3tBrpE9oNyv2pgKTxKqNwV_IL4Y0DI&sensor=TRUE&callback=initialize";
            document.body.appendChild(script);
        }

        window.onload = loadScript;

        $(function() {
            var form_negocio = $('#form_anuncio_negocio');

            $('.paso', form_negocio).hide();
            $('#paso_uno_negocio', form_negocio).show().addClass('paso_show');

            $('.sig_paso', form_negocio).on('click', function() {
                var sig_paso = $('.paso_show', form_negocio).next('.paso');
                if (revision_step($('.paso_show', form_negocio))) {
                    $('.paso_show', form_negocio).removeClass('paso_show').hide();
                    sig_paso.show(function() {
                        g.trigger(map, 'resize');
                        map.setCenter(marker.getPosition());
                        g.trigger(mapSelected, 'resize');
                        mapSelected.setCenter(markerSelected.getPosition());
                    }).addClass('paso_show');
                    $('.listado_numeros_anuncio li.numero_seccion', form_negocio).removeClass('numero_seccion');
                    var sel_paso = $('.listado_numeros_anuncio', form_negocio).find('[data-p="' + sig_paso.prop('id') + '"]');
                    sel_paso.addClass('numero_seccion view_step');
                    $('.instrucciones_pasos', form_negocio).text(sel_paso.data('titulo'));
                    $('#msj_paso').text("");
                    //add_step_move();
                }
            });

            function add_step_move() {
                $('.listado_numeros_anuncio li.view_step', form_negocio).on('click', function() {
                    $('.listado_numeros_anuncio li.numero_seccion', form_negocio).removeClass('numero_seccion');
                    $(this).addClass('numero_seccion');
                    var paso = $(this).data('p');
                    var titulo_paso = $(this).data('titulo');

                    $('.instrucciones_pasos', form_negocio).text(titulo_paso);

                    $('.paso', form_negocio).removeClass('paso_show').hide();
                    $('#msj_paso', form_negocio).text('');
                    $('#' + paso, form_negocio).show(function() {
                        g.trigger(map, 'resize');
                        map.setCenter(marker.getPosition());
                        g.trigger(mapSelected, 'resize');
                        mapSelected.setCenter(markerSelected.getPosition());
                    }).addClass('paso_show');
                    $('.instrucciones_pasos', form_negocio).text(titulo_paso);
                });
            }

            function revision_step(element) {
                if (element.prop('id') === 'paso_uno_negocio') {
                    $('#msj_paso', form_negocio).text("Debe seleccionar una sección");
                    $('.giro_form', form_negocio).validationEngine('validate');
                    return $('.giro_form:checked', form_negocio).val() === undefined ? false : true;
                }

                if (element.prop('id') === 'paso_dos_negocio') {
                    $('#msj_paso', form_negocio).text("Debe seleccionar un paquete");
                    $('[name=plan_form]').validationEngine('validate');
                    return $('input[name=plan_form]:checked', form_negocio).val() === undefined ? false : true;
                }

                if (element.prop('id') === 'paso_tres_negocio') {
                    $('#msj_paso', form_negocio).text("Debe completar todos los campos requeridos");
                    var obj = $('#paso_tres_negocio [name]:required', form_negocio).serialize().split('&');
                    $('#paso_tres_negocio [name]:required', form_negocio).validationEngine('validate');
                    for (var i = 0; i < obj.length; i++) {
                        var field = obj[i].split('=');
                        if (field[1] === '') {
                            return false;
                        }
                    }
                    return true;
                }

                return true;
            }

            $('input[name], textarea[name]', form_negocio).on('change', function() {
                var field = $(this);

                $('#' + field.prop('name'), form_negocio).text(field.prop('value'));

            });

            $('select[name]', form_negocio).on('change', function() {
                var selectfield = $(this);
                var optionfield = $('option:selected', selectfield);
                $('#' + selectfield.prop('name')).text(optionfield.text());
            });

            $('[name=plan_form]').on('change', function() {
                //vigencia descuento precio
                var field = $(this);

                $('[name=vencimiento_negocio]', form_negocio).val(field.data('vigencia') + ' meses');
                $('.descripcion_plan', form_negocio).text(field.data('vigencia'));

                //totales, subtotal, total
                var total_val = field.data('precio') - (field.data('precio') * (field.data('descuento') / 100));
				var iva = total_val * .16;
				var subtotal = total_val - iva;
                $('#totales', form_negocio).text('$ ' + (total_val.toFixed(2)));
				$('#iva', form_negocio).text('$ ' + (iva.toFixed(2)));
                $('#subtotal', form_negocio).text('$ ' + (subtotal.toFixed(2)));
                $('#total', form_negocio).text('$ ' + (total_val.toFixed(2)));

            });

            $("#fileuploader").uploadFile({
                url: "<?php echo base_url('directorio/upload_file') ?>",
                allowedTypes: "png,jpg,jpeg",
                fileName: "file_form",
                multiple: false,
                showFileCounter: false,
                returnType: 'json',
                showStatusAfterSuccess: false,
                onSuccess: function(files, data, xhr)
                {
                    $('#error_logo').fadeOut();
                    $('#logo_image').fadeOut();
                    if (data.error === undefined) {
                        $('#logo_image').prop('src', data.url_logo);
                        $('[name=name_logo_form]').val(data.orig_name).trigger('change');
                        $('#name_logo_form').prop('src', data.url_logo);
                        $('#logo_image').fadeIn();
                    } else {
                        $('#error_logo').fadeIn().text(data.error);
                    }
                }
            });

            $('#form_anuncio_negocio').submit(function(e) {
                e.preventDefault();
                var form = $(this);
                $.ajax({
                    url: '<?php echo base_url('directorio/nuevo') ?>',
                    type: 'post',
                    dataType: 'html',
                    data: form.serialize(),
                    success: function(data) {

                        $('#iframe').empty().append(data);
                    }
                });
            });

            add_step_move();
            $('#form_anuncio_negocio').validationEngine();
        });

        (function() {
            function $MPBR_load() {
                window.$MPBR_loaded !== true && (function() {
                    var s = document.createElement("script");
                    s.type = "text/javascript";
                    s.async = true;
                    s.src = ("https:" == document.location.protocol ? "https://www.mercadopago.com/org-img/jsapi/mptools/buttons/" : "http://mp-tools.mlstatic.com/buttons/") + "render.js";
                    var x = document.getElementsByTagName('script')[0];
                    x.parentNode.insertBefore(s, x);
                    window.$MPBR_loaded = true;
                })();
            }
            window.$MPBR_loaded !== true ? (window.attachEvent ? window.attachEvent('onload', $MPBR_load) : window.addEventListener('load', $MPBR_load, false)) : null;
        })();


    </script>

<?php endif; ?>
