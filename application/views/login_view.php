<?php
$username = array('name' => 'username', 'placeholder' => 'Nombre de usuario');
$password = array('name' => 'password', 'placeholder' => 'Introduce tu password');
$submit = array('name' => 'submit', 'value' => 'Iniciar sesión', 'title' => 'Iniciar sesión');
?>
<?= form_open(base_url() . 'index.php/login/new_user') ?>
<label for="username">Nombre de usuario:</label>
<center><?= form_input($username) ?><p><?= form_error('username') ?></p></center>
<label for="password">Password:</label>
<center><?= form_password($password) ?><p><?= form_error('password') ?></p></center>
<?= form_hidden('token', $token) ?>
<?= form_submit($submit) ?>
<?= form_close() ?>
<?php
if ($this->session->flashdata('usuario_incorrecto')) {
    ?>
    <p><?= $this->session->flashdata('usuario_incorrecto') ?></p>
    <?php
}
if ($this->session->flashdata('pago_inicial')) {
    ?>
    <?php
    echo "<script>";
    echo "$(document).ready(function() {";
    echo 'jAlert("'.$this->session->flashdata('pago_inicial').'","Lo sentimos :(");';
    echo "});";
    echo "</script>";
    ?>
    <?php
}
?>