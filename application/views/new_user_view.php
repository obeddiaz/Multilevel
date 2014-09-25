<?php
$nombre = array(
    'name' => 'nombre',
    'id' => 'nombre',
    'placeholder' => 'Nombre',
        //'readonly'=>'readonly',
        //'value'=>'obed'
);
$apellido_pat = array(
    'name' => 'apellido_paterno',
    'id' => 'apellido',
    'placeholder' => 'Apellido Paterno'
);
$apellido_mat = array(
    'name' => 'apellido_materno',
    'id' => 'apellido',
    'placeholder' => 'Apellido Materno'
);
$username = array(
    'name' => 'usuario',
    'id' => 'username',
    'placeholder' => 'Nombre de usuario',
    'onchange'=>'showUser(this.value)'
);
$password = array(
    'name' => 'password',
    'id' => 'password',
    'placeholder' => 'Password'
);
$password_conf = array(
    'name' => 'password_conf',
    'id' => 'password_conf',
    'placeholder' => 'Confirmar Password'
);
$email = array(
    'name' => 'email',
    'id' => 'email',
    'placeholder' => 'Email'
);
$telefono = array(
    'name' => 'telefono',
    'id' => 'telefono',
    'placeholder' => 'XXX-XXX-XXXX'
);
$celular = array(
    'name' => 'celular',
    'id' => 'telefono',
    'placeholder' => 'XXX-XXX-XXXX'
);
$invitado = array(
    'name' => 'invitado',
    'id' => 'invitado',
    'placeholder' => 'Ejemplo: 15'
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
);
?>
<center>
<?= form_open(base_url() . 'index.php/add_user/add_new_user') ?>
<?= form_fieldset('Datos de Usuario','id="datos_usuario"')?>
<?= form_label('Usuario') ?>
<?= form_input($username) ?>
<span id="msgusuario"></span>
<?= form_error('usuario', '<div id="error">', '</div>'); ?>
<?= form_label('Contraseña') ?>
<?= form_password($password) ?>
<span id="msgpassword"></span>
<?= form_error('password', '<div id="error">', '</div>'); ?>
<?= form_label('Confirmar Contraseña') ?>
<?= form_password($password_conf) ?>
<span id="msgpassword_conf"></span>
<?= form_fieldset_close()?>
<?= form_fieldset('Datos Personales','id="datos_usuario"')?>
<?= form_label('Nombre') ?>
<?= form_input($nombre) ?>
<?= form_label('Apellido Paterno') ?>
<?= form_input($apellido_pat) ?>
<?= form_label('Apellido Materno') ?>
<?= form_input($apellido_mat) ?>
<?= form_label('Genero') ?>
<?= form_dropdown('genero', $genero, '', 'id="genero"') ?>
<?= form_label('Estado') ?>
<?= form_dropdown('estados_id_estado', $estados, '', 'id="estado"') ?>
<?= form_label('Email') ?>
<?= form_input($email) ?>
<span id="msgEmail"></span>
<?= form_label('Telefono') ?>
<?= form_input($telefono) ?>
<?= form_label('Fecha de Nacimiento') ?>
<?= form_dropdown('month', $meses, '', 'id="month"') ?>
<?= form_dropdown('day', $day, '', 'id="day"') ?>
<?= form_dropdown('year', $years, '', 'id="year"') ?>
<?= form_fieldset_close()?>
<?= form_hidden('token', $token) ?>
<?= form_submit($submit) ?>
<?= form_close() ?>
<?php
$registrado = $this->session->flashdata('registrado');
if ($registrado) {
    ?>
    <div class="grid_3" id="registro_correcto"><?= $registrado ?></div>
    <?php }
?>
</center>