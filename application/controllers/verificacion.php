<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 
 */
class Verificacion extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database('default');
        $this->load->model('inscripcion_model');
        $this->load->model('usuarios_model');
        $this->load->model('imagen_producto_model');
        $this->load->library(array('session'));
        $this->load->helper(array('url'));
        $this->load->library(array('session', 'form_validation'));
    }

    public function comprobar_usuario_ajax() {
        $username = $this->input->post('username');
        $comprobar_username = $this->inscripcion_model->verifica_username($username);
        if ($comprobar_username == $username) {
            echo "<span style='color:red'>Usuario no disponible</span>";
        } else {
            echo "<span style='color:green'>Usuario disponible</span>";
        }
    }

    public function comprobar_email_ajax() {
        $email = $this->input->post('email');
        $comprobar_email = $this->inscripcion_model->verifica_email($email);
        if ($comprobar_email == $email) {
            echo "<span style='color:red'>Email no disponible</span>";
        } else {
            echo "<span style='color:green'>Email disponible</span>";
        }
    }

    public function comprobar_datos_usuario_ajax() {
        $id_usuario = $this->input->post('invitado');
        $comprobar_usuario = $this->inscripcion_model->verifica_nombre_usuario($id_usuario);
        if ($comprobar_usuario) {
            $user = $comprobar_usuario;
            $exist = true;
        } else {
            $user = "El id de este usuario no existe";
            $exist = false;
        }
        ?>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">Verificar Usuario</h4>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row-fluid">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <p class="lead"><?= $user ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
        <?php
    }

    public function obtener_producto() {
        $id_producto = $this->input->post('producto');
        $producto = $this->imagen_producto_model->obtener_producto($id_producto);
        $nombre = array(
            'name' => 'nombre',
            'placeholder' => 'Nombre de la imagen',
            'value' => $producto->nombre,
            'class' => 'form-control'
        );
        $descripcion = array(
            'name' => 'descripcion',
            'placeholder' => 'Descripcion',
            'value' => $producto->descripcion,
            'class' => 'form-control',
            'style' => 'resize: none;'
        );
        $imagen = array(
            'name' => 'userfile'
        );
        $precio = array(
            'name' => 'precio',
            'value' => $producto->precio,
            'class' => 'form-control'
        );
        $submit = array(
            'value' => 'Modificar Producto',
            'class' => 'btn btn-primary'
        );
        $id = $producto->id_producto;
        $token = $this->token();
        $imagen_pasada = $producto->ruta_imagen;
        ?>
        <?= form_open_multipart('productos/modificar', 'class="form-horizontal"') ?>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">Producto: <?= $nombre['value'] ?></h4>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row-fluid">
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Nombre</label>
                                    <div class="col-sm-10">
                                        <?= form_input($nombre) ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Precio</label>
                                    <div class="col-sm-10">
                                        <?= form_input($precio) ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Precio</label>
                                    <div class="col-sm-10">
                                        <?= form_textarea($descripcion) ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="col-md-3">
                                <div class="row">
                                    <div class="thumbnail">
                                        <img alt="" src="<?= base_url() . "productos_imagenes/thumbs/" . $producto->ruta_imagen ?>"/>
                                        <div class="caption">
                                            <span class="btn btn-success btn-file">
                                                Imagen <?= form_upload($imagen) ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <?= form_hidden('id_producto', $id) ?>
                    <?= form_hidden('imagen_pasada', $imagen_pasada) ?>
                    <?= form_hidden('token', $token) ?>
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
                    <?= form_submit($submit) ?>
                </div>
            </div>
        </div>
        <?= form_close() ?>
        <?php
    }

    public function usuario() {
        $token = $this->token();
        $submit = array(
            'value' => 'Realizar Venta',
        );
        $cantidad = array(
            'name' => 'cantidad',
            'placeholder' => 'Cantidad',
            'value' => 1,
            'style' => 'width:10px;'
        );
        $this->load->model('productos_model');
        $id_usuario = $this->input->post('usuario');
        $usaurio = $this->usuarios_model->imagen_usuario($id_usuario);
        //var_dump($usaurio);
        $productos = $this->productos_model->obtener();
        foreach ($productos as $p) {
            $productos_select[$p['id_producto']] = $p['nombre'];
        }
        //var_dump($productos_select);
        echo '<p style="font-size: 24px;">' . $usaurio->nombre . ' ' . $usaurio->apellido_paterno . ' ' . $usaurio->apellido_materno . '</p>';
        echo "<table border='1'><tr><td>" . '<img alt="" src="' . base_url() . "usuarios/thumbs/" . $usaurio->foto . '"/></td><td>';
        echo form_open_multipart('productos/modificar');
        echo form_dropdown('productos', $productos_select) . form_input($cantidad);
        echo form_hidden('token', $token);
        echo form_submit($submit);
        echo form_close();
        echo "</td></tr></table>";
    }

    public function token() {
        $token = md5(uniqid(rand(), true));
        $this->session->set_userdata('token', $token);
        return $token;
    }

    public function detalles_producto() {
        $id_producto = $this->input->post('producto');
        $p = $this->imagen_producto_model->obtener_producto($id_producto);
        ?>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">Producto: <?= $p->nombre . ' $' . $p->precio ?></h4>
                </div>
                <div class="modal-body">
                    <div class="row-fluid">
                        <div class="col-md-3">
                            <div class="row">
                                <div class="thumbnail">
                                    <img alt = "" src = "<?= base_url() . 'productos_imagenes/thumbs/' . $p->ruta_imagen ?>"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="row-fluid">
                            <div class="col-md-9">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <?= $p->descripcion ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
        <?php
    }

    public function comprobar_pago($user_id) {
        $this->usuarios_model->confirmar_pago($user_id);
        $url = base_url() . 'index.php/show_usuarios';
        header('Location:' . $url);
    }

    public function obtener_datos_producto() {
        $id_producto = $this->input->post('producto');
        $cantidad = $this->input->post('cantidad');
        $p = $this->imagen_producto_model->obtener_producto($id_producto);
        $total = ($p->precio) * $cantidad;
        echo "<tr id='product_added' class='total'><td>" . $p->nombre . '</td><td>$ ' . $p->precio . '</td><td>' . $cantidad . '</td><td>' . $total . '</td><td style="display:none;">' . $id_producto . '</td><td style="display:none;">' . form_hidden("id_producto[]", $id_producto) . form_hidden("precio[]", $p->precio) . form_hidden("cantidad[]", $cantidad) . '</td></tr>';
    }

    function nueva_venta() {
        $this->load->model('ventas_model');
        $this->ventas_model->nueva_venta($this->input->post());
        var_dump($this->input->post());
        //echo date('Y-m-d');
    }

    public function detalles_de_usuario() {
        $id_usuario = $this->input->post('id_usuario');
        $p = $this->usuarios_model->obtener_usuario($id_usuario);
        $cuenta = $this->usuarios_model->get_cuenta_usuario($id_usuario);
        $submit = array(
            'value' => 'Modificar Usuario',
            'class' => 'btn btn-primary'
        );
        $token = $this->token();
        ?>

        <div class="modal-dialog">
            <div class="modal-content">
                <?= form_open_multipart('office/my_office/modificar', 'class="form-horizontal"') ?>
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">Usuario</h4>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row-fluid">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Nombre</label>
                                    <div class="col-sm-10">
                                        <input type="text" value="<?= $p->nombre . ' ' . $p->apellido_paterno . ' ' . $p->apellido_materno ?> " disabled="disabled" class="form-control">                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="text" value="<?= $p->email ?> " disabled="disabled" class="form-control">                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Telefono</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="usuarios[telefono]" value="<?= $p->telefono ?>" class="form-control">                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Celular</label>
                                    <div class="col-sm-10">
                                        <input name="usuarios[celular]" type="text" value="<?= $p->celular ?>" class="form-control">                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">RFC</label>
                                    <div class="col-sm-10">
                                        <input name="usuarios[RFC]" type="text" value="<?= $p->RFC ?>" class="form-control">                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">IFE</label>
                                    <div class="col-sm-10">
                                        <input name="usuarios[IFE]" type="text" value="<?= $p->IFE ?>" class="form-control">                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Cuenta Bancaria</label>
                                    <div class="col-sm-10">
                                        <?php if ($cuenta) { ?>
                                            <input name="datos_cuenta[cuenta]" type="text" value="<?= $cuenta->cuenta ?>" class="form-control">
                                        <?php } else { ?>
                                            <input name="datos_cuenta[cuenta]" type="text" value="" class="form-control">
                                        <?php } ?>                                
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Clave InerBancaria</label>
                                    <div class="col-sm-10">
                                        <?php if ($cuenta) { ?>
                                            <input name="datos_cuenta[clave]" type="text" value="<?= $cuenta->clave ?>" class="form-control"> 
                                        <?php } else { ?>
                                            <input name="datos_cuenta[clave]" type="text" value="" class="form-control"> 
                                        <?php } ?>   

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <?= form_hidden('userid', $id_usuario) ?>
                    <?= form_hidden('token', $token) ?>
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
                    <?= form_submit($submit) ?>
                </div>
                <?= form_close() ?>
            </div>
        </div>

        <?php
    }

    public function detalles_de_invitado() {
        $id_usuario = $this->input->post('id_usuario');
        $p = $this->usuarios_model->obtener_usuario($id_usuario);
        ?>
        <div class="modal-dialog form-horizontal">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">Usuario</h4>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row-fluid">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Nombre</label>
                                    <div class="col-sm-10">
                                        <input type="text" value="<?= $p->nombre . ' ' . $p->apellido_paterno . ' ' . $p->apellido_materno ?> " disabled="disabled" class="form-control">                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="text" value="<?= $p->email ?> " disabled="disabled" class="form-control">                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Telefono</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="usuarios[telefono]" value="<?= $p->telefono ?>"  disabled="disabled" class="form-control">                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Celular</label>
                                    <div class="col-sm-10">
                                        <input name="usuarios[celular]" type="text" value="<?= $p->celular ?>"  disabled="disabled" class="form-control">                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
        <?php
    }

}
