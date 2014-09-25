<table border="0" align="center"> 
    <?php $temp = 0; ?>
    <tr>
        <?php foreach ($productos as $p): ?>
            <?php
            if ($temp < 3) {
                $temp++;
                ?>

                <td style="width: 300px;" valign="top">
                    <p style="font-size: 24px;">
                        <?= $p['nombre']; ?>
                    </p>
                    <img alt="" src="<?= base_url() . "productos_imagenes/thumbs/" . $p['ruta_imagen'] ?>"/><br>
                    <?= "$".$p['precio']; ?><br>
                    <button onclick="show_producto(<?= $p['id_producto']; ?>)">Mostrar detalles.</button>
                </td>
                <?php
            } else {
                $temp = 0;
                ?>
            </tr>
            <tr>
                <td style="width: 300px;" valign="top">
                    <p style="font-size: 24px;">
                        <?= $p['nombre']; ?>
                    </p>
                    <img alt="" src="<?= base_url() . "productos_imagenes/thumbs/" . $p['ruta_imagen'] ?>"/><br>
                    <?= "$".$p['precio']; ?><br>
                    <button onclick="show_producto(<?= $p['id_producto']; ?>)">Mostrar detalles.</button>
                </td>
            <?php } ?>
        <?php endforeach; ?> 
    </tr>
</table>