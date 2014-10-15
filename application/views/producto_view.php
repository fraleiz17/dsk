<script src="<?= base_url() ?>js/funciones_tienda.js"></script>
<div id="contenedor_detalle_anuncio" class="contenedor_detalle_anuncio" style="display:">

    <form action="<?= base_url() ?>carrito/addProducto_tienda" class="productoForm" method="post">
        <div class="crerar_detalle_anuncio">
            <input type="hidden" name="productoID" id="productoID" value="<?= $productoID ?>"/>
            <input type="hidden" name="precio" id="precio" value="<?= $detalleAnuncio->precio ?>"/>
            <input type="hidden" name="nombre" id="nombre" value="<?= $detalleAnuncio->nombre ?>"/>
            <img src="<?= base_url() ?>images/cerrar_verde.png" onclick="oculta('contenedor_detalle_anuncio');"/>
        </div>
        <div class="contenido_producto">
            <div class="contenedor_galeria_producto">

                <div id="slideshow_producto" class="picse">
                    <?php if ($fotos != null) {
                        foreach ($fotos as $foto) {
                            ?>
                            <img src="<?= base_url() ?>images/productos/<?= $foto->foto ?>" width="279" height="279"/>
                            <?php
                        }

                    } else {
                        ?>
                        <img src="<?= base_url() ?>images/productos/default.png" width="279" height="279"/>
                        <?php } ?>
                    </div>

                </div>
                <br/>

                <div class="titulo_producto">
                    <?= $detalleAnuncio->nombre ?>
                </div>
                <div class="decripcion_producto">
                    <?= $detalleAnuncio->descripcion ?>
                </div>
                <div class="costo_producto">
                    <font style=" padding-left:10px;"> $<?= $detalleAnuncio->precio ?></font>
                    <font style="padding-right:10px;"> MX </font>
                    <font style=" padding-left:10px;"> <input name="cantidad" type="number" value="1" size="3" maxlength="3" class="validate[required, minSize[1]] min[1] max[99]" style="width: 78px;"/>&nbsp;cantidad</font>
                </div>
                <div class="contenedor_select_producto">
                    <?php $attribute =''; ?>
                    <?php if ($opciones != null): ?>
                        <?php foreach ($opciones as $opcion) : ?>
                            <?php if($opcion->detalle !== $attribute): ?>

                                <?php echo $attribute != '' ? '</select>' : ''  ?>
                                <?php $attribute = $opcion->detalle; ?>
                                <select class="select_producto validate[required]" name="<?php echo $opcion->detalle; ?>">
                                    <option style="color: #CCC" value> Seleccione <?php echo $opcion->detalle ?></option>

                                <?php endif; ?>

                                <option value="<?= $opcion->valor ?>"><?= $opcion->valor ?></option>

                        <?php endforeach; ?>
                        <?php echo $attribute != '' ? '</select>' : ''  ?>
                    <?php endif; ?>
                </div>
                <?php $keyUser = $this->session->userdata('idUsuario'); ?>
                <?php $tipoUsuario = $this->session->userdata('tipoUsuario'); ?>

                <?php if ($keyUser !== FALSE && $tipoUsuario !==0): ?>
                    <div>
                        <div class="loader"></div>
                        <ul class="boton_verde">
                            <li>
                                <input type="submit" value="Agregar al carrito"/>
                            </li>
                        </ul>
                    </div>
                <?php endif; ?>
                <div class="infouser">

                </div>
            </div>
        </form>
    </div>
