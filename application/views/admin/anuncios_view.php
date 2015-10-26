<?php $this->load->view('admin/menu_view'); ?>
<body>





<div class="contenedor_anuncio_detalle" id="contenedor_anuncio_detalle" style=" display:none;">
    <div class="contenedor_cerrar_anuncio">
        <img src="<?php echo base_url() ?>images/cerrar_anuncio.png" onClick="oculta('contenedor_anuncio_detalle');"/>
    </div>
    <div class="validar_anuncio">
        <ul class="boton_azul">
            <li id="aprobar" class="aprobar">Aprobar</li>
        </ul>
        <ul class="boton_azul">
            <li id="declinar" class="declinar">Declinar</li>
        </ul>
    </div>
    <div class="leer_anuncio">
        <div class="contenedor_galeria">
            <div id="slideshow_publicar_anuncio" class="picse">
                
            </div>
        </div>
        <div class="datos_general">
        <input type="hidden" name="publicacionID" id="publicacionID" value="" class="publicacion_ID"/>
        <input type="hidden" name="idUsuario" id="idUsuario" value="" class="usuario_ID"/>
            <div class="titulo_anuncio_publicado" id="titulo_anuncio_publicado">
                
            </div>
            <br>
            <strong>
                Precio: <span class="precio"></span>
            </strong>

            <br>
            <font> Fecha de publicacion:<span class="f_pub">12-06-2014</span></font>
            <br>
            <font>Sección: <span class="seccion">Venta</span></font>
            <br>
            <font>Raza: <span class="raza">Cairn Terrier</span></font>
            <br>
            <font>Género: <span class="genero">Macho</span></font>
            <br>
            <font>Lugar: <span class="ubicacion">Queretaro (Queretaro)</span></font>
            <br>
            <br>
            <ul class="boton_naranja">
                <li onClick="muestra('contenedor_contactar');">
                    Contactar al anunciante
                </li>
            </ul>
            <br>
            <ul class="boton_gris">
                <li>
                    <img src="<?php echo base_url() ?>images/favorito.png"/>Agregar a Favoritos
                </li>
            </ul>
        </div>
        <br>
        <div class="contenedor_del_detalle">
            <div class="titulo_anuncio_publicado">
                MÁS DETALLES
            </div>
            <div class="descripcion_del_anuncio">
                ksdjfkjslfk fdglksj gkfdsjg jgfkdjgkfd gfdgkdf gfdskj fgsfkjg sdlkf gjkfdsg fdlkgjdfl glfdsjg dflkgj
                dfgj flkgjf gjfd gfdjg fdlg fdlg fjgfd gjdslf gkgj lgjfgk gjfdkg lkgjf gjjkgj s
            </div>
            <br>
            <ul class="boton_naranja_dos">
                <li id="ver_video" onClick="muestra('video');">
                    Ver video
                </li>
            </ul>
            <div id="video" style="display:none;">
                <br>
                <div class="titulo_anuncio_publicado">
                    VIDEO
                </div>
               <div id="you_tube" class="youtube_video"></div>



</div>

            </div>
            <ul class="boton_rojo_dos">
                <li>
                    <img src="<?php echo base_url() ?>images/alert.png"/>
                    Denunciar Anuncio
                </li>
            </ul>
            <div class="consejos_advertencias">
                - QuierounPerro.com te invita a que antes de comprar pienses en adoptar, ya que hoy en día hay millones
                de perros sin hogar que deben ser sacrificados.
                <br>
                - Tener un perro conlleva una serie de responsabilidades, cuidados y atenciones que debes considerar
                antes de comprar uno.
                <br>
                - Infórmate de los cuidados especiales que debes de tener con la raza específica que estás comprando.
                <br>
                - NUNCA compres una nueva mascota sin verla físicamente antes.
                <br>
                - NUNCA hagas depósitos o transferencias bancarias a través de medios donde tu dinero no pueda ser
                rastreado, como lo son Money Gram y Western Union.
                <br>
                - NUNCA pagues por un perro con registro de pedigree AKC si no te muestran los certificados, ya que
                corres el riesgo de que sea una estafa y nunca te los entreguen. Exige ver los papeles y asegúrate de
                que el nombre del criador esté en el certificado.
                <br>
                - Cuando vayas a ver al vendedor, nunca vayas solo y revisa los alrededores.
                <br>
                - El vendedor también debe estar interesado en ti y en manos de quién dejará a su perro.
            </div>
        </div>
        <br>
    </div>
</div>

<!-- fin wncabezado -->
<div class="contenedor_central">
    <div class="titulo_seccion">
        ANUNCIOS
    </div>
    <form action="#" method="post" id="filtro_anuncios">
        <div class="contenedor_buscador" style="text-align: left;">
            <!--Aqui se realiza la peticion-->
            <input data-label="Aprobación" type="radio" name="validacion_admin"  value="e_aprobacion" id="radio4" class="css-checkbox" checked="checked"/>
            <label for="radio4" class="css-label radGroup2">En espera de aprobación</label>
            &nbsp;&nbsp;
            <input type="radio" data-label="aprobados" name="validacion_admin"  value="aprobados" id="radio5" class="css-checkbox"/>
            <label for="radio5" class="css-label radGroup2">Aprobados</label>
            &nbsp;&nbsp;
            <input type="radio" data-label="rechazados" name="validacion_admin"  value="rechazados" id="radio6" class="css-checkbox"/>
            <label for="radio6" class="css-label radGroup2">Rechazados</label>
            &nbsp;&nbsp;
            <div class="fondo_select_dos">
                <!--            volcado de las zonas-->
                <select name="zonas" class="estilo_select" >
                    <option value=""> Seleccione zona</option>
                    <?php foreach ($zonageografica as $value): ?>
                        <option value="<?php echo $value->zonaID ?>"> <?php echo $value->zona; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="secciones">
            <input type="radio" data-label="venta" name="seccion" value="venta" id="venta" class="css-checkbox" checked="checked"/><label for="venta" class="css-label radGroup2">
                Venta: <label id="c_venta"><font class="color_morado"> <?php echo $count_sale_pets ?> </font></label>
            &nbsp;&nbsp;
           <!--  <input type="radio" data-label="cruza" name="seccion" value="cruza" id="cruza" class="css-checkbox"/>
            <label for="cruza" class="css-label radGroup2"> Cruza: <font class="color_morado"> <?php echo $count_cross_pets ?> </font> </label>
            &nbsp;&nbsp;-->
            <input type="radio" data-label="adopción" name="seccion" value="adopcion" id="adopcion" class="css-checkbox"/><label for="adopcion"
                                                                                                                                 class="css-label radGroup2">
                Adopción: <label id="c_adopcion"><font class="color_morado"> <?php echo $count_adoption_pets ?> </font></label>
            &nbsp;&nbsp;
            <input type="radio" data-label="perdidos" name="seccion" value="perdidos" id="perdidos" class="css-checkbox"/><label for="perdidos"
                                                                                                                                 class="css-label radGroup2">
                Perdidos:<label id="c_perdidos"><font class="color_morado"> <?php echo $count_lost_pets ?></font></label>
            &nbsp;&nbsp;
            <input type="radio" data-label="directorio" name="seccion" value="directorio" id="directorio" class="css-checkbox"/><label for="directorio" class="css-label radGroup2">
                Directorio:<label id="c_directorio"><font class="color_morado"> <?php echo $count_directory ?> </font></label>
            &nbsp;&nbsp;
            <input type="radio" data-label="asociaciones" name="seccion" value="asociaciones" id="asociaciones" class="css-checkbox"/><label for="asociaciones" class="css-label radGroup2">
                Asociaciones:<label id="c_asociaciones"><font class="color_morado"> <?php echo $count_asc ?> </font></label>
        </div>
    </form>
    <div id="subtitulo" class="subtitulo"></div>
    <br>
    <table id="lista_anuncios" class="tabla_carrito" width="990">
        <thead>
        <tr>
            <th width="133">
                ID-Anuncio
            </th>
            <th width="139">
                ID-Usuario
            </th>
            <th width="169">
                Fecha creación
            </th>
            <th width="225">
                Paquete
            </th>
            <th width="147">
                Pago
            </th>
            <th width="149">
                Anuncio
            </th>
        </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
<script>

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
                    //$(".boton_naranja_dos").fadeOut();
                    var data = result.data;
                    if (result.count = 0) {
                        alert('meh');
                        $("#video").fadeOut();
                    
                    }
                    for (var i = 0; i < result.count; i++)
                    {
						if(data[i].link != ''){
                       //$(".boton_naranja_dos").fadeIn();
                        var video=$('#you_tube');
						var direccion=$('<iframe src="'+data[i].link+'"></iframe> <br><br>');
						    video.append(direccion);
                        } else {
                            $(".boton_naranja_dos").fadeOut();
                        }
            }
            
    }
    
});

}


function contener_images() {

    $('#slideshow_publicar_anuncio').before('<ul id="nav_anuncio">').cycle({
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
function buscar_imagenes(id){
             id_anuncio="id_anuncio="+id;

            $.ajax({
                url: '<?php echo base_url('venta/fotos') ?>',
                data: id_anuncio,
                dataType: 'json',
                type: 'post',
                 success: function(result)
                { 
                    $(".contenedor_galeria").empty().html('<div id="slideshow_publicar_anuncio" class="picse"></div>');

                    var data = result.data;

                    if (result.count < 1) {
                    
                    }
                    for (var i = 0; i < result.count; i++)
                    {
                       
                        $("#slideshow_publicar_anuncio").append('<img src="<?php echo base_url() ?>' + data[i].foto + '" width="294" height="200" style=" top: 0px; left: 0px; display: block; z-index: 5; opacity: 1;"/>');
                        
            }
            contener_images();
    }
    
});

}

    $(function() {
		$(".aprobar").on('click', function() {
			var publicacionID = $('#publicacionID').val();
			console.log(publicacionID);
			 $.ajax({
                url: 'aprobarAnuncio',
                data: 'publicacionID=' +publicacionID,
                type: 'POST',
                dataType: 'json',
				success: function(response) {
					oculta('contenedor_anuncio_detalle');
					alert('El anuncio ha sido aprobado');
                    load_data_filter();
					
				}
				
			 });			
		
		});
		
		$(".declinar").on('click', function() {
			var publicacionID = $('#publicacionID').val();
			console.log(publicacionID);
			 $.ajax({
                url: 'declinarAnuncio',
                data: 'publicacionID=' +publicacionID,
                type: 'POST',
                dataType: 'json',
				success: function(response) {
					oculta('contenedor_anuncio_detalle');
					alert('El anuncio ha sido declinado');
                    load_data_filter();
					
				}
				
			 });			
		
		});
        function load_data_filter() {
            var form_filter = $("#filtro_anuncios");
            $.ajax({
                url: 'anuncios_lista',
                data: form_filter.serialize(),
                type: 'POST',
                dataType: 'json',
                beforeSend: function() {
                    $('#lista_anuncios tbody').fadeOut().empty().append('<tr><td colspan=6><div class="spinner"></div></td></tr>').fadeIn();
                },
                success: function(response) {
                    //change subtitulo
                    //change table rows
                    var data_validation = $('input[name=validacion_admin]:checked').data('label');
                    var data_seccion = $('input[name=seccion]:checked').data('label');
                    var value_zona = $('select[name=zonas] option:selected').val();
                    var text_zona = $('select[name=zonas] option:selected').text();
                    if (value_zona === '') {
                        text_zona = " - ";
                    }
                    else {
                        text_zona = ' - ' + text_zona + ' - ';
                    }
                    console.log(data_seccion);
                    if(data_seccion == 'venta'){
                        $('#c_venta').html(response.count);
                    }

                    if(data_seccion == 'adopción'){
                        $('#c_adopcion').html(response.count);
                    }

                    if(data_seccion == 'perdidos'){
                        $('#c_perdidos').html(response.count);
                    }

                    if(data_seccion == 'directorio'){
                        $('#c_directorio').html(response.count);
                    }

                    if(data_seccion == 'asociaciones'){
                        $('#c_asociaciones').html(response.count);
                    }

                    $('#subtitulo').fadeOut().empty().text((data_validation + text_zona + data_seccion).toUpperCase()).fadeIn();
                    var table_data = $('#lista_anuncios tbody');
                    if (response.count > 0) {

                        table_data.slideUp().empty();
                        for (var i = 0; i < response.count; i++) {
                            var row = $('<tr></tr>');

                            row.data('titulo', response.data[i].titulo);
                            
                            row.data('fechaCreacion', response.data[i].fechaCreacion);
                            row.data('seccionNombre', response.data[i].seccionNombre);
                            if( response.data[i].seccionNombre != 'Adopción' && response.data[i].seccionNombre != 'Asociaciones' && response.data[i].seccionNombre != 'Directorio'){
                                row.data('precio', response.data[i].precio);
                            }
                            row.data('raza', response.data[i].raza);
                            row.data('genero', response.data[i].genero);
                            row.data('descripcion', response.data[i].descripcion);
                            row.data('publicacion_id', response.data[i].publicacionID);
							row.data('idUsuario', response.data[i].idUsuario);
                            //falta lugar

                            row.append('<td>' + ('0000' + response.data[i].publicacionID).slice(-4) + '</td>');
                            row.append('<td>' + ('0000' + response.data[i].idUsuario).slice(-4) + '</td>');
                            row.append('<td>' + response.data[i].fechaCreacion + '</td>');
                            var image_paquete;
                            if (response.data[i].nombrePaquete === "Lite") {
                                image_paquete = 'images/pago_lite.png';
                            }
                            if (response.data[i].nombrePaquete === "Regular") {
                                image_paquete = 'images/pago_regular.png';
                            }
                            if (response.data[i].nombrePaquete === "Premium") {
                                image_paquete = 'images/pago_premium.png';
                            }

                            if (response.data[i].pagado === '1') {
                                estadoPago = 'Pagado';
                            } else { estadoPago = 'Declinado'; }

                            row.append('<td> <img width="99" heigth="50" src="<?php echo base_url() ?>' + image_paquete + '" alt=' + response.data[i].nombrePaquete + ' /></td>');
                            row.append('<td>'+estadoPago+'</td>');
                            row.append('<td><a class="ver_anuncio" href="#" id="'+response.data[i].publicacionID+'">ver anuncio</a></td>');
                            table_data.append(row).slideDown();
                            show_detalles_publicacion();

                        }

                    } else {
                        table_data.slideUp().empty().append('<tr><td colspan="6">No hay resultados</td></tr>').slideDown();
                    }
                },
                error: function() {
                    $('#lista_anuncios tbody').slideUp().empty().append('<tr><td colspan="6">No hay resultados</td></tr>').slideDown();
                }
            });
        }

        $('#filtro_anuncios *[name]').on('change', function() {
            load_data_filter();
        });
        load_data_filter();

        function show_detalles_publicacion() {
            $(".ver_anuncio").on('click', function() {

                var row_data = $(this).parents('tr');

                var anuncio_div = $('#contenedor_anuncio_detalle');
                $('#titulo_anuncio_publicado', anuncio_div).text(row_data.data('titulo'));
                if(row_data.data('seccionNombre') != 'Asociaciones' && row_data.data('seccionNombre') != 'Adopción' && row_data.data('seccionNombre') != 'Directorio' ){
                    $('.precio', anuncio_div).text(parseFloat(row_data.data('precio')).toFixed(2));
                } else {
                    $('.precio', anuncio_div).text('0.00');
                }
                
				$('.publicacion_ID', anuncio_div).val(row_data.data('publicacion_id'));
				$('.usuario_ID', anuncio_div).val(row_data.data('idUsuario'));
                $('.f_pub', anuncio_div).text(row_data.data('fechaCreacion'));
                $('.seccion', anuncio_div).text(row_data.data('seccionNombre'));
                $('.raza', anuncio_div).text(row_data.data('raza'));
                $('.genero', anuncio_div).text(row_data.data('genero')? "Macho" : "Hembra");
                $('.descripcion_del_anuncio', anuncio_div).text(row_data.data('descripcion'));
                //faltan imagenes y links
				buscar_imagenes(row_data.data('publicacion_id'));
				buscar_videos(row_data.data('publicacion_id'));

                $('#contenedor_anuncio_detalle').css('display', 'block');
            });
        }

    });
</script>
<?php $this->load->view('admin/footer_view'); ?>