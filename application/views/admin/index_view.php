<?php $this -> load -> view('admin/menu_view.php') ?>

<div class="contenedor_central">
<div class="titulo_seccion">
BIENVENIDO
</div>

<div class="contenedor_indicador">
<img src="<?php echo base_url()?>images/visitas_admin.png"/>
<div class="contadores">
<?php echo $visitas; ?>
</div>
</div>
<div style="margin-left:12px; margin-right:12px;" class="contenedor_indicador">
<img src="<?php echo base_url()?>images/usuarios.png"/>
<div class="contadores">
	<?php echo $usuariosT;   ?>
</div>
</div>

<div class="contenedor_indicador">
<img src="<?php echo base_url()?>images/publicaciones.png"/>
<div class="contadores">
	<?php echo $anunciosT; ?>
</div>
</div>

</div>

</body>
