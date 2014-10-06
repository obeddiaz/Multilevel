<table id="tableEdo" class="table table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Telefono</th>
            <th>Celular</th>
            <th>E-mail</th>
            <th>Inscripcion</th>
            <th>Venta</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($usuarios as $u): ?>
            <tr>
                <td><?= $u['id_usuario'] ?></td>
                <td><img alt="" src="<?= base_url() ?>/usuarios/thumbs/<?= $u["foto"] ?>"/></td>
                <td><?= $u["nombre"] . " " . $u["apellido_paterno"] . " " . $u["apellido_materno"] ?></td>
                <td><?= $u["telefono"] ?></td>
                <td><?= $u["celular"] ?></td>
                <td><?= $u["email"] ?></td>
                <?php
                if ($u["pago_inicial"] == 0) {
                    echo '<td><img alt="" style="width: 25px; height: 25px;" src="' . base_url() . '/images/incorrecto.gif"/></td>';
                } else {
                    echo '<td><img alt="" style="width: 25px; height: 25px;" src="' . base_url() . '/images/correcto.gif"/></td>';
                }
                ?>
                <?php
                if ($u["pago_inicial"] == 0) {
                    ?>
                    <td><button class="btn btn-success" disabled="disabled" onclick="venta(<?= $u['id_usuario']; ?>)">Realizar Venta</button></td>
                <?php } else {
                    ?>
                    <td><button class="btn btn-success" onclick="ventas(<?= $u['id_usuario']; ?>)">Realizar Venta</button></td>
                    <?php
                }
                ?>
                <td>
                    <div class="dropdown">
                        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown">
                            Usuario
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                            <li role="presentation"><a href="<?= base_url() ?>index.php/afiliados/show_user_levels/<?= $u['id_usuario'] ?>"><span class="glyphicon glyphicon-align-justify"></span> Niveles</a></li>
                            <li role="presentation"><a  href="<?= base_url() ?>index.php/inscripcion/nuevo_afiliado_main/<?= $u['id_usuario'] ?>"><span class="glyphicon glyphicon-plus"></span> Nuevo Usuario</a></li>
                            <li  role="presentation"><a onclick="detalles_usuario(<?= $u['id_usuario'] ?>);">Detalles de Usuario</a></li>
                        </ul>
                    </div>
                </td>
                <?php if ($u["pago_inicial"] == 0) { ?>
                    <td><button class="btn btn-success" onclick="confirmar_pago(<?= $u['id_usuario']; ?>)">Confirmar Pago de inscripcion</button></td>
                <?php } ?>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<!--<a href="<?= base_url() ?>index.php/add_user"><img style="height: 50px; width: 50px;" alt="" src="<?= base_url() ?>/images/add.jpg"/></a>-->