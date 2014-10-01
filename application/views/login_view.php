<?php
$username = array('name' => 'username', 'placeholder' => 'Nombre de usuario', 'class' => 'form-control input-lg');
$password = array('name' => 'password', 'placeholder' => 'Introduce tu password', 'class' => 'form-control input-lg');
$submit = array('name' => 'submit', 'value' => 'Iniciar sesión', 'title' => 'Iniciar sesión', 'class' => 'btn btn-primary btn-lg btn-block');
?>
<?= form_open(base_url() . 'index.php/login/new_user') ?>
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header" style="border-bottom: 0px;">
        </div>
        <div class="modal-body">
            <form class="form col-md-12 center-block">
                <div class="form-group">
                    <?= form_input($username) ?>
                </div>
                <div class="form-group">
                    <?= form_password($password) ?>
                </div>
                <div class="form-group">
                    <?= form_hidden('token', $token) ?>
                    <?php
                    if ($this->session->flashdata('usuario_incorrecto')) {
                        ?>
                        <div class="alert alert-danger" role="alert">
                            <strong>Oh!</strong> Usuario o contraseña incorrectos.
                        </div>
                        <?php
                    }
                    if ($this->session->flashdata('pago_inicial')) {
                        ?>
                        <div class="alert alert-danger" role="alert">
                            <strong>Oh!</strong> <?=$this->session->flashdata('pago_inicial');?>
                        </div>
                        <?php
                    }
                    ?>

                    <?= form_submit($submit) ?>
                    <span class="pull-right"><a href="/index.php/inscripcion"><div>Inscripcion</div></a></span>
                </div>
            </form>
        </div>
        <div class="modal-footer" style="border-top: 0px;">
        </div>
    </div>
</div>
<?= form_close() ?>