<?php $this->load->view('general/LoginFiles');?>
<?php
$this->load->view('general/general_header_view', array('title' => 'Evento del Mes',
  'links'                                                      => array('venta'), 'scripts' => array('funciones_evento')))
  ?>
  <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>css/directorio.css" media="screen"></link> <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>css/eventos.css" media="screen"></link>
</head>

<body>
<div class="contenedor_registro" id="contenedor_correctoM" style="display:none;"> <!-- Contenedor negro reistro-->
    <div class="cerrar_registro"><img src="<?php echo base_url() ?>images/cerrar.png"
                                      onclick="oculta('contenedor_correctoM');"/></div>

    <div class="registro_normal"> <!-- Contenedor morado registro -->

        <div class="titulo_registro"> CORRECTO</div>
        <br>
        <div class="imagen_confirmacion">
            <img src="<?php echo base_url() ?>images/palomita.png"/>
        </div>
        <div class="contenido_confirmacion">
            <strong> Correcto </strong>
            <br><br>
            <div> Se envió correctamente tu correo</div>
            <div id="confirm">
            </div>

        </div>
    </div>
    <br>
</div>
<div class="contenedor_registro" id="contenedor_errorM" style="display:none;"> <!-- Contenedor negro reistro-->
    <div class="cerrar_registro"><img src="<?php echo base_url() ?>images/cerrar.png"
                                      onclick="oculta('contenedor_errorM');"/></div>
    <div class="registro_normal">
        <div class="titulo_registro"> ERROR</div><br>
        <div class="imagen_confirmacion">
            <img src="<?php echo base_url() ?>images/tache.png"/>
        </div>
        <div class="contenido_confirmacion">
            <strong> Ha ocurrido un error intenta nuevamente</strong>
            <br>
            <div id="specificError"></div>
        </div>
    </div><br>
</div>
<div id="contenedor_publicar_anuncio" class="contenedor_publicar_anuncio" style=" display:none;">
<div id="publicar_anuncio" class="pubicar_anuncio">
<div id="paso_uno">
<div class="crerar_publicar_anuncio">
<img src="<?php echo base_url() ?>images/cerrar.png" onclick="oculta('contenedor_publicar_anuncio');"/>
</div><br>
<div class="descipcion_pasos">
<div class="titulo_de_pasos"> PUBLICAR   EVENTO </div>
<div class="instrucciones_pasos"> ¿Quieres anunciar tu evento? ¡Cont&aacute;ctanos! </div>
<div class="contenido_indicacion">
<form  method="post" id="enviarMail">
<table width="616" style="margin-left: 31px; margin-top: 30px;">
    <tr> 
<td width="260" rowspan="4">
<img src="<?php echo base_url() ?>images/pero_paso_uno.png" class="perro_paso_uno"/>

</td>
<td width="147">
<p>Nombre:</p> <br> </td>  <td width="193"><input name="nombre" type="text" id="nombre"/> </td>
</tr>
<tr>
<td><p> E-mail:</p> <br></td> <td> <input name="correo" type="text" id="correo"/> </td>
</tr>
<tr>
<td><p> Comentarios:</p> <br></td> <td><textarea name="comentarios" cols="30" rows="10" id="comentarios"> </textarea> </td>
</tr>
</table>


<br>
<ul class="morado_directorio">
<li onclick="muestra('paso_dos'); oculta('paso_uno');">
<input type="submit" value="Enviar" />
</li>
</ul> 
</form>
</div>
</div>
</div>
</div>
</div>
</div> 
<?php $this->load->view('general/menu_view')?>
<div class="titulo_seccion">
<img src="<?php echo base_url() ?>images/calendario.png"/> EVENTOS DEL MES
</div>
<div class="contenedor_buscador"></div>
<div id="contenedor_central">
<?php $this->load->view('general/contTest');?>
<div class="contenedor_central" style="margin-bottom:45px;"><br>
    <ul id="itemContainer_evento" style="min-height:100px;">
      <?php if($contenidos != null){
		  		foreach ($contenidos as $ev){ ?>
      <div class="contenedor_evento" >
      <div class="contenedor_imagen_evento">
      <div class="contenedor_fecha_evento"> 
      <p class="dia"><?=$ev->fecha?></p>
      </div>
      <img src="<?php echo base_url()?>images/cale_event.png" />
       </div>
       <div class="contenido_evento">
       <p class="titulo_evento_mes"><?=strtoupper($ev->nombre)?></p><br><br>
       <p><strong>FECHA:</strong> <?=strtoupper($ev->fecha)?></p>
       <p> <strong>HORA:</strong> <?=strtoupper($ev->horario)?></p>
       <p> <strong>LUGAR:</strong>  <?=strtoupper($ev->lugar)?></p>
   </div>
        <ul class="ver_mas_evento"><li onclick="window.location.href = '<?php echo base_url()?>evento/detalle/<?=$ev->contenidoID?>'"> Ver más... &nbsp;</li> </ul>
      </div>
      <?php } }?>
   </ul><br><br>
      <div style="text-align:center;">
        <div class="holder">  </div>
      </div>
      </div>
	  <div class="seccion_derecha_paquetes">
<ul class="aqui_crear_anuncio_eventos">
<li onclick="muestra('contenedor_publicar_anuncio');">
</li>
</ul>
</div>
</div>
<div class="slideshow_tres" >
<?php $banner = $this->session->userdata('banner'); ?>
                <?php
                if (is_logged() && ($this->session->userdata('tipoUsuario') == 2 || $this->session->userdata('tipoUsuario') == 3)) {
                    if ($banner != null) {
                       foreach ($banner as $contenido) {
                            if ($this->session->userdata('zonaID') == $contenido->zonaID && $contenido->posicion == 3 && $contenido->seccionID == $seccion) {
                                ?>
                                <img src="<?php echo base_url()?>images/<?php echo $contenido->imgbaner; ?>" width="638" height="93"/>
                            <?php
                            }
                        }
                    }
                } else {
                    if ($banner !== null && !empty($banner)) {
                        foreach ($banner as $contenido) {
                            if ($contenido->zonaID == 9 && $contenido->posicion == 3 && $contenido->seccionID == $seccion) {
                                ?>
                                <img src="<?php echo base_url()?>images/<?php echo $contenido->imgbaner; ?>" width="638" height="93"/>
                            <?php
                            }
                        }
                    }
                }
                ?>
	</div> 
<div class="division_menu_inferior" style="display:block;overflow:hidden;"></div>
<?php $this->load->view('general/footer_view');?>
<script>
jQuery(document).ready(function(){
$("#enviarMail").submit(function(e) {
    e.preventDefault();
    var form = $(this);
    $.ajax({
        url: '<?=base_url()?>evento/publicarEvento',
        data: $('#enviarMail').serialize(),
        dataType: 'JSON',
        type: 'post',
        success: function(data) {
            if(data.response = true){
               //alert('Mensaje Enviado');
               muestra('contenedor_correctoM');
               oculta('contenedor_publicar_anuncio');              
            } else {
                muestra('contenedor_errorM');
            }
        }
    });
    });
});
</script>
</body>
</html>