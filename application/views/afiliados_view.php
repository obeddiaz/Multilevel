<a class="btn btn-warning" href='/index.php/inscripcion/nuevo_afiliado'><div>Nuevo Usuario</div></a>

<?php for ($a = 1; $a <= $niveles; $a++) { ?>
    <table id="tableEdo" ng-table="tableParams" class="table table-condensed table-hover">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido paterno</th>
                <th>Apellido Materno</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach (${"afiliados$a"} as $afi): ?>
                <tr>
                    <td><?php echo $afi["nombre"]; ?></td>
                    <td><?php echo $afi["apellido_paterno"]; ?></td>
                    <td><?php echo $afi["apellido_materno"] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php } ?>