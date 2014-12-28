
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
