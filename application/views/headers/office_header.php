<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- Bootstrap Core CSS -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <link href="<?= base_url() ?>css/bootstrap.min.css" rel="stylesheet">
        <!-- MetisMenu CSS -->
        <link href="<?= base_url() ?>css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">
        <!-- Timeline CSS -->
        <link href="<?= base_url() ?>css/plugins/timeline.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="<?= base_url() ?>css/sb-admin-2.css" rel="stylesheet">
        <!-- Morris Charts CSS -->
        <link href="<?= base_url() ?>css/plugins/morris.css" rel="stylesheet">
        <!-- Custom Fonts -->
        <link href="<?= base_url() ?>font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <link href="<?= base_url() ?>css/style.css" rel="stylesheet">
    </head>
    <body>
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>
        <div id="wrapper">
            <!-- Navigation -->
            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/">Club de consume Express</a>
                </div>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                    </li>
                    <li>
                        <a href="/index.php/office/my_office/mis_datos">
                            <i class="fa fa-user fa-fw"></i> <?= $usuario ?>
                        </a>
                    </li>
                </ul>
                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse collapse">
                        <ul class="nav" id="side-menu">
                            <?php if ($this->session->userdata('is_logued_in') == TRUE) { ?>
                                <?php if ($this->session->userdata('perfil') == 1) { ?>
                                    <li><a href="/index.php/office/my_office"><i class="fa fa-sitemap fa-fw"></i> Mis afiliados</a></li>
                                    <li><a href="/index.php/office/my_office/arbol_afiliados"><i class="fa fa-sitemap fa-fw"></i> Arbol de afiliados</a></li>
                                    <li><a href="/index.php/office/my_office/modificar_datos"><i class="fa fa-wrench fa-fw"></i> Modificar mis datos</a></li>
                                    <li><a href="/index.php/office/my_office/invitados"><i class="fa fa-user fa-fw"></i> Mis Invitados</a></li>
                                    <li><a href="/index.php/office/my_office/contabilidad"><i class="glyphicon glyphicon-usd"></i> Contabilidad</a></li> 
                                    <li><a href="/index.php/login/logout_ci"><i class="glyphicon glyphicon-log-out"></i> Cerrar Sesion</div></a></li>
                                <?php } ?>
                                <?php if ($this->session->userdata('perfil') == 2) { ?>
                                    <li><a href="/index.php/office/my_office"><i class="fa fa-sitemap fa-fw"></i> Mis afiliados</a></li>
                                    <li><a href="/index.php/office/my_office/arbol_afiliados"><i class="fa fa-sitemap fa-fw"></i> Arbol de afiliados</a></li>
                                    <li><a href="/index.php/office/my_office/modificar_datos"><i class="fa fa-wrench fa-fw"></i> Modificar mis datos</a></li>
                                    <li><a href="/index.php/office/my_office/invitados"><i class="fa fa-user fa-fw"></i> Mis Invitados</a></li>
                                    <li><a href="/index.php/office/my_office/contabilidad"><i class="glyphicon glyphicon-usd"></i> Contabilidad</a></li>
                                    <li><a href="/index.php/login/logout_ci"><i class="glyphicon glyphicon-log-out"></i> Cerrar Sesion</div></a></li>
                                <?php } ?>
                                <?php if ($this->session->userdata('perfil') == 3) { ?>
                                    <li><a href="/index.php/office/my_office"><i class="fa fa-user fa-fw"></i> Mis afiliados</a></li>
                                    <li><a href="/index.php/office/my_office/arbol_afiliados"><i class="fa fa-sitemap fa-fw"></i> Arbol de afiliados</a></li>
                                    <li><a href="/index.php/office/my_office/usuarios"><i class="fa fa-user fa-fw"></i> Usuarios</a></li>
                                    <li><a href="/index.php/office/my_office/productos"><i class="fa fa-suitcase fa-fw"></i> Productos</a></li>
                                    <li><a href="/index.php/office/my_office/ventas"><i class="fa fa-money fa-fw"></i> Ventas</a></li>  
                                    <li><a href="/index.php/office/my_office/invitados"><i class="fa fa-user fa-fw"></i> Mis Invitados</a></li>
                                    <li><a href="/index.php/office/my_office/contabilidad"><i class="glyphicon glyphicon-usd"></i> Contabilidad</a></li>
                                    <li><a href="/index.php/login/logout_ci"><i class="glyphicon glyphicon-log-out"></i> Cerrar Sesion</div></a></li>
                                    <?php } ?>
                                <?php } ?>
                        </ul>
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>
                <!-- /.navbar-static-side -->
            </nav>