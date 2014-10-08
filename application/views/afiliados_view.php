<div class="row-fluid">
    <div class="col-md-4">
        <a class="btn btn-warning" href='/index.php/inscripcion/nuevo_afiliado'><div>Nuevo Usuario</div></a>
    </div>
    <div class="col-md-8">
        <div class="col-md-3">
            <label>Link para compartir:</label>
        </div>
        <div class="col-md-9">
            <input class="form-control" value="<?= base_url() . 'index.php/inscripcion?u=' . $compartir ?>"/>
        </div>
    </div>
</div>

<?php for ($a = 1; $a <= $niveles; $a++) { ?>
    <table id="tableEdo" ng-table="tableParams" class="table table-condensed table-hover">
        <thead>
            <tr>
                <th style="width: 33%;">Nombre</th>
                <th style="width: 33%;">Apellido paterno</th>
                <th style="width: 33%;">Apellido Materno</th>
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