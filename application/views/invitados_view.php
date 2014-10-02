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
        <tr>
            <?php foreach ($invitados as $i) { ?>
                <td><?=$i['nombre']?></td>
                <td><?=$i['apellido_paterno']?></td>
                <td><?=$i['apellido_materno']?></td>
            <?php } ?>
        </tr>
    </tbody>
</table>