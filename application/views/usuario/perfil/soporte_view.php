 <script>
 jQuery(document).ready(
                        function() {
                     $("#correoSoporte").submit(function(e) {
                            e.preventDefault();
                            var form = $(this);
                            if ($('.correoSoporte').validationEngine('validate')) {                           		$.ajax({
                                    url: '<?= base_url() ?>usuario/cuenta/correoSoporte',
                                    data: form.serialize(),
                                    dataType: 'JSON',
                                    type: 'post',
                                    success: function(data) {
                                       if(data.response = true){
										   alert('Mensaje enviado con éxito');
										   $('#correoSoporte')[0].reset();
										} else {
											alert('Intenta Nuevamente');
										}
                                    }
                                });
                            }
                        });
   });
            </script>

<div class="titulo_seccion_admin">
<div class="perrito_perfil">
<img src="<?=base_url()?>images/llave_perfil.png" />
</div>
<div class="admin_title"> Contáctanos </div>
</div>
</br>
<form action="<?=base_url()?>usuario/cuenta/correoSoporte" method="post" id="correoSoporte">
<p>Asunto: <input class="gris_input" type="text" required="required" size="45" name="asunto" id="asunto"/> </p>
</br>
<p> 
Descripción:
</br>
<textarea class="gris_input" rows="14" cols="97" name="descripcion" id="descripcion" required="required"></textarea>

</p>
    
    
 <div style="width:795px; margin-top:20px; height:150px;">
 <?php  if ($banner !== null && !empty($banner)) {
                    foreach ($banner as $contenido) {
                        if ($contenido->zonaID == 9 && $contenido->posicion == 2 && $contenido->seccionID == $seccion) {
                            ?>    
                            <div>
                                <h3><?php echo $contenido->texto; ?></h3>
                            </div>
                            <?php }
                        }
                    } ?>
 </div>
    <ul class="boton_gris_perfil"><li> <input type="submit" value="Enviar" /></li> </ul>
    </form>
      </div>