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
					
				$("#contener_foto"+id).append('<img src="<?php echo base_url() ?>' + foto + '" width="auto" height="100%"/>');
				
				}
                 })
}

 $('.mas_anuncio').on('click', function(){

    var id = $(this).attr('id');
    console.log(id);
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

   function enviar_mail(id) {
            id = document.getElementById('enviando_id').value


            $.ajax({
                url: '<?php echo base_url('venta/contactar/');?>/' + id,
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

   
   
   function contener_images() {
	

    $('#slideshow_publicar_anuncio_previo').before('<ul id="nav_anuncio_previo">').cycle({
    fx:      'scrollRight', 
    next:   '#right_previo', 
    timeout:  0, 
    easing:  'easeInOutBack',
        pager:  '#nav_anuncio_previo',
        pagerAnchorBuilder: function(idx, slide) {
            return '<li><a href="#"><img src="' + slide.src + '" width="61" height="44" /></a></li>';
        }
    });
}
   
function buscar_detalles(id) {
    muestra('contenedor_anuncio_detalle');
    var id_anuncio = "raza=&genero=&estado=&precio=&palabra_clave=&id_anuncio=" + id;
    $.ajax({
        url: '<?php echo base_url('venta/lista')?>',
        data: id_anuncio,
        dataType: 'json',
        type: 'post',
        beforeSend: function () {
            $(".contenedor_galeria").empty().html('<div class="spinner" style="position:fixed;"><div class="bounce1"></div><div class="bounce2"></div><div class="bounce3"></div></div>');
            $(".datos_general").empty().html('<div class="spinner" style="position:fixed;"><div class="bounce1"></div><div class="bounce2"></div><div class="bounce3"></div></div>');
            $(".descripcion_del_anuncio").empty().html('<div class="spinner" style="position:fixed;"><div class="bounce1"></div><div class="bounce2"></div><div class="bounce3"></div></div>');
            $("#you_tube").empty().html('<div class="spinner" style="position:fixed;"><div class="bounce1"></div><div class="bounce2"></div><div class="bounce3"></div></div>');
            $(".contenedor_galeria").empty().html('<div class="spinner" style="position:fixed;"><div class="bounce1"></div><div class="bounce2"></div><div class="bounce3"></div></div>');
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
                var cont_info = $(' <div class="titulo_anuncio_publicado">' + data[i].titulo + '</div></br><strong>Precio:' + data[i].precio + '</strong></br><font> Fecha de publicación:' + data[i].fechaCreacion + '</font></br><font>Sección: Venta</font></br><font>Raza:' + data[i].raza + '</font></br><font>Género:' + (data[i].genero ? 'Macho' : 'Hembra') + '</font></br><font>Lugar: ' + data[i].nombreEstado + '</font></br></br>');
                cont_datos.append(cont_info);
                var botones = $('<ul class="boton_naranja"><li onclick="buscar_anunciante(\'' + data[i].publicacionID + '\')">Contactar al anunciante</li> </ul> </br> <ul class="boton_gris"><li data-pub="' + data[i].publicacionID + '" class="btn_fvt"><img src="<?php echo base_url() ?>images/favorito.png"/>Agregar a Favoritos</li></ul><span id="info_fav"></span>');
                cont_datos.append(botones);
                $('.descripcion_del_anuncio').append(data[i].descripcion);
                buscar_videos(data[i].publicacionID);

                $('.btn_den').data('pub', data[i].publicacionID);
            }

            add_favorite();
            denunciar_pub();
        }
    });
}




function buscar_anunciante(id){
	muestra('contenedor_contactar');
	    
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
                      
                        $("#slideshow_publicar_anuncio_previo").append('<img src="<?php echo base_url(); ?>' + data[i].foto + '" width="294" height="200" style=" top: 0px; left: 0px; display: block; z-index: 5; opacity: 1;"/>');
                        
            }
            contener_images();
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

function denunciar_pub() {

    $('.btn_den').on('click', function (){
        var pub = $(this).data("pub");
        $('.info', '#denuncia_form').html('');

        muestra('contenedor_denunciar');
        
        $('#contenedor_denunciar #denuncia_form').submit(function(e){
            e.preventDefault();
            var form = $(this);
            $.ajax({
                url: '<?php echo base_url('venta/denunciar')?>',
                data: form.serialize()+'&pub='+pub+'&seccion='+<?=$seccion?>,
                dataType: 'html',
                type: 'post',
                before: function () {
                    $('.info',form).html('loading');
                },
                success: function (data) {
                    $('.info',form).html(data);
                }
            });
        });
    });
}

</script>


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
    <div style="width:323px;height:auto;display:block;overflow:hidden;-ms-overflow-style: none">
    <input type="text" class="formu_contacto" id="nombre_contacto"
    value="<?php echo $this->session->userdata('nombre')?>" size="44"/>
    <input type="text" class="formu_contacto" id="mail_contacto"
    value="<?php echo $this->session->userdata('correo')?>" size="44"/>
    <input type="text" class="formu_contacto" id="asunto_contacto"
    onfocus="clear_textbox('asunto_contacto', 'Asunto')" placeholder="Asunto" size="44"/>
    <textarea cols="50" onfocus="clear_textbox('comentarios_contacto', 'Comentarios')" id="comentarios_contacto"
    class="formu_contacto" rows="5">Comentarios</textarea>
</div>
</br>
</br>
<ul class="boton_naranja_tres">
    <li>
        <input type="submit" value="Enviar"/>
    </li>
</ul>
</form>

</div>


</div>






<div class="contenedor_anuncio_detalle" id="contenedor_anuncio_detalle" style=" display:none;">
<div class="contenedor_cerrar_anuncio">
<img src="<?php echo base_url()?>images/cerrar_anuncio.png" onclick="oculta('contenedor_anuncio_detalle');"/>
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


<div class="titulo_seccion_admin">
<div class="perrito_perfil">
<img src="<?php echo base_url();?>images/favoritos_perfil.png" />
</div>
<div class="admin_title"> Favoritos </div>
</div>
</br>
   <!-- item container -->
        <ul id="itemContainer" style="display:inline-block;">
            <?php $fila = 1;?>

            <?php
		    if($favoritos != null):
            foreach ($favoritos as $favorito):
			
                ?>
            <!-- INICIO contenedor anuncio  -->
            <div class="contenedor_anuncio">
                <div class="titulo_anuncio">
                    <?php echo $favorito->titulo?>
                </div>
                <div class="descripcion_anuncio">
                    <font> Precio: <?php echo $favorito->precioVenta?></font>
                    <br/>
                    <font> Raza: <?php $razita= $favorito->raza;echo substr($razita, 0, 15); ?> </font>
                    <br/>
                    <font> Género: <?php echo $favorito->genero?'Macho':'Hembra'?> </font>
                    <br/>
                    <font> Ciudad: <?php echo $favorito->ciudad?></font>
                </div>
                <div class="contenedor_foto_anuncio" id="contener_foto<?php echo $favorito->publicacionID?>">
                    <img src="<?=base_url().$favorito->foto?>" width="auto" height="100%"> 
                </div>

                <ul class="ver_detalle_anuncio">
                    <?php if ($this->session->userdata('idUsuario') !== FALSE):?>
                        <li class="mas_anuncio" id="<?php echo $favorito->publicacionID ?>" >
                            Ver detalle...<?php echo $favorito->publicacionID ?>
                        </li>
                    <?php else:?>
                        <li onclick="javascript:alert('Favor de iniciar sesión.')">
                            Ver detalle...
                        </li>
                    <?php endif;?>
                </ul>
            </div>

            <!-- Fin contenedor annuncio -->

            <?php if (4 > $fila++):?>
                <!-- Inicio margen falso -->
                <div class="margen_derecho_20">

                </div>
            <?php else:?>
                <?php $fila = 1;?>
            <?php endif;?>
            <!-- FIN margen falso -->
        <?php endforeach;
                endif;?>

    </ul>

    <div style=" margin: 0px auto; padding:10px; text-align:center;">
        <!-- navigation holder -->
        <div class="holder"></div>
    </div>
    
    
      </div>




 
 
 