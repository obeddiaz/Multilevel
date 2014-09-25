<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?= $titulo ?></title>
        <link rel="icon" type="image/png" href="/images/favicon.ico" />
        <link href="<?= base_url() ?>css/estilos.css" rel="stylesheet" type="text/css" />
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>js/funciones.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>js/jquery.alerts.js"></script>   
        <link href="<?= base_url() ?>css/jquery.alerts.css" rel="stylesheet" type="text/css" />
        <style type="text/css">
            #img2,#img3,#img4,#img5,#img6,#img7{
                display: none;
            }
        </style>  
        <script>
            $(document).ready(function() {
                (function() {
                    setTimeout(arguments.callee, 49000);
                    setTimeout(function() {
                        setTimeout(function() {
                            $("#img1").fadeOut(3000);
                        }, 0);
                        setTimeout(function() {
                            $("#img2").fadeIn(3000);
                        }, 0);
                        setTimeout(function() {
                            $("#img2").fadeOut(3000);
                        }, 7000);
                        setTimeout(function() {
                            $("#img3").fadeIn(3000);
                        }, 7000);
                        setTimeout(function() {
                            $("#img3").fadeOut(3000);
                        }, 14000);
                        setTimeout(function() {
                            $("#img4").fadeIn(3000);
                        }, 14000);
                        setTimeout(function() {
                            $("#img4").fadeOut(3000);
                        }, 21000);
                        setTimeout(function() {
                            $("#img5").fadeIn(3000);
                        }, 21000);
                        setTimeout(function() {
                            $("#img5").fadeOut(3000);
                        }, 28000);
                        setTimeout(function() {
                            $("#img6").fadeIn(3000);
                        }, 28000);
                        setTimeout(function() {
                            $("#img6").fadeOut(3000);
                        }, 35000);
                        setTimeout(function() {
                            $("#img7").fadeIn(3000);
                        }, 35000);
                        setTimeout(function() {
                            $("#img7").fadeOut(3000);
                        }, 42000);
                        setTimeout(function() {
                            $("#img1").fadeIn(3000);
                        }, 42000);
                    });
                })();
            });

        </script>
    </head>
    <body>
        <div id="header">
            <div class="inner">
                <img class="logo" id="img1" alt="" src="<?= base_url() ?>/images/1277300881_Olgreens.gif"/>
                <img class="logo" id="img2" alt="" style="display: none;" src="<?= base_url() ?>/images/olgreens.gif"/>
                <img class="logo" id="img3" alt="" style="display: none;" src="<?= base_url() ?>/images/papel_higienico.gif"/>
                <img class="logo" id="img4" alt="" style="display: none;" src="<?= base_url() ?>/images/wikitonik.gif"/>
                <img class="logo" id="img5" alt="" style="display: none;" src="<?= base_url() ?>/images/papel_higienico1.gif"/>
                <img class="logo" id="img6" alt="" style="display: none;" src="<?= base_url() ?>/images/wikitonik1.gif"/>
                <img class="logo" id="img7" alt="" style="display: none;" src="<?= base_url() ?>/images/glory.gif"/>
                <div id="titulo_container">
                    <h1><?= $titulo_pagina ?></h1>
                </div>
                <div id="menu_usuario">
                    <ul id="user">
                        <?php
                        if ($this->session->userdata('is_logued_in') == TRUE) {
                            if ($this->session->userdata('perfil') == 1) {
                                echo '<li><a href="/index.php/login/logout_ci"><div>Cerrar Sesion</div></a></li>';
                                echo '<li><a href="/index.php/modificar/mostrar_datos"><div>Modificar mis datos</div></a></li>';
                                echo '<li><a href="/index.php/afiliados"><div>Mis afiliados</div></a></li>';
                            }
                            if ($this->session->userdata('perfil') == 2) {
                                echo '<li><a href="/index.php/login/logout_ci"><div>Cerrar Sesion</div></a></li>';
                                echo '<li><a href="/index.php/modificar/mostrar_datos"><div>Modificar mis datos</div></a></li>';
                                echo '<li><a href="/index.php/afiliados"><div>Mis afiliados</div></a></li>';
                            }
                            if ($this->session->userdata('perfil') == 3) {
                                echo '<li><a href="/index.php/login/logout_ci"><div>Cerrar Sesion</div></a></li>';
                                echo '<li><a href="/index.php/show_usuarios"><div>Usuarios</div></a></li>';
                                echo '<li><a href="/index.php/productos"><div>Productos</div></a></li>';
                                echo '<li><a href="/index.php/ventas"><div>Ventas</div></a></li>';
                                echo '<li><a href="/index.php/configuracion"><div>Configuracion</div></a></li>';
                            }
                        } else {
                            echo '<li><a href="/index.php/login"><div>Iniciar Sesión</div></a></li>';
                            echo "<li><a href='/index.php/inscripcion'><div>Inscripcion</div></a></li>";
                        }
                        ?>

                    </ul> 
                </div>
                <div id="menu">
                    <ul id="button">
                        <?php foreach ($menu as $m): ?>
                            <?php
                            $acentos = strtr(utf8_decode($m['nombre']), utf8_decode('àáâãäçèéêëìíîïñòóôõöùúûüýÿÀÁÂÃÄÇÈÉÊËÌÍÎÏÑÒÓÔÕÖÙÚÛÜÝ'), 'aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY');
                            $ref = str_replace(" ", "_", $acentos);
                            echo "<li><a href='" . base_url() . "index.php/principal/" . $ref . "' id='menu_j'><div>" . $m['nombre'] . "</div></a></li>";
                            ?>
                        <?php endforeach; ?>
                    </ul>    
                </div>
            </div>
        </div>
        <div class="inner">
            <div id="container">