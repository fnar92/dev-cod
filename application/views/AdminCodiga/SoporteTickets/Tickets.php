<div id="the-content">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Id Usuario</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Error del Sistema</th>
                <th>Fecha y Hora Inicial</th>
                <th>Estatus</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($query as $row) { ?>
                <tr>
                    <td>
                        <?php echo $row->usuario_id_usuario; ?>
                    </td>
                    <td>
                        <?php echo $row->nombre; ?>
                    </td>
                    <td>
                        <?php echo $row->descripcion; ?>
                    </td>
                    <td>
                        <?php
                        $iderror = $row->ctrl_errores_id_errores;
                        if ($iderror == 1) {
                            echo"Sistema Web";
                        } else if ($iderror == 2) {
                            echo"Android";
                        } else if ($iderror == 3) {
                            echo"Apple ISO";
                        } else if ($iderror == 4) {
                            echo"Monitoreo";
                        }
                        ?>
                    </td>
                    <td>
                        <?php echo $row->fecha_inicio; ?>
                    </td>
                    <td>
    <?php
    $color = $row->estado_tickets;
    if ($color == "inicio") {
        ?> 
                            <select class="form-control" id="<?php echo $row->id_ticket; ?>" onclick="faseprocesando('<?php echo $row->id_ticket; ?>');">
                                <option value="inicio">inicio</option>
                                <option value="procesando">procesando</option>
                            </select>
                        <?php } ?>
    <?php if ($color == "procesando") { ?>
                            <select class="form-control" id="<?php echo $row->id_ticket."dos"; ?>" name="finalizado" onclick="fasefinalizado('<?php echo $row->id_ticket; ?>');">
                                <option value="procesando">procesando</option>
                                <option value="finalizado">finalizado</option>
                            </select>
        <?php } ?>
                    </td>
                </tr>
<?php } ?>
        </tbody>
    </table>
<?php echo $links; ?>
</div>
</div>
</center>