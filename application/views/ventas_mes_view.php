<table id="tableEdo" ng-table="tableParams" class="table table-condensed table-hover">
    <thead>
        <tr>
            <th>Usuario</th>
            <th>Nombre</th>
            <th>Fecha de Venta</th>
            <th>Total de Venta</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($ventas as $v): ?>
            <tr>
                <td><?= $v["usuario"] ?></td>
                <td><?= $v["Nombre"] ?></td>
                <td><?= $v["fecha_venta"] ?></td>
                <td><?= $v["total"] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>