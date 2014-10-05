<?php
//var_dump($i);
//}
?>
<table id="tableEdo" ng-table="tableParams" class="table table-condensed table-hover">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Apellido paterno</th>
            <th>Apellido Materno</th>
        </tr>
    </thead>
    <tbody>

        <?php foreach ($invitados as $i) { ?>
            <tr>
                <td><?= $i['nombre'] ?></td>
                <td><?= $i['apellido_paterno'] ?></td>
                <td><?= $i['apellido_materno'] ?></td>
            </tr>
        <?php } ?>

    </tbody>
</table>