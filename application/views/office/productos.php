
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

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Productos</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-suitcase fa-fw"></i> Nuevo Producto
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
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
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-suitcase fa-fw"></i> Productos Registrados
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
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
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-8 -->
    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->