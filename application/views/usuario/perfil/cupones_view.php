<div class="titulo_seccion_admin">
<div class="perrito_perfil">
<img src="<?php echo base_url()?>images/cupon_perfil.png" />
</div>
<div class="admin_title"> Tienes <?php echo count($cupones);?> cupones </div>
</div>
</br>
 <table class="tabla_perfil">
 <tr>
 <th> Tipo de cupón </th>
 <th> Descripción </th>
 <th> Valor </th>
 <th> Vencimiento </th>
 <th> Canjear </th>
 </tr>
 <?php if ($cupones !=Null){ ?>
 <?php 
  foreach ($cupones as $cupon) { ?>
    <tr>
            <?php if ($cupon->tipocupon ==1){?>
              <td>  Descuento en Tienda  </td>              
            <?php } elseif ($cupon->tipocupon == 2) {?>
                <td>Descuento Paquetes</td>
                
            <?php  } elseif ($cupon->tipocupon == 3) {?>
                <td>Descuento en Establecimiento</td>
                
            <?php } else {?>
                <td> Descuento en Directorio</td>
            <?php } ?>
            <td><?php echo $cupon->descripcion ?></td>
            <td> <?php echo $cupon->valor.' %' ?> </td>
            <td><?php echo $cupon->vigencia ?></td>
            <?php if ($cupon->tipocupon ==1){?>
              <td>  Canjeable al comprar en Tienda  </td>              
            <?php } elseif ($cupon->tipocupon == 2) {?>
                <td>Canjeable al comprar un Paquetes</td>
                
            <?php  } elseif ($cupon->tipocupon == 3) {?>
                <td> <ul class="boton_gris_perfil_tabla"><li> Canjear </li> </ul> </td>
                
            <?php } else {?>
                <td> Canjeable al comprar un espacio en el Directorio</td>
            <?php } ?>

            
  <?php } ?>
  <?php } ?>
 </table>
    
    
    
      </div>
