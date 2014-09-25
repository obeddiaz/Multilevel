<style type="text/css">
    /*los estilos*/
    th{
        background-color: #222;
        color: #fff;
    }
    td{
        padding: 5px 40px 5px 40px;
        background-color: #D0D0D0;
    }
    label{
        display: block; 
    }
    #editar{
        margin: 30px 0px 0px 300px;
        background-color: #D0D0D0;
        border: 3px solid #999;
        width: 500px;
        padding: 20px;
        display: none;
    }
    input[type=text],input[type=email]{
        padding: 5px;
        width: 250px;
    }
    input[type=submit]{
        padding: 4px 15px 4px 15px;
        background-color: #123;
        border-radius: 4px;
        color: #ddd;
    }
    #actualizadoCorrectamente{
        padding: 5px;
        background-color: #005702;
        color: #fff;
        font-weight: bold;
        text-align: center;
    }
</style>
<?php
foreach ($edicion as $e):
    // echo $e['id_usuario'];
    $nombre = array(
        'name' => 'nombre',
        'id' => 'nombre',
        'value' => $e['nombre']
    );
    $id_usuario = array(
        'name' => 'nombre',
        'id' => 'nombre',
        'readonly' => 'readonly',
        'value' => $e['id_usuario']
    );
    $email = array(
        'name' => 'email',
        'id' => 'email',
        'value' => $e['email']
    );
    $apellido_pat = array(
        'name' => 'apellido_paterno',
        'id' => 'email',
        'value' => $e['apellido_paterno']
    );
    $apellido_mat = array(
        'name' => 'apellido_materno',
        'id' => 'email',
        'value' => $e['apellido_materno']
    );
    $telefono = array(
        'name' => 'telefono',
        'id' => 'email',
        'value' => $e['telefono']
    );
    $celular = array(
        'name' => 'celular',
        'id' => 'email',
        'value' => $e['celular']
    );
    $fecha_nacimiento = array(
        'name' => 'fecha_nacimiento',
        'id' => 'email',
        'value' => $e['fecha_nacimiento']
    );
    $submit = array(
        'id' => 'editando',
        'value' => 'Guardar mis datos'
    );
endforeach;
?>
<?= form_open(base_url() . 'index.php/modificar/actualizar_datos') ?>
<?= form_label('Mi Id de Usuario') ?>
<?= form_input($id_usuario) ?>
<?= form_label('Nombre') ?>
<?= form_input($nombre) ?>
<?= form_label('Apellido Paterno') ?>
<?= form_input($apellido_pat) ?>
<?= form_label('Apellido Materno') ?>
<?= form_input($apellido_mat) ?>
<?= form_label('Fecha de Nacimiento') ?>
<?= form_input($fecha_nacimiento) ?>
<?= form_label('Telefono') ?>
<?= form_input($telefono) ?>
<?= form_label('Celular') ?>
<?= form_input($celular) ?>
<?= form_label('Email') ?>
<?= form_input($email) ?>
<?= form_hidden('token', $token) ?>
<?= form_submit($submit) ?>
<?php
if ($this->session->flashdata('actualizado')) {
    echo "<script>";
    echo "$(document).ready(function() {";
    echo 'jAlert("' . $this->session->flashdata('actualizado') . '","!Modificación correcta¡");';
    echo "});";
    echo "</script>";
}
?>