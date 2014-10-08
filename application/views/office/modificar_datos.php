<?php
foreach ($edicion as $e):
    $nombre = array(
        'name' => 'nombre',
        'id' => 'nombre',
        'value' => $e['nombre'],
        'class' => 'form-control'
    );
    $id_usuario = array(
        'name' => 'nombre',
        'id' => 'nombre',
        'readonly' => 'readonly',
        'value' => $e['id_usuario'],
        'class' => 'form-control'
    );
    $email = array(
        'name' => 'email',
        'id' => 'email',
        'value' => $e['email'],
        'class' => 'form-control'
    );
    $apellido_pat = array(
        'name' => 'apellido_paterno',
        'id' => 'email',
        'value' => $e['apellido_paterno'],
        'class' => 'form-control'
    );
    $apellido_mat = array(
        'name' => 'apellido_materno',
        'id' => 'email',
        'value' => $e['apellido_materno'],
        'class' => 'form-control'
    );
    $telefono = array(
        'name' => 'telefono',
        'id' => 'email',
        'value' => $e['telefono'],
        'class' => 'form-control'
    );
    $celular = array(
        'name' => 'celular',
        'id' => 'email',
        'value' => $e['celular'],
        'class' => 'form-control'
    );
    $fecha_nacimiento = array(
        'name' => 'fecha_nacimiento',
        'id' => 'email',
        'value' => $e['fecha_nacimiento'],
        'class' => 'form-control'
    );
    $submit = array(
        'id' => 'editando',
        'value' => 'Guardar mis datos',
        'class' => 'btn btn-primary'
    );
endforeach;
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Afiliados</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <?= form_open(base_url() . 'index.php/office/my_office/actualizar_datos', 'class="form-horizontal"') ?>
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-suitcase fa-fw"></i> Mis Datos
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <form action="<?= base_url() . 'index.php/inscripcion/alta_inscripcion' ?>" method="post" accept-charset="utf-8" class="form-horizontal"> 
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Id Usuario</label>
                            <div class="col-sm-10">
                                <?= form_input($id_usuario) ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Nombre</label>
                            <div class="col-sm-10">
                                <?= form_input($nombre) ?>

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Apellido Paterno</label>
                            <div class="col-sm-10">
                                <?= form_input($apellido_pat) ?>

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Apellido Materno</label>
                            <div class="col-sm-10">
                                <?= form_input($apellido_mat) ?>

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Fecha de Nacimiento</label>
                            <div class="col-sm-10">
                                <?= form_input($fecha_nacimiento) ?>

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Telefono</label>
                            <div class="col-sm-10">
                                <?= form_input($telefono) ?>

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Celular</label>
                            <div class="col-sm-10">
                                <?= form_input($celular) ?>

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">e-mail</label>
                            <div class="col-sm-10">
                                <?= form_input($email) ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <?= form_hidden('token', $token) ?>
                                <?= form_submit($submit) ?>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <?= form_close() ?>
        <!-- /.col-lg-8 -->
    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->
<?php
if ($this->session->flashdata('actualizado')) {
    echo "<script>";
//    echo "$(document).ready(function() {";
//    echo 'jAlert("' . $this->session->flashdata('actualizado') . '","!Modificación correcta¡");';
//    echo "});";
    ?>
alert('Datos Actualizados Correctamente');
        <?php
    echo "</script>";
}
?>