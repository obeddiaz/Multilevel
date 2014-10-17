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
                <div id="contactCard">
                    <div class="panel panel-default">
                        <div class="panel-heading clearfix">
                            <h3 class="panel-title pull-left">Detalles de usuario</h3>
                            <div class="btn-group pull-right visible-xs">
                                <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#">
                                    <i class="fa fa-pencil"></i>
                                    <span>Edit</span>
                                </a>
                            </div>	
                            <a class="btn btn-primary pull-right hidden-xs" href="/contacts/VBMJHwcLX3Vx/edit" data-toggle="modal" data-target="#editModal">
                                <i class="fa fa-pencil"></i>
                                <span>Editar</span>
                            </a>
                        </div>
                        <div class="list-group">
                            <div class="list-group-item">
                                <label>Usuario</label>
                                <h4 class="list-group-item-heading"><?= $usuario->usuario ?></h4>
                            </div>
                            <div class="list-group-item">
                                <label>Nombre</label>
                                <h4 class="list-group-item-heading"><?= $usuario->nombre.' '.$usuario->apellido_paterno.' '.$usuario->apellido_materno ?></h4>
                            </div>
                            <div class="list-group-item">
                                <label>Telefono</label>
                                <h4 class="list-group-item-heading"><?= $usuario->telefono ?></h4>
                            </div>
                            <div class="list-group-item">
                                <label>Celular</label>
                                <h4 class="list-group-item-heading"><?= $usuario->celular ?></h4>
                            </div>
                            <?php if ($patrocinador){ ?>
                                <div class="list-group-item">
                                    <label>Patrocinador</label>
                                    <h4 class="list-group-item-heading"><?= $patrocinador->nombre.' '.$patrocinador->apellido_paterno.' '.$patrocinador->apellido_materno ?></h4>
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