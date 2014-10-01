<table id="tableEdo" ng-table="tableParams" class="table table-condensed table-hover">
    <thead>
        <tr>
            <th>Foto</th>
            <th>Nombre y apellidos</th>
            <th>Telefono</th>
            <th>Celular</th>
            <th>E-mail</th>
            <th>Inscripcion</th>
            <th>Ventas</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($usuarios as $u): ?>
            <tr>
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

                <?php if ($u["pago_inicial"] == 0) { ?>
                    <td><button class="btn btn-success" onclick="confirmar_pago(<?= $u['id_usuario']; ?>)">Confirmar Pago de inscripcion</button></td>
                    <?php
                }
                ?>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<a href="<?= base_url() ?>index.php/add_user"><img style="height: 50px; width: 50px;" alt="" src="<?= base_url() ?>/images/add.jpg"/></a>