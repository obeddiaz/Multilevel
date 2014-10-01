<?php
$nombre = array(
    'name' => 'nombre',
    'id' => 'nombre',
    'placeholder' => 'Nombre',
    'class' => 'form-control'
);
$apellido_pat = array(
    'name' => 'apellido_paterno',
    'id' => 'apellido',
    'placeholder' => 'Apellido Paterno',
    'class' => 'form-control'
);
$apellido_mat = array(
    'name' => 'apellido_materno',
    'id' => 'apellido',
    'placeholder' => 'Apellido Materno',
    'class' => 'form-control'
);
$username = array(
    'name' => 'usuario',
    'id' => 'username',
    'placeholder' => 'Nombre de usuario',
    'onchange' => 'showUser(this.value)',
    'class' => 'form-control'
);
$password = array(
    'name' => 'password',
    'id' => 'password',
    'placeholder' => 'Password',
    'class' => 'form-control'
);
$password_conf = array(
    'name' => 'password_conf',
    'id' => 'password_conf',
    'placeholder' => 'Confirmar Password',
    'class' => 'form-control'
);
$email = array(
    'name' => 'email',
    'id' => 'email',
    'placeholder' => 'Email',
    'class' => 'form-control'
);
$telefono = array(
    'name' => 'telefono',
    'id' => 'telefono',
    'placeholder' => 'XXX-XXX-XXXX',
    'class' => 'form-control'
);
$celular = array(
    'name' => 'celular',
    'id' => 'telefono',
    'placeholder' => 'XXX-XXX-XXXX',
    'class' => 'form-control'
);
$invitado = array(
    'name' => 'invitado',
    'id' => 'invitado',
    'placeholder' => 'Ejemplo: 15',
    'class' => 'form-control'
);
$id_verificar = array(
    'name' => 'verificar_usuario',
    'id' => 'id_verificar',
    'value' => 'Verificar',
);
$meses = array(
    'FALSE' => 'Mes',
    '01' => 'Enero',
    '02' => 'Febrero',
    '03' => 'Marzo',
    '04' => 'Abril',
    '05' => 'Mayo',
    '06' => 'Junio',
    '07' => 'Julio',
    '08' => 'Agosto',
    '09' => 'Septiembre',
    '10' => 'Octubre',
    '11' => 'Noviembre',
    '12' => 'Diciembre',
);
$start_year = date("Y") - 75; //Adjust 100 to however many year back you want
$years['FALSE'] = 'Año';
for ($i = $start_year; $i <= date("Y") - 10; $i++) {
    $years[$i] = $i;
}
$day['FALSE'] = 'Dia';
for ($i = 0; $i <= 31; $i++) {
    $day[$i] = $i;
}
$genero['FALSE'] = 'Genero';
$genero = array(
    '1' => 'Hombre',
    '2' => 'Mujer',
);
$submit = array(
    'value' => 'Registrar',
    'name' => 'registro',
    'id' => 'registro',
    'class' => 'btn btn-success'
);
?>
<form action="<?= base_url() . 'index.php/add_user/add_new_user' ?>" method="post" accept-charset="utf-8" class="form-horizontal"> 
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Usuario</label>
        <div class="col-sm-10">
            <?= form_input($username) ?>
            <span id="msgusuario"></span>
            <?= form_error('usuario', '<div id="error">', '</div>'); ?>
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Contraseña</label>
        <div class="col-sm-10">
            <?= form_password($password) ?>
            <span id="msgpassword"></span>
            <?= form_error('password', '<div id="error">', '</div>'); ?>
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Confirmar Contraseña</label>
        <div class="col-sm-10">
            <?= form_password($password_conf) ?>
            <span id="msgpassword_conf"></span>
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
        <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
        <div class="col-sm-10">
            <?= form_input($email) ?>
            <span id="msgEmail"></span>
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Estado</label>
        <div class="col-sm-10">
            <?= form_dropdown('estados_id_estado', $estados, '', 'id="estado"') ?>
        </div>
    </div>

    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Fecha de nacimiento</label>
        <div class="col-sm-10">
            <?= form_dropdown('month', $meses, '', 'id="month"') ?>
            <?= form_dropdown('day', $day, '', 'id="day"') ?>
            <?= form_dropdown('year', $years, '', 'id="year"') ?>
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Genero</label>
        <div class="col-sm-10">
            <?= form_dropdown('genero', $genero, '', 'id="genero"') ?>
        </div>
    </div>
     
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <?= form_hidden('token', $token) ?>
            <?= form_submit($submit) ?>
        </div>
    </div>
</form>
<?php
$registrado = $this->session->flashdata('registrado');
if ($registrado) {
    ?>
    <div class="grid_3" id="registro_correcto"><?= $registrado ?></div>
<?php }
?>