<div class="container container-md-height">
    <div class="row row-md-height">
        <?php foreach ($productos as $p): ?>
            <div class="col-sm-3 col-md-height">
                <div class="thumbnail">
                    <img alt="" src="<?= base_url() . "productos_imagenes/thumbs/" . $p['ruta_imagen'] ?>"/><br>
                    <div class="caption">
                        <h3><?= $p['nombre'].' $'.$p['precio']; ?></h3>
                        <button class="btn btn-default" onclick="show_producto(<?= $p['id_producto']; ?>)">Mostrar detalles.</button>
                    </div>
                </div>
            </div>
        <?php endforeach; ?> 
    </div>
</div>