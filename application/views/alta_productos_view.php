
<?php
$nombre = array(
    'name' => 'titulo',
    'placeholder' => 'Nombre de la imagen',
        //'readonly'=>'readonly',
        //'value'=>'obed'
);
$descripcion = array(
    'name' => 'descripcion',
    'placeholder' => 'Descripcion',
);
$imagen = array(
    'name' => 'userfile',
);
$submit = array(
    'value' => 'Subir imágen',
);
?>
<div id="modificar_producto">
    
</div>
<table border="1" align="center"> 
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Descripcion/Contenido</th>
            <th>Precio</th>
            <th>Imagen</th>
            <th>Modificar Producto</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($productos as $p): ?>
            <tr>
                <td style="width: 160px;"><?php echo $p['nombre']; ?></td>
                <td><?php echo $p['descripcion']; ?></td>
                <td><?php echo $p['precio']; ?></td>
                <td>
                    <img alt="" src="<?= base_url() . "productos_imagenes/thumbs/" . $p['ruta_imagen'] ?>"/>
                </td>
                <td><button onclick="editar_producto(<?= $p['id_producto']; ?>)">Editar...</button></td>
                <td><button onclick="return confirmar('<?= $p['id_producto']; ?>')">Eliminar</button></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<div id="formulario_imagenes">
    <span><?= validation_errors() ?></span>
    <?php echo form_open_multipart('productos/do_upload'); ?>
    <label>Nombre del Producto:</label><?= form_input($nombre) ?>
    <label>Descripcion/Contenido:</label><?= form_input($descripcion) ?>
    <?= form_upload($imagen) ?>
    <?= form_hidden('token', $token) ?>
    <?= form_submit($submit) ?>
    <?= form_close() ?>
</div>