<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?= $titulo ?></title>
        <link rel="icon" type="image/png" href="/images/favicon.ico" />
  <!--      <link href="<?= base_url() ?>css/estilos.css" rel="stylesheet" type="text/css" />
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>js/funciones.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>js/jquery.alerts.js"></script>   
        <link href="<?= base_url() ?>css/jquery.alerts.css" rel="stylesheet" type="text/css" />-->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>js/jquery.alerts.js"></script>   
        <script type="text/javascript" src="<?= base_url() ?>js/funciones.js"></script>
        <link href="<?= base_url() ?>css/jquery.alerts.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url() ?>css/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url() ?>css/style.css" rel="stylesheet" type="text/css" />
        <script src="<?= base_url() ?>css/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    </head>
    <body>
        <nav class="navbar navbar-default" role="navigation">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Basicos AGS</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <?php foreach ($menu as $m): ?>
                            <?php
                            $acentos = strtr(utf8_decode($m['nombre']), utf8_decode('àáâãäçèéêëìíîïñòóôõöùúûüýÿÀÁÂÃÄÇÈÉÊËÌÍÎÏÑÒÓÔÕÖÙÚÛÜÝ'), 'aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY');
                            $ref = str_replace(" ", "_", $acentos);
                            echo "<li><a href='" . base_url() . "index.php/principal/" . $ref . "' id='menu_j'><div>" . $m['nombre'] . "</div></a></li>";
                            ?>
                        <?php endforeach; ?>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
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
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <div class="container">
            <div class="page-header">
                <h1><?=$titulo_pagina?></h1>
            </div>