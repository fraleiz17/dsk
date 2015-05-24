<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Perdidos-Quierounperro.com</title>

<link rel="shortcut icon" href="<?=base_url()?>images/ico.ico" />  
<link type="text/css" rel="stylesheet" href="<?=base_url()?>css/reset.css" media="screen"></link>
<link rel="stylesheet" href="<?=base_url()?>css/jPages.css">
<link type="text/css" rel="stylesheet" href="<?=base_url()?>css/general.css" media="screen"></link> <link type="text/css" rel="stylesheet" href="<?=base_url()?>css/venta.css" media="screen"></link>
<link type="text/css" rel="stylesheet" href="<?=base_url()?>css/perdidos.css" media="screen"></link>
<?php $this->load->view('general/LoginFiles');?>
<script src="<?=base_url()?>js/jquery-1.10.2.js"></script>
<script src="<?=base_url()?>js/jPages.js"></script>
<script src="<?=base_url()?>js/funciones_venta.js"></script>
<script src="<?=base_url()?>js/jquery-ui.js"></script>
<script type="text/javascript" src="<?=base_url()?>js/jquery.cycle.all.js"></script>
<script src="<?=base_url()?>js/funciones_.js" type="text/javascript"></script>
<script type="text/javascript" src="<?=base_url()?>js/funcion_select.js"></script>
<script type="text/javascript" src="<?=base_url()?>js/jquery.customSelect.js"></script>
<script>
  function buscar_imagen(id){
             id_anuncio="id_anuncio="+id;

            $.ajax({
                url: '<?php echo base_url('venta/fotos') ?>',
                data: id_anuncio,
                dataType: 'json',
                type: 'post',
                 success: function(result)
                { 
				var data = result.data;
				 if (result.count < 1) {
                    
                    }
                    for (var i = 0; i < result.count; i++)
                    {
						foto=(data[i].foto);
						
						}
					
				$("#contener_foto"+id).append('<img src="' + foto + '" width="auto" height="100%"/>');
				
				}
                 })
}
  </script>

</head>

<body>


<?php if ($this->session->userdata('idUsuario') !== FALSE): ?>
<div class="contenedor_contactar" id="contenedor_contactar" style=" display:none;">
    <div class="contenedor_cerrar_contactar">
        <img src="<?php echo base_url()?>images/cerrar_anuncio_gris.png" onclick="oculta('contenedor_contactar');"/>
    </div>
    <div class="contactar_al_aunuciante">
        <font class="titulo_anuncio_publicado"> CONTACTA AL ANUNCIANTE </font>
        <div class="datos_anunciante">
   
</div>
<font class="titulo_anuncio_publicado"> PROPORCIONA TU INFORMACIÓN </font>
</br>
</br>
<form id="contacto_form">
    <input type="text" class="formu_contacto" id="nombre_contacto"
    value="<?php echo $this->session->userdata('nombre')?>" size="44"/>
    <input type="text" class="formu_contacto" id="mail_contacto"
    value="<?php echo $this->session->userdata('correo')?>" size="44"/>
    <input type="text" class="formu_contacto" id="asunto_contacto"
    onfocus="clear_textbox('asunto_contacto', 'Asunto')" placeholder="Asunto" size="44"/>
    <textarea cols="50" style = "width:334px;" onfocus="clear_textbox('comentarios_contacto', 'Comentarios')" id="comentarios_contacto" name="comentarios_contacto" 
    class="formu_contacto" rows="5">Comentarios</textarea>
</br>
</br>
<span class="info"></span>
<ul class="boton_naranja_tres">
    <li>
        <input type="submit" value="Enviar"/>
    </li>
</ul>
</form>

</div>


</div>
<?php endif; ?>

<div class="contenedor_contactar" id="contenedor_denunciar" style=" display:none;">
    <div class="contenedor_cerrar_contactar">
        <img src="<?php echo base_url()?>images/cerrar_anuncio_gris.png" onclick="oculta('contenedor_denunciar');"/>
    </div>
    <div class="contactar_al_aunuciante" style="height:346px;">
    <font class="titulo_anuncio_publicado"> DENUNCIA DE CONTENIDO </font>
    </br>
    </br>    
<font class=""><strong>Todas las denuncias son an&oacute;nimas.</strong><br>
        Selecciona la razón por la cual deseas denunciar este anuncio y/o anunciante:</font>
</br>
</br>
<form id="denuncia_form">
    <input type="hidden" class="formu_contacto" name="nombre_denuncia" id="nombre_denuncia"
    value="<?php echo $this->session->userdata('nombre')?>" size="44"/>
    <input type="hidden" class="formu_contacto" name="mail_denuncia" id="mail_denuncia"
    value="<?php echo $this->session->userdata('correo')?>" size="44"/>
    <input type="hidden" class="formu_contacto" name="asunto_denuncia" id="asunto_denuncia"
    onfocus="clear_textbox('asunto_denuncia', 'Asunto')" value="Asunto" size="44"/>
    <!-- <textarea cols="50" onfocus="clear_textbox('comentarios_denuncia', 'Comentarios')" name="comentarios_denuncia" id="comentarios_denuncia"
    class="formu_contacto" rows="5">Comentarios</textarea> <?=base_url()?>content/terminos_y_condiciones.pdf -->
    <input type="radio" name="comentarios_denuncia" id="comentarios_denuncia3" checked="checked" value="Informaci&oacute;n de anuncio falsa"><label>Informaci&oacute;n de anuncio falsa</label></br>
    <input type="radio" name="comentarios_denuncia" id="comentarios_denuncia1" value="Contenido Violento"><label>Contenido Violento</label></br>
    <input type="radio" name="comentarios_denuncia" id="comentarios_denuncia2" value="Fotos Inapropiadas"><label>Fotos Inapropiadas</label></br>
    <input type="radio" name="comentarios_denuncia" id="comentarios_denuncia4" value="Fraude"><label>Fraude</label></br>
    <input type="radio" name="comentarios_denuncia" id="comentarios_denuncia5" value="Datos de contacto falsos"><label>Datos de contacto falsos</label></br>
    <input type="radio" name="comentarios_denuncia" id="comentarios_denuncia6" value="Otro"><label>Otro</label></br>
</br>

<label><a href="<?=base_url()?>content/terminos_y_condiciones.pdf" target="_blank" style="text-decoration:none;">T&eacute;rminos y Condiciones de Uso</a></label></br>
</br>
</br>
<ul class="boton_naranja_tres">
    <li>
        <input type="submit" value="Enviar"/>
    </li>
</ul>
<span class="info"></span>
</form>

</div>


</div>


<div class="contenedor_anuncio_detalle" id="contenedor_anuncio_detalle" style=" display:none;">
<div class="contenedor_cerrar_anuncio">
<img src="<?php echo base_url()?>images/cerrar_anuncio.png" onclick="oculta('contenedor_anuncio_detalle');oculta('video');"/>
</div>
 <div class="leer_anuncio">


        <div class="contenedor_galeria">
            <div id="slideshow_publicar_anuncio_previo" class="picse">

            </div>

        </div>
        <div class="datos_general">

            <div class="titulo_anuncio_publicado">
             
        </div>


</br>
</br>
<ul class="boton_naranja">
    <li onclick="buscar_anunciante();">
        Contactar al anunciante
    </li>
</ul>
</br>
<ul class="boton_gris">
    <li>
        <img src="<?php echo base_url()?>images/favorito.png"/>Agregar a Favoritos
    </li>
</ul>
<span id="info_fav"></span>

</div>
</br>
<div class="contenedor_del_detalle">
    <div class="titulo_anuncio_publicado">
        MÁS DETALLES
    </div>

    <div class="descripcion_del_anuncio">


    </div>
</br>
<ul class="boton_naranja_dos">
    <li id="ver_video" onclick="muestra('video');">
        Ver video
    </li>
</ul>

<div id="video" class="desplegar_detalles" style="display:none;">
</br>
<div class="titulo_anuncio_publicado">
    VIDEO
</div>
<div id="you_tube" class="youtube_video"></div>



</div>


<ul class="boton_rojo_dos">
    <li class="btn_den">
        <img src="<?php echo base_url()?>images/alert.png"/>
        Denunciar Anuncio
    </li>
</ul>

<div class="consejos_advertencias">

    - QuierounPerro.com te invita a que antes de comprar pienses en adoptar, ya que hoy en día hay millones
    de perros sin hogar que deben ser sacrificados.
</br>
- Tener un perro conlleva una serie de responsabilidades, cuidados y atenciones que debes considerar
antes de comprar uno.
</br>
- Infórmate de los cuidados especiales que debes de tener con la raza específica que estás comprando.
</br>
- NUNCA compres una nueva mascota sin verla físicamente antes.
</br>
- NUNCA hagas depósitos o transferencias bancarias a través de medios donde tu dinero no pueda ser
rastreado, como lo son Money Gram y Western Union.
</br>
- NUNCA pagues por un perro con registro de pedigree AKC si no te muestran los certificados, ya que
corres el riesgo de que sea una estafa y nunca te los entreguen. Exige ver los papeles y asegúrate de
que el nombre del criador esté en el certificado.
</br>
- Cuando vayas a ver al vendedor, nunca vayas solo y revisa los alrededores.
</br>
- El vendedor también debe estar interesado en ti y en manos de quién dejará a su perro.
</div>


</div>

</br>

</div>

 
</div>




<?php $this->load->view('general/menu_view', array('seccion' => $seccion)) ?>

<div class="titulo_seccion">PERROS PERDIDOS</div>
<div class="contenedor_buscador">
<div class="buscador">
 <form id="filtro_venta">
 <input type="hidden" name="id_anuncio" id="id_anuncio" value=""/>
<div class="fondo_select">
<select   class="styled" id="raza" name="raza">
<option value="" > Selecciona un raza </option>
<?php if($razas != null):
	foreach($razas as $raza):?>
<option style="background-color: #BCBEC0;" value="<?=$raza->razaID?>"><?=$raza->raza?></option>
<?php endforeach;
		endif;?>
</select>
</div>

<div class="fondo_select">
<select    class="styled" id="genero" name="genero">
<option value="" > Selecciona un género </option>
<option value="1" style="background-color: #BCBEC0;">Macho </option>
<option value="0" style="background-color: #BCBEC0;">Hembra </option>

</select>
</div>

<div class="fondo_select">
<select    class="styled" id="estado" name="estado">
<option value=""> Selecciona un Estado </option>
<?php if($estados != null):
	foreach($estados as $estado):?>
<option style="background-color: #BCBEC0;" value="<?=$estado->estadoID?>"><?=$estado->nombreEstado?></option>
<?php endforeach;
		endif;?>

</select>
</div>

<input type="hidden" id="Precio" name="precio">

<div class="contenedor_buscar">
<input  type="text" class="buscar" size="4" name="palabra_clave" id="palabra_clave"/>
<input type="button" height="40" value="  " class="boton_palabras_clave" />
</div>
</form>
</div>

</div>

<div id="contenedor_central"  >
<?php $this->load->view('general/contTest');?>


<div class="contenedor_central" style="margin-top:5px;">

      <!-- item container -->
      <ul id="itemContainer" style="display:inline-block;">
      <?php $fila = 1; ?>
     
<?php
         
		foreach($publicaciones as $publicacion):
			echo "<script> buscar_imagen('".$publicacion->publicacionID."');</script>";
		?>
   <!-- INICIO contenedor anuncio  -->
<div class="contenedor_anuncio">
<div class="titulo_anuncio_perdidos">
<?=substr($publicacion->titulo, 0, 12).'...'?>
</div>
<div class="descripcion_anuncio">
<font> Raza: <?php $razita= $publicacion->raza;echo substr($razita, 0, 15); ?>  </font>
<br/>
<font> Género: <?php echo $publicacion->genero?'Macho':'Hembra'?> </font>
<br/>
<font> Ciudad: <?=substr($publicacion->ciudad, 0, 10)?></font>
</div>
<div class="contenedor_foto_anuncio">
<img src="<?=base_url()?><?=$publicacion->foto?>" align="middle" width="128" height="80" />
</div>
 
          <ul class="ver_detalle_anuncio">
                        <?php if ($this->session->userdata('idUsuario') !== FALSE): ?>
                            <li class="mas_anuncio" data-id="<?php echo $publicacion->publicacionID ?>" >
                            Ver detalle...
                        </li>
                        <?php else: ?>
                            <li onclick="javascript:alert('Favor de iniciar sesión.')">
                                Ver detalle...
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>

                <!-- Fin contenedor annuncio -->

                <?php if (4 > $fila++): ?>
                    <!-- Inicio margen falso -->
                    <div class="margen_derecho_20">

                    </div>
                <?php else: ?>
                    <?php $fila = 1; ?>
                <?php endif; ?>
                <!-- FIN margen falso -->
            <?php endforeach; ?>

      </ul>
      
      <div style=" margin: 0px auto; padding:10px; text-align:center;">
       <!-- navigation holder -->
      <div class="holder">  </div>
      </div>
      </div>
 



<div class="seccion_derecha_paquetes">
<ul class="aqui_crear_anuncio">
<li onclick="muestra('contenedor_publicar_anuncio');">

</li>
</ul>
</div>

<script>
function buscar_anunciante(id){
	muestra('contenedor_contactar');
    $('.boton_naranja_tres').show();
    $('.info').html('');
	         $(".datos_anunciante").empty();
             id_anuncio="id_anuncio="+id;

            $.ajax({
                url: '<?php echo base_url('venta/datos_anunciante') ?>',
                data: id_anuncio,
                dataType: 'json',
                type: 'post',
                 success: function(result)
                { 
				
               

                    var data = result.data;

                    if (result.count < 1) {
                    
                    }
                    for (var i = 0; i < result.count; i++)
                    {
						if (data[i].muestraTelefono==1 ){
							var telefono=data[i].telefono;
							} else{
								
								var telefono="---";
								}
						
						 $(".datos_anunciante").append('</br><strong> Nombre de usuario:</strong> <font >'+data[i].nombre+' '+data[i].apellido+'</font></br><strong> Estado: </strong> <font >'+data[i].nombreEstado+'</font></br><strong> Ciudad: </strong> <font>'+data[i].ciudad+'</font></br><strong> Teléfono: </strong><font>'+telefono+'</font></br></br>');
                        
                        
            }
            
    }
    
});




}


function contactar_pub(id) {

    $('.btn_contactar').on('click', function (){
        var pub = $(this).data("pub");
        $('.info', '#contacto_form').html('');
        buscar_anunciante_dos(pub);
        muestra('contenedor_contactar');
        $("#contacto_form")[0].reset();
        //console.log(pub+'meh');
        
        $('#contenedor_contactar #contacto_form').submit(function(e){
            e.preventDefault();
            var form = $(this);
            var seccion = '<?=$seccion?>';
            $('.info').html('Enviando...');
            $.ajax({
                url: '<?php echo base_url('venta/contactar')?>',
                data: form.serialize()+'&pub='+pub+'&seccion='+seccion,
                dataType: 'html',
                type: 'post',
                before: function () {
                    $('.info',form).html('loading');
                },
                success: function (data) {
                    $('.info',form).html(data);
                    //$('.boton_naranja_tres').show();
                }
            });
        });
    });
}

function buscar_anunciante_dos(id){

	    $(".datos_anunciante_dos").empty();
             id_anuncio="id_anuncio="+id;

            $.ajax({
                url: '<?php echo base_url('venta/datos_anunciante') ?>',
                data: id_anuncio,
                dataType: 'json',
                type: 'post',
                 success: function(result)
                { 
				
               

                    var data = result.data;

                    if (result.count < 1) {
                    
                    }
                    for (var i = 0; i < result.count; i++)
                    {
						if (data[i].muestraTelefono==1 ){
							var telefono=data[i].telefono;
							} else{
								
								var telefono="---";
								}
						
						 $(".datos_anunciante_dos").append('</br><strong> Nombre de usuario:</strong> <font >'+data[i].nombre+' '+data[i].apellido+'</font></br><strong> Estado: </strong> <font >'+data[i].nombreEstado+'</font></br><strong> Ciudad: </strong> <font>'+data[i].ciudad+'</font></br><strong> Teléfono: </strong><font>'+telefono+'</font></br></br>');
                        
                        
            }
            
    }
    
});

}


function obten_id(id) {
    muestra('contenedor_contactar');
    document.getElementById('enviando_id').value = id;

}

    $(function () {

        function enviar_mail(id) {
            id = document.getElementById('enviando_id').value


            $.ajax({
                url: '<?php echo base_url('perdidos/contactar');?>/' + id,
                type: 'post',
                dataType: 'html',
                data: '',
                beforeSend: function () {
                    $(".infouser").empty().html('<div class="spinner"><div class="bounce1"></div><div class="bounce2"></div><div class="bounce3"></div></div>');
                },
                success: function (data) {
                    $(".infouser").empty().append(data);

                }
            });
        }

        /* initiate the plugin */
        $("div.holder").jPages({
            containerID: "itemContainer",
            perPage: 25,
            startPage: 1,
            startRange: 1,
            midRange: 5,
            endRange: 1
        });

        $("#filtro_venta select[name]").on('change', function (e) {
            e.preventDefault();
            var form = $("#filtro_venta");

            search_data(form);
        });

        $("#filtro_venta [name]").keyup(function () {
            if ($(this).val().length > 2 || $(this).val().length === 0) {
                var form = $("#filtro_venta");
                search_data(form);
            }
        });

        function search_data(form) {

            $.ajax({
                url: '<?php echo base_url('perdidos/lista')?>',
                data: form.serialize(),
                dataType: 'json',
                type: 'post',
                beforeSend: function () {
                    $("#itemContainer").empty().html('<div class="spinner"><div class="bounce1"></div><div class="bounce2"></div><div class="bounce3"></div></div>');
                },
                success: function (result) {
                    $("#itemContainer").empty();
                    var data = result.data;
                    var separator = 1;

                    if (result.count < 1) {
                        $("#itemContainer").append('<div class="alert alert-warning">No hay resultados.</div>');
                    }

                    for (var i = 0; i < result.count; i++) {
                        if (data[i].genero === '0'){
                            var el_genero = "Hembra";
                        }
                        else{
                            var el_genero = "Macho";
                        }

                        var cont_anun = $('<div class="contenedor_anuncio"></div>');
                        var cont_titulo = $('<div class="titulo_anuncio_perdidos"></div>');
                        cont_titulo.append(data[i].titulo);
                        cont_anun.append(cont_titulo);

                        var cont_descripcion = $('<div class="descripcion_anuncio"></div>');
                        cont_descripcion.append('<font> Precio:' + data[i].precio + '</font> </br> <font> Raza: ' + data[i].raza.substring(0, 15) + ' </font></br> <font>Género:' + el_genero + '</font></br> <font>Ciudad:' + data[i].nombreEstado + '</font> ');
                        cont_anun.append(cont_descripcion);

                        var cont_imagen = $('<div class="contenedor_foto_anuncio" id="contener_foto'+data[i].publicacionID+'" ></div>');
                       buscar_imagen(data[i].publicacionID);
                        cont_anun.append(cont_imagen);

                        <?php if ($this->session->userdata('idUsuario') !== FALSE): ?>
                        var ver_mas = $('<ul class="ver_detalle_anuncio"><li onclick="muestra(\'contenedr_anuncio_detalle\')">Ver detalle...</li></ul>');
                    <?php else: ?>
                    var ver_mas = $('<ul class="ver_detalle_anuncio"><li onclick="javascript:alert(\'Favor de iniciar sesión.\')">Ver detalle...</li></ul>');
                <?php endif; ?>
                cont_anun.append(ver_mas);

                $("#itemContainer").append(cont_anun);
                if (4 > separator++) {
                    $("#itemContainer").append('<div class="margen_derecho_20"></div>');
                }
                else {
                    separator = 1;
                }
            }

        },
        complete: function () {
            $("div.holder").jPages({
                containerID: "itemContainer",
                perPage: 28,
                startPage: 1,
                startRange: 1,
                midRange: 5,
                endRange: 1
            });
        }
    });
}

function show_details(data) {


}

function buscar_detalles(id) {
    muestra('contenedor_anuncio_detalle');
    var id_anuncio = "raza=&genero=&estado=&precio=&palabra_clave=&id_anuncio=" + id;
    $.ajax({
        url: '<?php echo base_url('perdidos/lista')?>',
        data: id_anuncio,
        dataType: 'json',
        type: 'post',
        beforeSend: function () {
            $(".contenedor_galeria").empty().html('<div class="spinner" style="position:fixed;"><div class="bounce1"></div><div class="bounce2"></div><div class="bounce3"></div></div>');
            $(".datos_general").empty().html('<div class="spinner" style="position:fixed;"><div class="bounce1"></div><div class="bounce2"></div><div class="bounce3"></div></div>');
            $(".descripcion_del_anuncio").empty().html('<div class="spinner" style="position:fixed;"><div class="bounce1"></div><div class="bounce2"></div><div class="bounce3"></div></div>');
            $("#you_tube").empty().html('<div class="spinner" style="position:fixed;"><div class="bounce1"></div><div class="bounce2"></div><div class="bounce3"></div></div>');
            $(".contenedor_galeria").empty().html('<div class="spinner" style="position:fixed;"><div class="bounce1"></div><div class="bounce2"></div><div class="bounce3"></div></div>');
            $(".boton_naranja_dos").empty().html('<div></div>');
            //$('.contenedor_foto_anuncio').empty().html('');   
        },
        success: function (result) {

            buscar_imagenes(id);

            $(".contenedor_galeria").empty();
            $(".datos_general").empty();
            $(".descripcion_del_anuncio").empty();
            $("#you_tube").empty();
            var data = result.data;

            if (result.count < 1) {
                $(".contendor_galeria").append('<div class="alert alert-warning">No hay resultados.</div>');
            }
            for (var i = 0; i < result.count; i++) {
                if (data[i].genero === '0')
                    var el_genero = "Hembra";
                else
                    var el_genero = "Macho";

                $(".contenedor_galeria").append('<img src="' + data[i].foto + '" width="294" height="200" style=" top: 0px; left: 0px; display: block; z-index: 5; opacity: 1;"/>');
                var cont_datos = $('.datos_general');
                var cont_info = $(' <div class="titulo_anuncio_publicado">' + data[i].titulo + '</div></br><strong>Precio: $' + data[i].precio + '</strong></br><font> Fecha de publicación:' + data[i].fechaCreacion + '</font></br><font>Sección: Venta</font></br><font>Raza:' + data[i].raza + '</font></br><font>Género:' + (data[i].genero ? 'Macho' : 'Hembra') + '</font></br><font>Lugar: ' + data[i].nombreEstado + '</font></br></br>');
                cont_datos.append(cont_info);
                var botones = $('<ul class="boton_naranja"><li onclick="buscar_anunciante(\'' + data[i].publicacionID + '\')">Contactar al anunciante</li> </ul> </br> <ul class="boton_gris"><li data-pub="' + data[i].publicacionID + '" class="btn_fvt"><img src="images/favorito.png"/>Agregar a Favoritos</li></ul><span id="info_fav"></span>');
                cont_datos.append(botones);
                $('.descripcion_del_anuncio').append(data[i].descripcion);
                //$('.contenedor_foto_anuncio').append(data[i].foto);
                if (data[i].paqueteID != '1'){
                buscar_videos(data[i].publicacionID);
                }

                $('.btn_den').data('pub', data[i].publicacionID);
            }

            add_favorite();
            denunciar_pub();
            contactar_pub();
        }
    });
}




function buscar_imagenes(id){
             id_anuncio="id_anuncio="+id;

            $.ajax({
                url: '<?php echo base_url('venta/fotos') ?>',
                data: id_anuncio,
                dataType: 'json',
                type: 'post',
                 success: function(result)
                { 
                    $(".contenedor_galeria").empty().html('<div id="slideshow_publicar_anuncio_previo" class="picse"></div>');

                    var data = result.data;

                    if (result.count < 1) {
                    
                    }
                    for (var i = 0; i < result.count; i++)
                    {
                       
                        $("#slideshow_publicar_anuncio_previo").append('<img src="' + data[i].foto + '" width="294" height="200" style=" top: 0px; left: 0px; display: block; z-index: 5; opacity: 1;"/>');
                        
            }
            contener_images();
    }
    
});

}

function contener_images() {

    $('#slideshow_publicar_anuncio_previo').before('<ul id="nav_anuncio">').cycle({
    fx:      'scrollRight', 
    next:   '#right_previo', 
    timeout:  0, 
    easing:  'easeInOutBack',
        pager:  '#nav_anuncio',
        pagerAnchorBuilder: function(idx, slide) {
            return '<li><a href="#"><img src="' + slide.src + '" width="61" height="44" /></a></li>';
        }
    });
}


function buscar_videos(id){

             id_anuncio="id_anuncio="+id;

            $.ajax({
                url: '<?php echo base_url('venta/videos') ?>',
                data: id_anuncio,
                dataType: 'json',
                type: 'post',
                 success: function(result)
                { 
                    $("#you_tube").empty();

                    var data = result.data;

                    if (result.count < 1) {
                    
                    }
                    for (var i = 0; i < result.count; i++)
                    {
						
                       
                        var video=$('#you_tube');
						var direccion=$('<iframe src="'+data[i].link+'"></iframe> <br/><br/>');
						    video.append(direccion);
                        
            }
            
    }
    
});

}



function add_favorite() {
    $('.btn_fvt').on('click', function () {

        var pub = $(this).data("pub");

        $.ajax({
            url: '<?php echo base_url('venta/add_favorite')?>',
            data: 'pub=' + pub,
            dataType: 'html',
            type: 'post',
            before: function (data) {
                $('#info_fav').html('loading');
            },
            success: function (data) {
                $('#info_fav').html(data);
            },
            complete: function () {
                setTimeout(function(){
                    $('#info_fav').html('');
                }, 5000);
            }
        });
    });
}

function denunciar_pub(id) {

    $('.btn_den').on('click', function (){
        $('.boton_naranja_tres').show();
        $('.info').html('');
        var pub = $(this).data("pub");
        console.log(pub);
        $('.info', '#denuncia_form').html('');
        buscar_anunciante_dos(pub);
        muestra('contenedor_denunciar');
        
        $('#contenedor_denunciar #denuncia_form').submit(function(e){
            $('.boton_naranja_tres').hide();
            $('.info',form).html('Enviando...');
            e.preventDefault();
            var form = $(this);
            $.ajax({
                url: '<?php echo base_url('perdidos/denunciar')?>',
                data: form.serialize()+'&pub='+pub,
                dataType: 'html',
                type: 'post',
                before: function () {
                   $('.info',form).empty().html('<div class="spinner"><div class="bounce1"></div><div class="bounce2"></div><div class="bounce3"></div></div>');
                },
                success: function (data) {
                    $('.info',form).html(data);
                }
            });
        });
    });
}

$('.mas_anuncio').on('click', function(){

    var id = $(this).data('id');
	$.ajax({
                url: '<?php echo base_url('venta/click')?>',
                data: 'id='+id,
                dataType: 'html',
                type: 'post',
                success: function (data) {
                   return true;
                }
     });

    buscar_detalles(id);
});

});


	
</script>
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
    
<div class="division_menu_inferior" style="overflow:hidden;display:block;"></div>
<?php $this->load->view('general/footer_view');?>
<div id="contenedor_publicar_anuncio" class="contenedor_publicar" style=" display:none">

    <!-- Inicio contenedor pap publicar anuncio aunucio !-->
    <div id="publicar_anuncio" class="pubicar_anuncio_mini">
        <?php $this->load->view('partial/_pasos_anuncio', array('paquetes' => $paquetes, 'estados' => $estados, 'razas' => $razas,'cupones' => $cupones)); ?>

    </div>
    </div>
</body>
</html>
