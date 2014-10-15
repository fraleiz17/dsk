<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title><?php echo isset($title) ? $title . ' - ' : '' ?> Quierounperro</title>
        <link rel="shortcut icon" href="<?php echo base_url() ?>images/ico.ico" />
        <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>css/reset.css" media="screen"/>
        <link rel="stylesheet" href="<?php echo base_url() ?>css/nivo-slider.css" type="text/css" media="screen" /> 
        <link rel="stylesheet" href="<?php echo base_url() ?>css/responsiveslides.css"/>
        <link href="<?php echo base_url() ?>css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="<?php echo base_url() ?>css/validator/validationEngine.jquery.css" type="text/css"/>
        <link rel="stylesheet" href="<?php echo base_url() ?>css/jPages.css"/>
        <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>css/general.css" media="screen"/>
        <link href="<?php echo base_url() ?>css/uploadfile.css" rel="stylesheet"/>

        <?php if (isset($links)): ?>
            <?php foreach ($links as $l): ?>
                <link rel="stylesheet" href="<?php echo base_url() ?>css/<?php echo $l ?>.css"/>
            <?php endforeach; ?>
        <?php endif; ?>

        <script type="text/javascript" src="<?php echo base_url() ?>js/jquery-1.8.2.min.js"></script>
        <script src="<?php echo base_url() ?>js/jquery-ui.js"></script>
        <script src="<?php echo base_url() ?>js/jPages.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>js/jquery.cycle.all.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>js/validator/languages/jquery.validationEngine-es.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>js/validator/jquery.validationEngine.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>js/jquery.uploadfile.min.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>js/funcion_select.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>js/jquery.customSelect.js"></script>
        <script src="<?php echo base_url() ?>js/funciones_.js" type="text/javascript"></script>

        <?php if (isset($scripts)): ?>
            <?php foreach ($scripts as $s): ?>
                <?php if (strpos($s, 'http://') === false) : ?>
                    <script type="text/javascript" src="<?php echo base_url() ?>js/<?php echo $s ?>.js"></script>
                <?php else: ?>
                    <script type="text/javascript" src="<?php echo $s ?>"></script>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endif; ?>

        <script>
            if (navigator.userAgent.toLowerCase().indexOf('chrome') > -1) {

                document.write('<link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>css/index_.css" media="screen"></link> <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>css/general.css" media="screen"></link> ');
            }
            if (navigator.appName == "Microsoft Internet Explorer") {

                document.write('<link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>css/index_explorer.css" media="screen"></link>');
            }
        </script>

        <!-- [if lt IE ]>
        <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>css/index_explorer.css" media="screen"></link>
        <![endif]-->

        <script src="<?php echo base_url() ?>js/funciones_index.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>js/jquery.nivo.slider.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>js/responsiveslides.min.js"></script>
        <script src="<?php echo base_url() ?>js/jquery-ui.js"></script>
        <!-- include jQuery library -->

        <!-- include Cycle plugin -->
        <script type="text/javascript" src="<?php echo base_url() ?>js/jquery.cycle.all.js"></script>  

        <script>
            function ajaxValidationCallback(status, form, json, options) {
                if (status === true) {

                    var data = json;
                    if (data.response == true) {

                        $("#confirm").prepend('<label>Tu usuario ha sido creado exitosamente, por favor activa tu cuenta atravez del e-mail que ha sido enviado a tu cuenta de correo electronico. Para poder anunciarte y publicar anuncios, deberás registrar tu información completa. Esto lo podrás hacer en cualquier momento entrando a tu perfil.</label>');
                        muestra('contenedor_correcto');
                        oculta('contenedor_registro');

                    }
                }
            }

            jQuery(document).ready(function() {
                // binds form submission and fields to the validation engine
                jQuery("#registerNow").validationEngine({
                    promptPosition: "topRight",
                    scroll: false,
                    ajaxFormValidation: true,
                    ajaxFormValidationMethod: 'post',
                    onAjaxFormComplete: ajaxValidationCallback
                });


            });

            function showMap() {
                var user = $("input:checked").val();
                if (user == 1) {
                    $('#map-canvas').hide();
                } else {
                    $('#map-canvas').show();
                }

            }

            function hideMap() {
                var user = $("input:checked").val();
                $('#map-canvas').hide();

            }

            function updateDatabase(newLat, newLng) {
                // make an ajax request to a PHP file
                // on our site that will update the database
                // pass in our lat/lng as parameters
                $("#newLat").val(newLat);
                $("#newLng").val(newLng);
            }
        </script>

    </head>
    <body>
