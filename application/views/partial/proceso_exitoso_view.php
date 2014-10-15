<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Quierounperro</title>
    <head>
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

</head>
<body>

<div class="contenedor_registro" id="contenedor_correcto" style="display:;"> <!-- Contenedor negro reistro-->
    <div class="cerrar_registro"><img src="<?php echo base_url() ?>images/cerrar.png"
                                      onclick="window.location.href='<?=base_url()?>principal/miPerfil'"/></div>
<?php if($estatusCompra == 1){?>
    <div class="registro_normal"> <!-- Contenedor morado registro -->

        <div class="titulo_registro">GRACIAS</div>
        </br>
       <div class="contenido_confirmacion">
                    <strong> Gracias por publicar en QUP </strong>
                    </br></br>
                    <div> Tu anuncio ha pasado a la sección de aprobación, pronto recibirás un correo con la confirmación de la publicación.</div>
                    <div id="confirm">
                    </div>
        
                </div>
    </div>
    </br>


</div>

<!--        FIN EXITO REGISTRO                      -->
<!-- ------------------------------------------------------ -->
<?php } else { ?>

<!--        ERROR REGISTRO                          -->
<!-- ------------------------------------------------------ -->

<div class="contenedor_registro" id="contenedor_error" style="display:;"> <!-- Contenedor negro reistro-->
    <div class="cerrar_registro"><img src="<?php echo base_url() ?>images/cerrar.png"
                                     onclick="window.location.href='<?=base_url()?>principal/miPerfil'"/></div>

    <div class="registro_normal"> <!-- Contenedor morado registro -->

        <div class="titulo_registro">ERROR</div>
        </br>
        <div class="imagen_confirmacion">
            <img src="<?php echo base_url() ?>images/tache.png"/>
        </div>
        <div class="contenido_confirmacion">
            <strong> Ha ocurrido un error al realizar el pago, por favor inténtalo nuevamente</strong>
            </br>
            <div id="specificError">

            </div>
        </div>
    </div>
    </br>

</div>



<!--        FIN ERROR REGISTRO                          -->
<!-- ------------------------------------------------------ -->
<?php } ?>
</body>
</html>