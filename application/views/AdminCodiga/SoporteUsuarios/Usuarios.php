<div id="the-content">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Id Usuario</th>
                <th>Nombre</th>
                <th>Fecha de Pago</th>
                <th>Fecha de Pago Siguente</th>
                <th>Estatus</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($query as $row) { ?>
                <tr>
                    <td>
                        <?php echo $row->id_usuario; ?>
                    </td>
                    <td>
                        <?php echo $row->nombre; ?>
                    </td>
                    <td>
                        <?php echo $row->fecha_paga; ?>
                    </td>
                    <td>
                        <?php echo $row->fecha_paga_prox; ?>
                    </td>
                    <td>             
                        <?php
                        $status = $row->status;
                        if ($status == "1") {
                            ?> 
                            <select class="form-control" id="<?php echo $row->id_usuario; ?>" onclick="DesactivarCuenta('<?php echo $row->id_usuario; ?>');">
                                <option value="Activada">Activada</option>
                                <option value="Desactivada">Desactivada</option>
                            </select>
                        <?php } ?>
                        <?php if ($status == "2") { ?>
                            <select class="form-control" id="<?php echo $row->id_usuario."dos"; ?>" onclick="ActivarCuenta('<?php echo $row->id_usuario; ?>');">
                                <option value="Desactivada">Desactivada</option>
                                <option value="Activada">Activada</option>
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