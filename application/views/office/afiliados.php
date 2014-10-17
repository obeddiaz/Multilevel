<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Afiliados</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-suitcase fa-fw"></i> Usuarios
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="row-fluid">
                        <div class="col-md-4">
                            <a class="btn btn-warning" href='/index.php/inscripcion/nuevo_afiliado'><div>Nuevo Usuario</div></a>
                        </div>
                        <div class="col-md-8">
                            <div class="col-md-3">
                                <label>Link para compartir:</label>
                            </div>
                            <div class="col-md-9">
                                <input class="form-control" value="<?= base_url() . 'index.php/inscripcion?u=' . $compartir ?>"/>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
            <?php for ($a = 1; $a <= $niveles; $a++) { ?>
                <?php if (${"afiliados$a"}) { ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-suitcase fa-fw"></i> Afiliados a mi cuenta (Nivel: <?= $a ?>)
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table id="tableEdo" ng-table="tableParams" class="table table-condensed table-hover">
                                <thead>
                                    <tr>
                                        <th style="width: 4%;">#</th>
                                        <th style="width: 4%;">Patrocinador</th>
                                        <th style="width: 32%;">Nombre</th>
                                        <th style="width: 32%;">Apellido paterno</th>
                                        <th style="width: 32%;">Apellido Materno</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach (${"afiliados$a"} as $afi): ?>
                                        <tr>
                                            <td><?= $afi['id_usuario'] ?></td>
                                            <td><?= $afi['patrocinador'] ?></td>
                                            <td><?php echo $afi["nombre"]; ?></td>
                                            <td><?php echo $afi["apellido_paterno"]; ?></td>
                                            <td><?php echo $afi["apellido_materno"] ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                <?php } ?>
            <?php } ?>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-8 -->
    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->