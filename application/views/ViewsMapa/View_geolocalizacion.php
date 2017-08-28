<div class="map">

    <?php echo $mapa['html'] ?>

</div>

<div class="lateral_bar">

    <div class="option-cont">

        <button class="btn-perimetro" data-toggle="modal" data-target="#limit_modal"> Establecer Límite </button>

    </div>

    <h1>Ubicación de tu ganado</h1>

    <table class="table">
        <thead>
            <tr>
                <th class="left_35 top_style">Ganado</th>
                <th class="center_30 top_style_center">Latitud</th>
                <th class="right_35 top_style">Longitud</th>
            </tr>
        </thead>
        <tbody>
            <?php include 'Tabla_vacas.php';?>
            
        </tbody>
    </table>

</div>

<?php echo $alerta; ?>

<div class="modal fade" id="limit_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close_modal" data-dismiss="modal" aria-hidden="true">×</button> Delimita
                tu terreno
            </div>
        <div class="modal-body modal-body-tabla">

            <form id="fom_Point" role="form" method="post" action="<?php echo site_url('Insertar'); ?>" class="form-horizontal"  role="form">
                <p class="txt_camp_title">Latitud:</p>
                <input type="text" class="form-control txt_camp_modal" id="latitud" name="latitud" >
                <p class="txt_camp_title">Longitud:</p>
                <input type="text" class="form-control txt_camp_modal" id="longitud" name="longitud" >
                <input type="hidden" name="usuario_id_usuario" value="<?php echo $Id ?>">
                <button type="submit" id="insertPoint" class="btn-primary btn_limit_modal">Delimitar</button>
            </form>

            <div class="col-md-12 col-sm-12">
                <br>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Límites</th>
                                <th>Latitud</th>
                                <th>Longitud</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php include 'Tabla_limite.php';?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class=" modal-footer">
                <button class="btn_cancel_modal" data-dismiss="modal" aria-hidden="true">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<!-- Load Map  -->
<?php echo $mapa['js'] ?>