<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/front/img/favicon.ico">

        <title>Codiga</title>
        <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/img/favicon.png" />


        <!-- Bootstrap core CSS -->
        <link href="<?php echo base_url(); ?>assets/front/css/bootstrap.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="<?php echo base_url(); ?>assets/front/css/style.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/front/css/font-awesome.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/front/css/responsive.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Baloo+Thambi" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">

        <style type="text/css">
            html,
            body {
                background: url(<?php echo base_url(); ?>assets/img/banner_02.jpg)no-repeat center center fixed;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
                font-family: 'Changa', sans-serif;
            }
        </style>

        <link href="https://fonts.googleapis.com/css?family=Changa+One" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Changa" rel="stylesheet">

       

    </head>
    <body>
        <nav class="navbar navbar-default" style="margin-bottom: 0px;">
            <div class="menu-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
                        aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    <span class="navbar-brand"></span>

                    <div class="logo"></div>

                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->



                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">



                    <ul class="nav navbar-nav">

                        <?php if ($login_log) { ?>

                        <li class=""><a href="<?php echo site_url("Mapa"); ?>">Mapa</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Trazabilidad (Historial) <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo site_url("AltaAnimales"); ?>">Alta de Animal</a></li>
                                <li><a href="<?php echo site_url("AdministracionVacunas"); ?>">Administración de Vacunas</a></li>
                                <li><a href="<?php echo site_url("AdministracionProduccion"); ?>">Administración de Producción</a></li>
                                <li><a href="<?php echo site_url("AdministracionReproduccion"); ?>">Administración de Reproducción</a></li>
                                <li><a href="<?php echo site_url("BajaAnimales"); ?>">Baja de Animal</a></li>
                                <li><a href="<?php echo site_url("Reportes"); ?>">Reportes</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Soporte Técnico <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo site_url("AltaTickets"); ?>">Reporte de anomalías</a></li>
                                <li><a href="<?php echo site_url("MonitoreoTickets"); ?>">Monitoreo de anomalías</a></li>
                                <li><a href="<?php echo site_url("PayPal"); ?>">Paypal $</a></li>
                            </ul>
                        </li>

                        <li><a href="<?php echo site_url("TuInformacion"); ?>" id="tip" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Edita Tu Informacion Aqui"><?php
                                    $user = strstr($Email, '@', true);
                                    echo $user;
                                    ?></a></li>

                        <li><a href="<?php echo site_url("welcome/destroy"); ?>">Salir del Sistema</a></li>

                        <?php } else { ?>
                            <li><a href="<?php echo site_url("welcome"); ?>">CODIGA</a></li>
                            <li><a href="#">Contactanos</a></li>
                            <li><a href="<?php echo site_url("Login"); ?>">Acceso</a></li>
                        <?php } ?>

                    </ul>

                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>