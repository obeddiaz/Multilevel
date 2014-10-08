<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Usuarios</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-user fa-fw"></i> Usuarios
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table id="tableEdo" class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Imagen</th>
                                <th>Nombre</th>
                                <th>Inscripcion</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($usuarios as $u): ?>
                                <tr>
                                    <td><?= $u['id_usuario'] ?></td>
                                    <td><img alt="" src="<?= base_url() ?>/usuarios/thumbs/<?= $u["foto"] ?>"/></td>
                                    <td><?= $u["nombre"] . " " . $u["apellido_paterno"] . " " . $u["apellido_materno"] ?></td>
                                    <?php
                                    if ($u["pago_inicial"] == 0) {
                                        echo '<td><img alt="" style="width: 25px; height: 25px;" src="' . base_url() . '/images/incorrecto.gif"/></td>';
                                    } else {
                                        echo '<td><img alt="" style="width: 25px; height: 25px;" src="' . base_url() . '/images/correcto.gif"/></td>';
                                    }
                                    ?>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown">
                                                Usuario
                                                <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                                                <li role="presentation"><a href="<?= base_url() ?>index.php/afiliados/show_user_levels/<?= $u['id_usuario'] ?>"><span class="glyphicon glyphicon-align-justify"></span> Niveles</a></li>
                                                <li role="presentation"><a  href="<?= base_url() ?>index.php/inscripcion/nuevo_afiliado_main/<?= $u['id_usuario'] ?>"><span class="glyphicon glyphicon-plus"></span> Nuevo Usuario</a></li>
                                                <li  role="presentation"><a href="javascript:detalles_usuario(<?= $u['id_usuario'] ?>);">Detalles de Usuario</a></li>
                                                <?php
                                                if ($u["pago_inicial"] == 0) {
                                                    ?>
                                                    <li  role="presentation"><a disabled="disabled" href="javascript:confirmar_pago(<?= $u['id_usuario']; ?>);">Confirmar Inscripcion</a></li>
                                                <?php } else {
                                                    ?>
                                                    <li  role="presentation"><a href="javascript:ventas(<?= $u['id_usuario']; ?>);">Realizar Venta</a></li>
                                                    <?php
                                                }
                                                ?>
                                            </ul>
                                        </div>
                                    </td>
                                    <?php if ($u["pago_inicial"] == 0) { ?>
                        <!--                    <td><button class="btn btn-success" onclick="confirmar_pago(<?= $u['id_usuario']; ?>)">Confirmar Pago de inscripcion</button></td>-->
                                    <?php } ?>
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