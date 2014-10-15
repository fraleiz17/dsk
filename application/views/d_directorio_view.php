<?php
$this->load->view('general/general_header_view', array('title' => 'Detalles Directorio',
    'scripts' => array('funciones_venta', 'funciones_'), 'links' => array('venta',
        'directorio', 'directorio_detalle')));
?>
<?php $this->load->view('general/menu_view', array('seccion' => $seccion)) ?>
<?php if ($this->session->userdata('idUsuario') !== FALSE): ?>
    <div class="contenedor_contactar" id="contenedor_contactar" style="display: none;">
        <div class="contenedor_cerrar_contactar_negocio">
            <img src="<?php echo base_url() ?>images/cerrar_anuncio_gris.png" onclick="oculta('contenedor_contactar');">
        </div>
        <div class="contactar_al_aunuciante_negocio">
            <font class="titulo_anuncio_publicado"> CONTACTA AL ANUNCIANTE </font>
            <br>
            <br>
            <strong> Nombre del negocio:</strong> <?php echo $detalles->razonSocial ?>
            <br>
            <strong> Estado: </strong> Hidalgo
            <br>
            <strong> Ciudad: </strong> <?php echo $detalles->municipio ?>
            <br>
            <strong> Teléfono: </strong> <?php echo $detalles->telefono ?>
            <br>
            <br>
            <font class="titulo_anuncio_publicado"> PROPORCIONA TU INFORMACIÓN </font>
            <br>
            <br>
            <form id="form_contacto" >
                <input type="text" class="formu_contacto" id="nombre_contacto" name="nombre_contacto" onfocus="clear_textbox('nombre_contacto', 'Nombre');" value="<?php echo $this->session->userdata('nombre') . ' ' . $this->session->userdata('apellido') ?>" size="44">
                <input type="text" class="formu_contacto" id="mail_contacto" name="email_contacto" onfocus="clear_textbox('mail_contacto', 'Tu-email')" value="<?php echo $this->session->userdata('correo') ?>" size="44">
                <input type="text" class="formu_contacto" id="asunto_contacto" name="asunto_contacto" onfocus="clear_textbox('asunto_contacto', 'Asunto')" placeholder="Asunto" size="44">
                <textarea cols="50" onfocus="clear_textbox('comentarios_contacto', 'Comentarios')" id="comentarios_contacto" name="comentario_contacto" class="formu_contacto" placeholder="Comentarios" rows="5"></textarea>
                <br>
                <br>
                <div>
                    <div>
                        <ul class="boton_naranja_tres">
                            <li>
                                <input type="submit" value="Enviar"/>
                            </li>
                        </ul>
                    </div>
                    <div class='infouser' style="display: inline-block; width: 335px;"></div>
                </div>
            </form>
        </div>
    </div>
<?php endif; ?>

<div class="titulo_seccion">
    DIRECTORIO


    <div class="contenedor_anunciar_negocio" onclick="muestra('contenedor_publicar_anuncio_negocio');">
        <div class="titulo_anunciate">
            ANUNCIATE
        </div>
        <div class="descripcion_anunciar_negocio">
            en nuestro Directorio
        </div>
        <div class="el_click">
            <img src="<?php echo base_url() ?>images/click.png" width="60" height="60">
        </div>
    </div>
</div>

<div id="contenedor_central">
    <div class="contenido_directorio">
        <div class="contenedor_logotipo_directorio"> 
            <?php if (!is_null($detalles->logo)): ?>
                <img src="<?php echo base_url() ?>images/negocio_logo/<?php echo str_replace(' ', '_', strtolower($detalles->logo)); ?>.png"/>
            <?php else: ?>
                <img style="width: 66%;" src="<?php echo base_url() ?>images/giros_negocio/<?php echo str_replace(' ', '_', strtolower($detalles->nombreGiro)); ?>.png"/>
            <?php endif; ?>
        </div>

        <div class="contenedor_nombre_empresa"> <?php echo $detalles->razonSocial ?>
            CANINO VON MARAB</div>
    </div>

    <div style=" margin-left:8px; margin-right:8px;" class="contenido_directorio">
        <div class="contenedor_titulo_informcacion"> CONTACTANOS </div>
        <div class="contenedor_informacion">
            <p>Querétaro, Servicio a Domicilio
                Querétaro Querétaro</p>
            <p class="margin_top_10">Tel: <?php echo $detalles->telefono ?></p>
            <p class="margin_top_10">Contacto:  <?php echo $detalles->nombreContacto ?></p>
            <p class="margin_top_10">Pagina Web: <?php echo $detalles->paginaWeb ?></p>
            <?php if ($this->session->userdata('idUsuario') !== FALSE): ?>
                <ul class="boton_morado"><li onclick="muestra('contenedor_contactar');"> Enviar mail </li> </ul>
            <?php endif; ?></div>

    </div>

    <div class="contenido_directorio">
        <div class="contenedor_titulo_informcacion"> SERVICIOS </div>
        <div class="contenedor_informacion">
            <?php foreach ($giros as $giro): ?>
                <p> 
                    <img src="<?php echo base_url() ?>images/giros_negocio/<?php echo str_replace(' ', '_', strtolower($giro->nombreGiro)); ?>.png" width="36" height="30"/> 
                    <?php echo $giro->nombreGiro; ?>
                </p>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="contenedor_descripcion_detalle">
        <?php echo $detalles->descripcion; ?>
    </div>
    <div class="contenedor_del_mapa" id="mapa_directorio"> el mapa</div>
    <div class="contenedor_horarios">
        <div class="contenedor_titulo_informcacion"> HORARIOS </div>
        <br>
        <div class="contenedor_datos_horario">
            <p>Lunes a Vienes :  8:00 am a 5:00 p.m</p>
            <br>
            <p>Sabados: 10:00 a.m a 2:00p.m</p>
        </div>
    </div>

</div>
<script>
    function initialize() {
        var myLatlng = new google.maps.LatLng(<?php echo $detalles->latitud ?>, <?php echo $detalles->longitud ?>);
        var mapOptions = {
            zoom: 16,
            center: myLatlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            draggable: true
        }
        var map = new google.maps.Map(document.getElementById("mapa_directorio"), mapOptions);

        var marker = new google.maps.Marker({
            position: myLatlng,
            map: map,
            title: "<?php echo $detalles->razonSocial ?>"
        });
    }

    function loadScript() {
        var script = document.createElement("script");
        script.type = "text/javascript";
        script.src = "http://maps.googleapis.com/maps/api/js?key=AIzaSyBMU3tBrpE9oNyv2pgKTxKqNwV_IL4Y0DI&sensor=TRUE&callback=initialize";
        document.body.appendChild(script);
    }

    window.onload = loadScript;

    $(function() {
        $('#form_contacto').submit(function(e) {
            e.preventDefault();

            var form = $(this);

            $.ajax({
                url: '<?php echo base_url('directorio/contactar/' . $detalles->idUsuario); ?>',
                type: 'post',
                dataType: 'html',
                data: form.serialize(),
                beforeSend: function() {
                    $(".infouser", form).empty().html('<div class="spinner"><div class="bounce1"></div><div class="bounce2"></div><div class="bounce3"></div></div>');
                },
                success: function(data) {
                    $(".infouser", form).empty().append(data);

                },
                complete: function() {
                    $(".infouser", form).empty();
                }
            });

        });
    });

</script>
<br/>
<?php $this->load->view('general/footer_view'); ?>

</body>
</html>
