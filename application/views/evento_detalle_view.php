<!--<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es-419">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Eventos-Quierounperro.com</title>
<link rel="shortcut icon" href="<?php echo base_url() ?>images/ico.ico" />  
<link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>css/reset.css" media="screen"></link>
 <link rel="stylesheet" href="<?php echo base_url() ?>css/jPages.css">
<link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>css/general.css" media="screen"></link> <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>css/venta.css" media="screen"></link>

<?php //$this->load->view('general/LoginFiles');?>
   <script src="<?php echo base_url() ?>js/jquery-1.10.2.js"></script>
     <script src="<?php echo base_url() ?>js/jPages.js"></script>
     <script src="<?php echo base_url() ?>js/funciones_venta.js"></script>
     <script src="<?php echo base_url() ?>js/funciones_evento.js"></script>
   <script src="<?php echo base_url() ?>js/jquery-ui.js"></script>
   <script type="text/javascript" src="<?php echo base_url() ?>js/jquery.cycle.all.js"></script>
   <script src="<?php echo base_url() ?>js/funciones_.js" type="text/javascript"></script>
       <script type="text/javascript" src="<?php echo base_url() ?>js/jquery.customSelect.js"></script>
     <script type="text/javascript" src="<?php echo base_url() ?>js/funcion_select.js"></script>-->
<?php $this->load->view('general/LoginFiles');?>
<?php
$this->load->view('general/general_header_view', array('title' => 'Evento del Mes',
  'links'                                                      => array('venta'), 'scripts' => array('funciones_evento')))
  ?>
     <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>css/directorio.css" media="screen"></link> <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>css/eventos.css" media="screen"></link>

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
										   muestra('contenedor_correcto');	
										   oculta('contenedor_publicar_anuncio');		   
										} else {
											muestra('contenedor_error');
										}
                                    }
                                });
     });
	 
	

});

        


    </script>  


</head>

<body>


<div id="contenedor_publicar_anuncio" class="contenedor_publicar_anuncio" style=" display:none;">

<!-- Inicio contenedor pap publicar anuncio aunucio !--> 
<div id="publicar_anuncio" class="pubicar_anuncio">



<!-- Inicio Paso UNO -->
<div id="paso_uno">

<div class="crerar_publicar_anuncio">
<img src="<?php echo base_url() ?>images/cerrar.png" onclick="oculta('contenedor_publicar_anuncio');"/>

 </div>
 </br>
<div class="descipcion_pasos">
<div class="titulo_de_pasos"> PUBLICAR   EVENTO </div>
<div class="instrucciones_pasos"> ¿Quieres anunciar tu evento? ¡Cont&aacute;ctanos! </div>
<div class="contenido_indicacion">
<form  method="post" id="enviarMail">
<table width="616" style="margin-left: 31px;
margin-top: 30px;">
<tr> 
<td width="260" rowspan="4">
<img src="<?php echo base_url() ?>images/pero_paso_uno.png" class="perro_paso_uno"/>

</td>
<td width="147">
<p>Nombre:</p> <br/> </td>  <td width="193"><input name="nombre" type="text" id="nombre"/> </td>
</tr>
<tr>
<td><p> E-mail:</p> <br/></td> <td> <input name="correo" type="text" id="correo"/> </td>
</tr>
<tr>
<td><p> Comentarios:</p> <br/></td> <td><textarea name="comentarios" cols="30" rows="10" id="comentarios"> </textarea> </td>
</tr>
</table>


</br>
<ul class="morado_directorio">
<li onclick="muestra('paso_dos'); oculta('paso_uno');">
<input type="submit" value="Enviar" />
</li>
</ul> 

</form>
</div>

</div>

</div>
<!-- FIN anuncio UNO -->



</div>
</div>
</div> 
<!-- Fin del contenedor publicar anucio fondo negro -->

<?php $this->load->view('general/menu_view')?>

<div class="titulo_seccion">
<img src="<?php echo base_url() ?>images/calendario.png"/> EVENTOS DEL MES

</div>
<div class="contenedor_buscador">

</div>

<div id="contenedor_central">
<?php $this->load->view('general/contTest');?>

<div class="contenedor_central" style="margin-bottom:45px;">
<?php if($contenidos != null){
	foreach($contenidos as $cv){
		if($cv->contenidoID == $ID){?>
<div class="contenedor_de_anuncio_eveto"> 
<div class="contenedor_fecha_evento_detalle">

<p class="dia"><?=$cv->fecha?></p>

 </div>
 <?php if($fotocontenido != null){
	 	foreach($fotocontenido as $p){
			if($p->contenidoID == $cv->contenidoID){?>
 <img src="<?php echo base_url()?>images/eventos/<?=$p->foto?>" width="238" height="374"/>
 <?php }
	}
}?>
</div>
<?php }
	}
}?>
<div class="contender_texto_descripcion">

</div>
  <div class="contenedor_eventos_proxsimos"> 
  <?php if($contenidos != null){
	foreach($contenidos as $cv){
		if($cv->contenidoID != $ID){?>

     <div class="evento_proximo" style="font-size:10px;">
     <div class="contenedor_evento_proxi_mini">
     <div class="fecha_mini"> 
     <p class="dia_mini"><?=$cv->fecha?></p>
     </div>
      <img src="<?php echo base_url()?>images/cale_event.png" width="83"  height="115"/>  </div>
     <div class="contenedor_nombre_evento_mini"> 
     <?=strtoupper($cv->nombre)?><br />
     <strong>Fecha:</strong> <?=$cv->fecha?><br />
     <strong>Lugar:</strong> <?=$cv->lugar?>
      </div> <div class="ver_mas_mini" onclick="window.location.href = '<?php echo base_url()?>evento/detalle/<?=$cv->contenidoID?>'"> Ver más... </div>
       </div>
       </br>
       <?php }
	   }
	   }?>
	 </div>
<?php if($contenidos != null){
	foreach($contenidos as $cv){
		if($cv->contenidoID == $ID){?>
<div class="contenedor_texto_inferior"> 
<?=$cv->texto?>
</br>
</br>
<p id="fecha_evento"> <div class="recuadro_rosa"> </div><strong>  Fecha:</strong> <?=$cv->fecha?> </p>
</br>
<p id="hora_evento"> <div class="recuadro_rosa"> </div><strong>  Hora:</strong> <?=$cv->horario?></p>
</br>
<p id="lugar_evento"> <div class="recuadro_rosa"> </div><strong>  Lugar:</strong> <?=$cv->lugar?></p>
</br>
<p id="domicilio_evento"> <div class="recuadro_rosa"> </div><strong>  Domicilio:</strong> <?=$cv->domicilio?></p>

</div>
   
 
     
     
	     <?php }
   }
  }?> 
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
  <p style="display:block;overflow:hidden;"><br><br><br></p>
<div class="division_menu_inferior" style="display:block;overflow:hidden;"></div>
<?php $this->load->view('general/footer_view');?>
</body>
</html>