<div class="titulo_seccion_admin">
<div class="perrito_perfil">
<img src="<?php echo base_url();?>images/factura_perfil.png" />
</div>
<div class="admin_title"> Mis facturas </div>
</div>
</br>
<table class="tabla_perfil" width="795"> 
<tr> 
<th width="137"> Código Compra </th>
<th width="348"> Resumen </th>
<th width="105"> Total </th>
<th width="185"> Fecha </th>
</tr>
<?php if ($compras != null) {?>

<?php foreach ($compras as $compra) {?>
<tr> 
<td><?php echo $compra->compraID ?> </td>
<td>
<?php if($facturas != null){
		foreach ($facturas as $factura) {
			if($factura->compraID == $compra->compraID){
		?>
 			<?php echo 'Cantidad: '.$factura->cantidad.' Articulo: '.$factura->nombre.' '.$factura->talla.' '.$factura->color;
 		    }
 	}
 }?></td>
<td> <?php echo $compra->total ?> </td>
<td> <?php echo $compra->fecha ?> </td>
</tr>
 

<?php }?>

<?php }?>
</table>
    
    

    
      </div>
	  