<!--<script type="text/javascript" language="javascript" src="<?= base_url() ?>/js/jquery.js"></script>
        <script type="text/javascript" language="javascript" src="<?= base_url() ?>/js/jquery.dataTables.js"></script>
        <script type="text/javascript" charset="utf-8">
                        $(document).ready(function() {
                                $('#example').dataTable();
                        } );
        </script>-->
<center>
    <div id="contenido_texto">
        <?php for ($a = 1; $a <= $niveles; $a++) { ?>
            <?= '<h2>Nivel ' . $a . '</h2>' ?>
            <table border="1" id="niveles">
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
    </div>
</center>