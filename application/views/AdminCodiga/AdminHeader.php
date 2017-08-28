<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>CODIGA Geolocalización</title>
        <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=320, height=device-height, target-densitydpi=medium-dpi" />
        <!-- Load style for Bootstrap  -->
        <link rel="stylesheet" href=" <?php echo base_url(); ?>assets/css/bootstrap.min.css" />
        <link rel="stylesheet" href=" <?php echo base_url(); ?>assets/css/estilo.css" />
        <!-- Load Jquery -->
        <script src=" <?php echo base_url(); ?>assets/js/jquery.min.js"></script>
        <script src=" <?php echo base_url(); ?>assets/js/jquery.validate.js"></script>
        <script src=" <?php echo base_url(); ?>assets/js/jquery.form.js"></script>
        <!-- Load JS for Bootstrap -->
        <script src=" <?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
        <script src=" <?php echo base_url(); ?>assets/js/login.js"></script>
        <script src=" <?php echo base_url(); ?>assets/js/admincodiga.js"></script>
        <script src=" <?php echo base_url(); ?>assets/js/trazabilidad.js"></script>

        <link href="https://fonts.googleapis.com/css?family=Changa:200,300,400,500,600,700,800" rel="stylesheet">
        <link rel="icon" href="<?php echo base_url(); ?>assets/image/favicon.png">
    </head>
    <body>
        <nav class="navbar navbar-default">
            <div class="menu-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <span class="navbar-brand"></span>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <?php if ($login_log) { ?>
                            <li><a href="<?php echo site_url("SoporteUsuarios"); ?>">Usuarios</a></li>
                            <li><a href="">Mapas</a></li>
                            <li><a href="<?php echo site_url("SoporteTicket"); ?>">Tickets</a></li>
                            <li><a href="<?php echo site_url("AddUserSoporte"); ?>">Usuarios Soportes</a></li>
                            <li><a href="<?php echo site_url("CambiarAdmin"); ?>"><?php
                                    $user = strstr($Email, '@', true);
                                    echo $user;
                                    ?></a></li>
                            <li><a href="<?php echo site_url("welcome/destroy"); ?>">Salir del Sistema</a></li>
                        <?php } else { ?>
                            <li><a href="<?php echo site_url("welcome"); ?>">CODIGA</a></li>
                            <li><a href="#">Contactanos</a></li>
                            <li><a href="<?php echo site_url("welcome/login"); ?>">Acceso</a></li>
                        <?php } ?>
                    </ul>

                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
