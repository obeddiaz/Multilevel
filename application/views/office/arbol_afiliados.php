    <script type="text/javascript">
        $(function () {
            $('.tree li:has(ul)').addClass('parent_li').find(' > span').attr('title', 'Collapse this branch');
            $('.tree li.parent_li > span').on('click', function (e) {
                var children = $(this).parent('li.parent_li').find(' > ul > li');
                if (children.is(":visible")) {
                    children.hide('fast');
                    $(this).attr('title', 'Expand this branch').find(' > i').addClass('icon-plus-sign').removeClass('icon-minus-sign');
                } else {
                    children.show('fast');
                    $(this).attr('title', 'Collapse this branch').find(' > i').addClass('icon-minus-sign').removeClass('icon-plus-sign');
                }
                e.stopPropagation();
            });
        });
    </script>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Arbol de Afiliados</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="row-fluid">
                <span class="badge alert-info" title="Collapse this branch"> Nivel 1</span>
                <span class="badge alert-success" title="Collapse this branch"> Nivel 2</span>
                <span class="badge alert-danger" title="Collapse this branch"> Nivel 3</span>
                <span class="badge alert-warning" title="Collapse this branch"> Nivel 4</span>
                <?php $a = 1; //for ($a = 1; $a <= $niveles; $a++) { ?>
                <?php if (${"afiliados$a"}) { ?>
                    <div class="tree well">
                        <ul>
                            <?php foreach (${"afiliados$a"} as $afi): ?>
                                <?php $a = 1; ?>
                                <li>
                                    <span class="badge alert-info"><i class="icon-folder-open"></i> <?= $afi["nombre"] . ' ' . $afi["apellido_paterno"] . ' ' . $afi["apellido_materno"] ?></span> <button class="btn btn-default btn-xs" onclick="javascript:detalles_invitado(<?= $afi['id_usuario'] ?>)">Mostrar</button>
                                    <?php $a++; ?>
                                    <?php if (${"afiliados$a"}) { ?>
                                        <ul>
                                            <?php foreach (${"afiliados$a"} as $afi2): ?>
                                                <?php $a = 2; ?>
                                                <?php if ($afi['id_usuario'] == $afi2['patrocinador']) { ?>

                                                    <li>
                                                        <span class="badge alert-success"><i class="icon-folder-open"></i> <?= $afi2["nombre"] . ' ' . $afi2["apellido_paterno"] . ' ' . $afi2["apellido_materno"] ?></span> <button class="btn btn-default btn-xs" onclick="javascript:detalles_invitado(<?= $afi2['id_usuario'] ?>)">Mostrar</button>
                                                        <?php $a++; ?>
                                                        <?php if (${"afiliados$a"}) { ?>
                                                            <ul>
                                                                <?php foreach (${"afiliados$a"} as $afi3): ?>
                                                                    <?php $a = 3; ?>
                                                                    <?php if ($afi2['id_usuario'] == $afi3['patrocinador']) { ?>

                                                                        <li>
                                                                            <span class="badge alert-danger"><i class="icon-folder-open"></i> <?= $afi3["nombre"] . ' ' . $afi3["apellido_paterno"] . ' ' . $afi3["apellido_materno"] ?></span> <button class="btn btn-default btn-xs" onclick="javascript:detalles_invitado(<?= $afi3['id_usuario'] ?>)">Mostrar</button>
                                                                            <?php $a++; ?>
                                                                            <?php if (${"afiliados$a"}) { ?>
                                                                                <ul>
                                                                                    <?php foreach (${"afiliados$a"} as $afi4): ?>
                                                                                        <?php $a = 4; ?>
                                                                                        <?php if ($afi3['id_usuario'] == $afi4['patrocinador']) { ?>

                                                                                            <li>
                                                                                                <span  class="badge alert-warning"><i class="icon-folder-open"></i> <?= $afi4["nombre"] . ' ' . $afi4["apellido_paterno"] . ' ' . $afi4["apellido_materno"] ?></span> <button class="btn btn-default btn-xs" onclick="javascript:detalles_invitado(<?= $afi4['id_usuario'] ?>)">Mostrar</button>
                                                                                            </li>

                                                                                        <?php } ?>
                                                                                    <?php endforeach; ?>
                                                                                </ul>
                                                                            <?php } ?>
                                                                        </li>

                                                                    <?php } ?>
                                                                <?php endforeach; ?>
                                                            </ul>
                                                        <?php } ?>
                                                    </li>

                                                <?php } ?>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php } ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php } ?>
                <?php //} ?>
            </div>
            <!-- /.col-lg-8 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->
