<?php
$keyUser = $this->session->userdata('idUsuario');
$tipoUsuario = $this->session->userdata('tipoUsuario');

if ($keyUser === FALSE || ($keyUser !== FALSE && $tipoUsuario !== 0)):
    ?>
    <style>
        .principal li:hover {

            background-color: #762EA4;
            cursor: pointer;
        }

        .principal li ul a {
            padding: 10px;
        }

        .principal li ul li {
            margin-left: 10px;
            display: none;
            border: none !important;

        }

        .principal li ul {
            position: absolute;
            display: block;
            padding-left: 0px;
            -webkit-padding-start: 2px;
            text-align: left;
            margin: 0px;
            padding: 10px 10px;
        }

        .principal li ul li a {
            color: #FFFFFF;
            text-decoration: none;
        }

        .principal li ul li a:hover {
            color: #FFF;
        }

        .principal li:hover > ul li {
            height: 25px;
            font-size: 14px;
            display: block;
            padding: 0;
            list-style: none;
            float: none;
            background-color: #762EA4;
            color: #FFF;
            position: absolute;
            z-index: 10;
        }

        .principal li:hover > li a {
            background-color: #300;
        }

    </style>
    <div id="mini_menu" class="menu">
        <input type="hidden" id="efecto" value="corre"/>
        <img src="<?php echo base_url() ?>images/bajar_menu_dos.png" id="bajar_menu"
             style="float:left; margin-left:10px;"
             onclick="oculta('bajar_menu');
                         muestra('menu_oculto');"/>

        <div id="menu_oculto" class="menu_principal" style=" display:none;">
            <div id="contenedor_menu_principal" class="contenedor_menu_principal">
                <ul class="principal">
                    <li>
                        <a href="<?php echo base_url() ?>"> Inicio</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url() ?>venta"> Venta </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url() ?>cruza"> Cruza </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url() ?>adopcion"> Adopción </a>
                        <ul>
                            <li><a href="<?php echo base_url('asociacion') ?>">Asociaciones</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?php echo base_url('principal/tienda') ?>">Tienda</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('directorio') ?>">Directorio</a>
                    </li>
                    <?php if (is_logged()) { ?>
                        <li>
                            <a href="<?php echo base_url('principal/miPerfil') ?>">Mi Perfil</a>
                        </li>
                    <?php } ?>
                </ul>
                <?php if ($keyUser === FALSE || ($keyUser !== FALSE && $tipoUsuario !== 0)): ?>
                    <div class="close_sesion" style="text-align: right; padding-right: 5px;"><a
                            href="<?php echo base_url('sesion/logout/principal') ?>"><img style="height: 30px;"
                                                                                          src="<?php echo base_url() ?>images/logout.png"
                                                                                          alt="Cerrar sesión"/></a>
                    </div>
                <?php endif; ?>
            </div>
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

    <div id="contenedor_central_superior" class="contenedor_central_superior">

        <div id="banner_superior">
            <img src="<?php echo base_url() ?>images/logo_superior.png" width="348" height="93"
                 class="contenido_superior"/>

            <div class="slideshow">
                <?php $banner = $this->session->userdata('banner'); ?>
                <?php
                if (is_logged() && ($this->session->userdata('tipoUsuario') == 2 || $this->session->userdata('tipoUsuario') == 3)) {
                    if ($banner != null) {

                        foreach ($banner as $contenido) {
                            if ($this->session->userdata('zonaID') == $contenido->zonaID && $contenido->posicion == 1 && $contenido->seccionID == $seccion) {
                                ?>
                                <div class="item"><a href="<?php echo base_url() ?>#" target="_blank"><img
                                            src="<?php echo base_url() ?>images/<?php echo $contenido->imgbaner; ?>"
                                            alt="Model 2"></a>
                                </div>

                            <?php
                            }
                        }
                    }
                } else {

                    if ($banner !== null && !empty($banner)) {
                        foreach ($banner as $contenido) {
                            if ($contenido->zonaID == 9 && $contenido->posicion == 1 && $contenido->seccionID == $seccion) {
                                ?>
                                <div class="item"><a href="<?php echo base_url() ?>#" target="_blank"><img
                                            src="<?php echo base_url() ?>images/<?php echo $contenido->imgbaner; ?>"
                                            alt="Model 2"></a>
                                </div>
                            <?php
                            }
                        }
                    }
                }
                ?>
            </div>


        </div>
    </div>

    <div class="menu_principal menu" id="menu_principal">
        <div id="contenedor_menu_principal" class="contenedor_menu_principal">
            <ul class="principal">
                <li>
                    <a href="<?php echo base_url() ?>"> Inicio </a>
                </li>
                <li>
                    <a href="<?php echo base_url() ?>venta"> Venta </a>
                </li>
                <li>
                    <a href="<?php echo base_url() ?>cruza"> Cruza </a>
                </li>
                <li>
                    <a href="<?php echo base_url() ?>adopcion"> Adopción </a>
                    <ul style="display: block;">
                        <li><a href="<?php echo base_url('asociacion') ?>">Asociaciones</a></li>
                    </ul>
                </li>
                <li>
                    <a href="<?= base_url("principal/tienda") ?>">Tienda</a>
                </li>
                <li>
                    <a href="<?php echo base_url('directorio') ?>">Directorio</a>
                </li>
                <?php if (is_logged()) { ?>
                    <li>
                        <a href="<?php echo base_url('principal/miPerfil') ?>">Mi Perfil</a>
                    </li>
                <?php } ?>
                <?php if ($keyUser !== FALSE && $tipoUsuario !== 0): ?>
                    <div class="close_sesion" style="text-align: right; padding-right: 5px;"><a
                            href="<?php echo base_url('sesion/logout/principal') ?>"><img style="height: 30px;"
                                                                                          src="<?php echo base_url() ?>images/logout.png"
                                                                                          alt="Cerrar sesión"/></a>
                    </div>
                <?php endif; ?>
            </ul>
        </div>
    </div>
<?php else: ?>
    <div class="encabezado">
        <img src="/images/logo_admin.png" width="258" height="88"/>

        <div class="menu_admin">
            <ul class="el_menu">
                <li>
                    Pantallas
                    <ul>
                        <li>
                            <a href="<?php echo base_url(); ?>"> <img src="/images/ciculo.png"/> Inicio</a>
                        </li>
                        <li>
                            <a href="#"> <img src="/images/ciculo.png"/> Venta</a>
                        </li>
                        <li>
                            <a href="#"> <img src="/images/ciculo.png"/> Cruza</a>
                        </li>
                        <li>
                            <a href="#"> <img src="/images/ciculo.png"/> Directorio</a>
                        </li>
                        <li>
                            <a href="#"> <img src="/images/ciculo.png"/> Prefil de usuario</a>
                        </li>
                        <li>
                            <a href="#"> <img src="/images/ciculo.png"/> Adopción</a>
                        </li>
                        <li>
                            <a href="#"> <img src="/images/ciculo.png"/> Perros Perdidos</a>
                        </li>
                        <li>
                            <a href="#"> <img src="/images/ciculo.png"/> La raza del mes</a>
                        </li>
                        <li>
                            <a href="#"> <img src="/images/ciculo.png"/> Evento del mes</a>
                        </li>
                        <li>
                            <a href="#"> <img src="/images/ciculo.png"/> Datos curiosos</a>
                        </li>
                        <li>
                            <a href="#"> <img src="/images/ciculo.png"/> Asociaciones Protectoras</a>
                        </li>
                        <li>
                            <a href="#"> <img src="/images/ciculo.png"/> ¿Quiénes somos?</a>
                        </li>
                        <li>
                            <a href="#"> <img src="/images/ciculo.png"/> Tutorial</a>
                        </li>
                        <li>
                            <a href="#"> <img src="/images/ciculo.png"/> Publicidad</a>
                        </li>
                        <li>
                            <a href="#"> <img src="/images/ciculo.png"/> Preguntas frecuentes</a>
                        </li>
                    </ul>
                </li>
                <li>
                    Usuarios
                    <ul>
                        <li>
                            <a href="#"> <img src="/images/ciculo.png"/> Altas</a>
                        </li>
                        <li>
                            <a href="#"> <img src="/images/ciculo.png"/> Bajas</a>
                        </li>
                        <li>
                            <a href="#"> <img src="/images/ciculo.png"/> Consultas</a>
                        </li>
                    </ul>
                </li>
                <li>
                    Mensajes
                    <ul>
                        <li>
                            <a href="#"> <img src="/images/ciculo.png"/> Redactar mensaje</a>
                        </li>
                        <li>
                            <a href="#"> <img src="/images/ciculo.png"/> Enviar mensajes</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="<?php echo base_url('admin/principal/anuncios') ?>">Anuncios</a>
                </li>
                <li>
                    <a href="<?php echo base_url('admin/tiendaAdmin') ?>">Tienda</a>
                </li>
            </ul>
            <?php if ($keyUser === FALSE || ($keyUser !== FALSE && $tipoUsuario !== 0)): ?>
                <div class="close_sesion" style="text-align: right; padding-right: 5px;"><a
                        href="<?php echo base_url('sesion/logout/principal') ?>"><img style="height: 30px;"
                                                                                      src="<?php echo base_url() ?>images/logout.png"
                                                                                      alt="Cerrar sesión"/></a></div>
            <?php endif; ?>
        </div>
    </div>
<?php
endif;
?>
