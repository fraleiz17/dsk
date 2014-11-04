<script>
            if (navigator.userAgent.toLowerCase().indexOf('chrome') > -1) {

                document.write('<link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>css/index_.css" media="screen"></link> <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>css/general.css" media="screen"></link> ');
            }
            if (navigator.appName == "Microsoft Internet Explorer") {

                document.write('<link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>css/index_explorer.css" media="screen"></link>');
            }
        </script>
        
        

<div id="menu_inferior" align="center">
    <div id="acerca_nosotros" class="menu_inferiror">
        <p class="title_final">Acerca de nosotros</p>

        <div class="contenido_final">
            <ul class="sub_menu_inferior">
                <li onclick="window.location.href='<?=base_url()?>quienes'"> - ¿Quiénes Somos?
                </li>
                <li onclick="window.location.href='<?=base_url()?>quienes#sub_quienes'">- La comunidad QUP</li>
            </ul>
        </div>
    </div>
    <div id="politicas" class="menu_inferiror">
        <p class="title_final">Políticas</p>

        <div class="contenido_final">
            <ul class="sub_menu_inferior">
                <li> - <a href="<?php echo base_url()?>content/aviso_de_privacidad.pdf" target="_blank" style="text-decoration:none;color:#000;">Aviso de privacidad</a></li>
                <li> - <a href="<?php echo base_url()?>content/politica_de_privacidad.pdf" target="_blank" style="text-decoration:none;color:#000;">Política de Privacidad</a></li>
                <li> - <a href="<?php echo base_url()?>content/terminos_y_condiciones.pdf" target="_blank" style="text-decoration:none;color:#000;">Términos y Condiciones</a> </li>
            </ul>
        </div>
    </div>
    <div id="contacto" class="menu_inferiror">
        <p class="title_final">Contacto</p>

        <div class="contenido_final">
            <ul class="sub_menu_inferior">
                <li>- Tutorial</li>
                <li onclick="window.location.href='<?=base_url()?>quienes/publicidad/1'"> - Publicidad</li>
                <li onclick="window.location.href='<?=base_url()?>quienes/publicidad/2'"> - Soporte</li>
                <li onclick="window.location.href='<?=base_url()?>quienes/preguntas'">- Preguntas Frecuentes</li>
            </ul>
        </div>
    </div>
</div>
</br>
</br>
</br>
</br></br>
</br></br>
</br>
<div class="footer">
    <img src="<?php echo base_url() ?>images/perro_final.png" width="46" height="42"/>
    <a href="<?php echo base_url() ?>#"><img src="<?php echo base_url() ?>images/ico_fb.png" width="32" height="32"
                                             style="margin-top:10px;"/></a>
    <a href="<?php echo base_url() ?>#" class="margen"><img src="<?php echo base_url() ?>images/ico_tw.png" width="32"
                                                            height="32" style="margin-top:10px;"/></a>
</div>
<div class="division_final">

</div>
<div class="pie_pagina">
    Copyright © 2014 QuieroUnPerro.com
</div>
