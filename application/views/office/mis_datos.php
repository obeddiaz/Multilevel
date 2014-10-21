<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Datos Personales</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel-default">
                <?php if ($this->session->flashdata('password_incorrecto')) { ?>
                    <div class="alert alert-danger" role="alert">
                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <strong>Error!</strong> <?= $this->session->flashdata('password_incorrecto') ?>
                    </div>
                <?php } ?>
                <?php if ($this->session->flashdata('cambio_correcto')) { ?>
                    <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <?= $this->session->flashdata('cambio_correcto') ?>
                    </div>
                <?php } ?>

                <div id="contactCard">
                    <div class="panel panel-default">
                        <div class="panel-heading clearfix">
                            <h3 class="panel-title pull-left">Detalles de usuario</h3>
                            <div class="pull-right" style="margin-left: 2px; margin-right: 2px;">
                                <a class="btn btn-primary hidden-xs" href="<?= base_url() ?>index.php/office/my_office/modificar_datos">
                                    <i class="fa fa-pencil"></i>
                                    <span>Editar</span>
                                </a>
                            </div>
                            <div class="pull-right" style="margin-left: 2px; margin-right: 2px;">
                                <button class="btn btn-primary hidden-xs" onclick="javascript:cambio_password(<?= $usuario->id_usuario ?>);">
                                    <i class="fa fa-pencil"></i>
                                    <span>Cambiar contraseña</span>
                                </button>
                            </div>
                        </div>
                        <div class="list-group">
                            <div class="list-group-item">
                                <label>Usuario</label>
                                <h4 class="list-group-item-heading"><?= $usuario->usuario ?></h4>
                            </div>
                            <div class="list-group-item">
                                <label>Nombre</label>
                                <h4 class="list-group-item-heading"><?= $usuario->nombre . ' ' . $usuario->apellido_paterno . ' ' . $usuario->apellido_materno ?></h4>
                            </div>
                            <div class="list-group-item">
                                <label>Telefono</label>
                                <h4 class="list-group-item-heading"><?= $usuario->telefono ?></h4>
                            </div>
                            <div class="list-group-item">
                                <label>Celular</label>
                                <h4 class="list-group-item-heading"><?= $usuario->celular ?></h4>
                            </div>
                            <?php if ($patrocinador) { ?>
                                <div class="list-group-item">
                                    <label>Patrocinador</label>
                                    <h4 class="list-group-item-heading"><?= $patrocinador->nombre . ' ' . $patrocinador->apellido_paterno . ' ' . $patrocinador->apellido_materno ?></h4>
                                </div>
                            <?php } ?>
                            <div class="list-group-item">
                                <label>Ganancias</label>
                                <h4 class="list-group-item-heading">$ En desarrollo</h4>
                            </div>
                        </div>		
                    </div>

                </div>
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-8 -->
    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->