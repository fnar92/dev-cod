<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>CODIGA Geolocalización</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Load style for Bootstrap  -->
        <link rel="stylesheet" href=" <?php echo base_url(); ?>assets/css/bootstrap.min.css" />
        <link rel="stylesheet" href=" <?php echo base_url(); ?>assets/css/estilo.css" />
        <!-- Load Jquery -->
        <script src=" <?php echo base_url(); ?>assets/js/jquery.min.js"></script>
        <!-- Load JS for Bootstrap -->
        <script src=" <?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Changa:200,300,400,500,600,700,800" rel="stylesheet">
        <link rel="icon" href="<?php echo base_url(); ?>assets/image/favicon.png">
        
        

        <script>
            $(document).ready(function () {
                $('[data-toggle="tooltip"]').tooltip();
                $('#tip').tooltip('show');
            });
        </script>
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
                            <li class=""><a href="<?php echo site_url("Mapa"); ?>">Mapa</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Trazabilidad (Historial) <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?php echo site_url("AltaAnimales"); ?>">Alta de Animal</a></li>
                                    <li><a href="<?php echo site_url("AdministracionVacunas"); ?>">Administración de Vacunas</a></li>
                                    <li><a href="<?php echo site_url("AdministracionProduccion"); ?>">Administración de Producción</a></li>
                                    <li><a href="<?php echo site_url("AdministracionReproduccion"); ?>">Administración de Reproducción</a></li>
                                    <li><a href="<?php echo site_url("BajaAnimales"); ?>">Baja de Animal</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Soporte Técnico <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?php echo site_url("AltaTickets"); ?>">Alta Ticket</a></li>
                                    <li><a href="<?php echo site_url("MonitoreoTickets"); ?>">Monitoreo</a></li>
                                </ul>
                            </li>
                            <li><a href="<?php echo site_url("Reportes"); ?>">Reportes</a></li>
                            <li><a href="<?php echo site_url("welcome/inf"); ?>" data-toggle="tooltip" id="tip" data-placement="bottom" title="Edita Tu Informacion Aqui"><?php $user = strstr($Email, '@', true);
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
