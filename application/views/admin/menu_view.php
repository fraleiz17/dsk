<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Administrador-Quierounperro.com</title>
<link rel="shortcut icon" href="<?php echo base_url()?>images/ico.ico" />  
<link type="text/css" rel="stylesheet" href="<?php echo base_url()?>css/reset.css" media="screen"></link>
<link type="text/css" rel="stylesheet" href="<?php echo base_url()?>css/administrador.css" media="screen"></link>
<link type="text/css" rel="stylesheet" href="<?php echo base_url()?>css/general.css" media="screen"></link>

<script type="text/javascript" src="<?php echo base_url()?>js/jquery-1.8.2.min.js"></script>
<script src="<?php echo base_url() ?>js/jquery-ui.js"></script>
<script src="<?php echo base_url() ?>js/jPages.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>js/jquery.cycle.all.js"></script>


<script>

 function oculta(id){
         var elDiv = document.getElementById(id); //se define la variable "elDiv" igual a nuestro div
         elDiv.style.display='none'; //damos un atributo display:none que oculta el div     
		
       }
  
   function muestra(id){
        var elDiv = document.getElementById(id); //se define la variable "elDiv" igual a nuestro div
        elDiv.style.display='block';//damos un atributo display:block que  el div     
       }

jQuery(document).ready(function(){
	var zona = <?php if(isset($zonaT)){ echo $zonaT;} else {echo $zonaT = 9;}?>;
	var seccion = <?php if(isset($seccion)){ echo $seccion;} else {echo $seccion = 1;}?>;
	
	$(".row").hide();
	$(".zona"+zona+seccion).show();
	if(seccion == 1){
				 $(".superior").fadeIn();
				 $(".medio").fadeIn();
				 $(".medioContenido").fadeOut();
				 $(".inferior").fadeIn();
			 } 
			 
	
	 
	 $(".addContent").click(function() {
		 	
             var posicion = $(this).attr('data-rel');
			 $("#posicion").val(posicion);
             var uno = $("#posicion").val(posicion);
             
			 muestra('contenedor_modificaciones');
             //console.log(uno);
     });
	 
	 $(".addContentText").click(function() {
		 	
            var zonaN = $("#zonaIDR").val();
             var seccionN = $("#numeroSeccionR").val();
			  $("#zonaContentN").val(zonaN);
			  $("#seccionContentN").val(seccionN);
			  
             
			 muestra('contenedor_texto_apoyo');
             //console.log(uno);
     });
	 
	 $(".deleteContent").click(function() {
		 	
             var bannerIDel = $(this).attr('data-rel');
			 var posicionDel = $(this).attr('id');
             var zonaDel = $("#zonaIDR").val();
             var seccionDel = $("#numeroSeccionR").val();
			  $("#zonaContentDel").val(zonaDel);
			  $("#seccionContentDel").val(seccionDel);
			  $("#posicionContentDel").val(posicionDel);
			  $("#bannerIDContentDel").val(bannerIDel);
			  muestra('contenedor_delete');
              console.log(bannerIDel,zonaDel, seccionDel,posicionDel);
     });
	 
	 $(".deleteContentText").click(function() {
		 	
             var bannerIDT = $(this).attr('data-rel');
			 var posicionT = $(this).attr('id');
			 var tipo = $(this).attr('name');
			 
			 if(tipo == 1){
				 $('#deleteTextForm').attr('action', '<?=base_url()?>admin/principal/deleteBannerText');
		     } else {
				 $('#deleteTextForm').attr('action', '<?=base_url()?>admin/principal/deleteTextApoyo'); 
			 }
			 
             var zonaT = $("#zonaIDR").val();
             var seccionT = $("#numeroSeccionR").val();
			  $("#zonaContentT").val(zonaT);
			  $("#seccionContentT").val(seccionT);
			  $("#posicionContentT").val(posicionT);
			  $("#bannerIDContentT").val(bannerIDT);
			  muestra('contenedor_delete_text');
              console.log(bannerID,zonaT, seccionT,posicionT);
     });
	 
	  $(".updateText").click(function() {
		 	
             var bannerID = $(this).attr('data-rel');
			 var posicionD = $(this).attr('id');
             var zonaD = $("#zonaIDR").val();
             var seccionD = $("#numeroSeccionR").val();
			  $("#zonaContent").val(zonaD);
			  $("#seccionContent").val(seccionD);
			  $("#posicionContent").val(posicionD);
			  $("#bannerIDContent").val(bannerID);
			  muestra('contenedor_modificaciones_texto');
              console.log(bannerID,zonaD, seccionD,posicionD);
     });
	 

     $("#genero").change(
                function(){
					$("#personalizado").remove();
                    var thisValue = $(this).val();
                    var nombreZona = $('#genero option:selected').html();
                    //console.log(thisValue, nombreZona);
                    $("#nombreZona").detach();
             		$('<label id="nombreZona">'+nombreZona+'</label>').appendTo('#zonaNombre');
                    $("#zonaIDR").val(thisValue);
					numeroZona = thisValue;
					numeroSeccion = $("#numeroSeccionR").val();
					$(".row").hide();
					$(".zona"+numeroZona+numeroSeccion).show();
					console.log(".zona"+numeroZona+numeroSeccion);
    }); 
	
	
	
	
	 $("#saveBanner").click(function() {
              zona = $("#zonaIDR").val();
              uno = $("#numeroSeccionR").val();
             var dos = $("#nombreSeccionR").val();
                         

             //console.log(uno, dos, zona);
			 
			/* $.ajax({
                url:'<?=base_url()?>admin/principal/uploadBanner',
                type:'POST',
                dataType: 'json',
                data: $("#addBanner").serialize(),
                success: function(data){
                  
                }
    		});*/
     });  
	 
	$(".filtro").click(
	function(){
		$("#personalizado").remove();		
		goToSearch();		        
	});


	 
});

function goToSearch(){
	
	$.ajax({
		url     : '<?=base_url()?>admin/principal/tablasDinamicas',
		type    : 'POST',
		data    : $('#addBanner').serialize(),
		success : function(data){	
			$(".personalizado").remove();		
			$('#tablasDinamicasA').html(data);
		}                                       
	});
}
</script>
</head>
<body>

<!-- ---------------------------------------------------- contenedor_modificaciones --------------- -->

  
 


  

<!-- ---------------------------------------------------- encabezado --------------- -->
<div class="encabezado">
<img  src="<?php echo base_url()?>images/logo_admin.png" width="258" height="88"  />

<div class="menu_admin">
<ul class="el_menu">
<li>
Pantallas
<ul>
<li>
<a href="<?php echo base_url()?>admin/principal/getPantalla/6/9" id="ADOPCIÓN" name="6" class="seccion filtro"> <img src="<?php echo base_url()?>images/ciculo.png" /> Adopción</a>
</li>
<li>
<a href="<?php echo base_url()?>admin/principal/getPantalla/11/9" id="ASOCIACIONES P." name="11" class="seccion filtro"> <img src="<?php echo base_url()?>images/ciculo.png" /> Asociaciones Protectoras</a>
</li>
<!-- <li>
<a href="<?php echo base_url()?>admin/principal/getPantalla/3/9" id="CRUZA" name="3" class="seccion filtro"> <img src="<?php echo base_url()?>images/ciculo.png" /> Cruza</a>
</li> -->
<li>
<a href="<?php echo base_url()?>admin/principal/getDatosCuriosos/10/9" id="DATOS CURIOSOS" name="10" class="seccion filtro"> <img src="<?php echo base_url()?>images/ciculo.png" /> Datos curiosos</a>
</li>
<li>
<a href="<?php echo base_url()?>admin/principal/getPantalla/4/9" id="DIRECTORIO" name="4" class="seccion filtro"> <img src="<?php echo base_url()?>images/ciculo.png" /> Directorio</a>
</li>
<li>
<a href="<?php echo base_url()?>admin/principal/getEventoMes/9/9" id="EVENTO DEL MES" name="9" class="seccion filtro"> <img src="<?php echo base_url()?>images/ciculo.png" /> Evento del mes</a>
</li>
<li>
<a href="<?php echo base_url()?>admin/principal/getPantalla/1/9" id="INICIO" name="1" class="seccion filtro"> <img src="<?php echo base_url()?>images/ciculo.png" /> Inicio</a>
</li>
<li>
<a href="<?php echo base_url()?>admin/principal/getRazaMes/8/9" id="RAZA DEL MES" name="8" class="seccion filtro"> <img src="<?php echo base_url()?>images/ciculo.png" /> La raza del mes</a>
</li>
<li>
<a href="<?php echo base_url()?>admin/principal/getPantalla/7/9" id="PERROS PERDIDOS" name="7" class="seccion filtro"> <img src="<?php echo base_url()?>images/ciculo.png" /> Perros Perdidos</a>
</li>
<li>
<a href="<?php echo base_url()?>admin/principal/getPantalla/5/9" id="PERFIL DE USUARIO" name="5" class="seccion filtro"> <img src="<?php echo base_url()?>images/ciculo.png" /> Prefil de usuario</a>
</li>
<li>
<a href="<?php echo base_url()?>admin/principal/getPantalla/17/9" id="PUBLICIDAD LATERAL" name="16" class="seccion filtro"> <img src="<?php echo base_url()?>images/ciculo.png" /> Publicidad Lateral</a>
</li>
<li>
<a href="<?php echo base_url()?>admin/principal/getPantalla/12/9" id="¿QUIÉNES SOMOS?" name="12" class="seccion filtro"> <img src="<?php echo base_url()?>images/ciculo.png" /> ¿Quiénes somos?</a>
</li>
<li>
<a href="<?php echo base_url()?>admin/principal/getPantalla/16/9" id="TIENDA" name="16" class="seccion filtro"> <img src="<?php echo base_url()?>images/ciculo.png" /> Tienda</a>
</li>
<li>
<a href="<?php echo base_url()?>admin/principal/getPantalla/13/9" id="TUTORIAL" name="13" class="seccion filtro"> <img src="<?php echo base_url()?>images/ciculo.png" /> Tutorial</a>
</li>
<li>
<a href="<?php echo base_url()?>admin/principal/getPantalla/2/9" id="VENTA" name="2" class="seccion filtro"> <img src="<?php echo base_url()?>images/ciculo.png" /> Venta</a>
</li>
<!--<li>
<a href="<?php echo base_url()?>admin/principal/getPantalla/14/9" id="PUBLICIDAD" name="14" class="seccion filtro"> <img src="<?php echo base_url()?>images/ciculo.png" /> Publicidad</a>
</li>-->
<li>
<a href="<?php echo base_url()?>admin/principal/getPantalla/15/9" id="PREGUNTAS F." name="15" class="seccion filtro"> <img src="<?php echo base_url()?>images/ciculo.png" /> Preguntas frecuentes</a>
</li>


</ul>
</li>
<li>
<a href="<?php echo base_url()?>admin/principal/getUsuarios" id="usuarios" name="usuarios" class="seccion filtro" style="text-decoration:none; color:#FFF;">Usuarios</a>
<!--<ul>
<li>
<a href="<?php echo base_url()?>#"> <img src="<?php echo base_url()?>images/ciculo.png" /> Altas</a>
</li>
<li>
<a href="<?php echo base_url()?>#"> <img src="<?php echo base_url()?>images/ciculo.png" /> Bajas</a>
</li>
<li>
<a href="<?php echo base_url()?>#"> <img src="<?php echo base_url()?>images/ciculo.png" /> Consultas</a>
</li>
</ul>-->
</li>
<li>
<a href="<?php echo base_url()?>admin/principal/getMensajes" id="mensajes" name="mensajes" class="seccion filtro" style="text-decoration:none; color:#FFF;">Mensajes</a>
<!--<ul>
<li>
<a href="<?php echo base_url()?>#"> <img src="<?php echo base_url()?>images/ciculo.png" /> Redactar mensaje</a>
</li>
<li>
<a href="<?php echo base_url()?>#"> <img src="<?php echo base_url()?>images/ciculo.png" /> Enviar mensajes</a>
</li>
</ul>-->
</li>
<li><a href="<?php echo base_url()?>admin/principal/anuncios" style="color:#FFF;text-decoration:none;">Anuncios</a></li>
<li>
	Tienda
	<ul>
		<li><a href="<?php echo base_url()?>admin/tiendaAdmin" style="color:#FFF;text-decoration:none;">Productos</a></li>
		<li><a href="<?php echo base_url()?>admin/tiendaAdmin/gastosEnvio" style="color:#FFF;text-decoration:none;">Gastos de Env&iacute;o</a></li>
	</ul>
</li>
<li><a href="<?php echo base_url()?>admin/paquetes" style="color:#FFF;text-decoration:none;">Paquetes</a></li>


<?php  ?>
                    <div class="close_sesion" style="text-align: right; padding-right: 5px;overflow:hidden;display:block;"><a
                            href="<?php echo base_url('sesion/logout/principal') ?>"><img style="height: 30px;"
                                                                                          src="<?php echo base_url() ?>images/logout_short.png"
                                                                                          alt="Cerrar sesión"/></a>
                    </div>
                <?php  ?>
</ul>
</div>

</div> <!-- fin wncabezado -->
