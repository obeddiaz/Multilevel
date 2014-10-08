<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Invitados Directos</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-suitcase fa-fw"></i> Mis Invitados
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table id="tableEdo" ng-table="tableParams" class="table table-condensed table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Apellido paterno</th>
                                <th>Apellido Materno</th>
                                <th>Datos de Usuario</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($invitados as $i) { ?>
                                <tr>
                                    <td><?= $i['id_usuario'] ?></td>
                                    <td><?= $i['nombre'] ?></td>
                                    <td><?= $i['apellido_paterno'] ?></td>
                                    <td><?= $i['apellido_materno'] ?></td>
                                    <td><button class='btn btn-info' onclick="javascript:detalles_invitado(<?= $i['id_usuario'] ?>)">Mostrar</button></td>
                                </tr>
                            <?php } ?>

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