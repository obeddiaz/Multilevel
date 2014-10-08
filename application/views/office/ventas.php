<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Ventas</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-suitcase fa-fw"></i> Ventas del Mes
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table id="tableEdo" ng-table="tableParams" class="table table-condensed table-hover">
                        <thead>
                            <tr>
                                <th>Usuario</th>
                                <th>Nombre</th>
                                <th>Fecha de Venta</th>
                                <th>Total de Venta</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($ventas as $v): ?>
                                <tr>
                                    <td><?= $v["usuario"] ?></td>
                                    <td><?= $v["Nombre"] ?></td>
                                    <td><?= $v["fecha_venta"] ?></td>
                                    <td><?= $v["total"] ?></td>
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