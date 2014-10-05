
<?php
$nombre = array(
    'name' => 'titulo',
    'placeholder' => 'Nombre del Producto',
    'class' => 'form-control'
);
$descripcion = array(
    'name' => 'descripcion',
    'placeholder' => 'Descripcion',
    'class' => 'form-control',
    'style' => 'height: 80px;'
);
$imagen = array(
    'name' => 'userfile',
);
$submit = array(
    'value' => 'Subir Producto',
    'class' => 'btn btn-primary pull-right'
);
?>
<span><?= validation_errors() ?></span>
<?php echo form_open_multipart('productos/do_upload', 'class="form-horizontal"'); ?>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="col-md-9">
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Nombre del Producto:</label>
                <div class="col-sm-10">
                    <?= form_input($nombre) ?>                             
                </div>
            </div>
        </div>
    </div>
    <div class="row-fluid">
        <div class="col-md-9">
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Descripcion</label>
                <div class="col-sm-10">
                    <?= form_textarea($descripcion) ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row-fluid">
        <div class="col-md-9">
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Seleccionar Imagen</label>
                <div class="col-sm-10">
                    <?= form_upload($imagen) ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row-fluid">
        <div class="col-md-12">
            <div class="form-group">
                <div class="col-sm-12">
                    <?= form_hidden('token', $token) ?>
                    <?= form_submit($submit) ?>
                </div>
            </div>
        </div>
    </div>

</div>
<?= form_close() ?>

<h1>Productos Registrados</h1>
<table id="tableEdo" ng-table="tableParams" class="table table-condensed table-hover">
    <thead>
        <tr>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Descripcion/Contenido</th>
            <th>Precio</th>
            <th>Modificar Producto</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($productos as $p): ?>
            <tr>
                <td>
                    <img alt="" src="<?= base_url() . "productos_imagenes/thumbs/" . $p['ruta_imagen'] ?>"/>
                </td>
                <td style="width: 160px;"><?php echo $p['nombre']; ?></td>
                <td><?php echo $p['descripcion']; ?></td>
                <td><?php echo $p['precio']; ?></td>
                <td><button class="btn btn-info" onclick="editar_producto(<?= $p['id_producto']; ?>)">Editar...</button></td>
                <td><button class="btn btn-danger" onclick="return confirmar('<?= $p['id_producto']; ?>')">Eliminar</button></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>