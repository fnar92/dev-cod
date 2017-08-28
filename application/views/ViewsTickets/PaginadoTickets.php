<div id="the-content">
<table class="table table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Error en:</th>
                <th>Detalles Fecha y Hora</th>
                <th>Estado de Tickets</th>
            </tr>
        </thead>
        <tbody>  
            <?php foreach ($query as $row) { ?>
                <tr>
                    <td>
                        <?php echo $row->id_ticket; ?>
                    </td>
                    <td>
                        <?php  $iderror=$row->ctrl_errores_id_errores; 
                        if($iderror==1){echo"Sistema Web";}
                        else if($iderror==2){echo"Android";}
                        else if($iderror==3){echo"Apple ISO";}
                        else if($iderror==4){echo"Monitoreo";}
                        ?>
                    </td>
                    <td>
                       <?php echo $row->fecha_inicio; ?>
                    </td>
                    <td>
                        <?php $color=$row->estado_tickets;
                        if($color=="inicio"){echo"<h5 class='text-primary'>".$row->estado_tickets."</h5>";}
                        else if($color=="procesando"){echo"<h5 class='text-success'>".$row->estado_tickets."</h5>";}
                        ?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
<center>
    <?php echo $links; ?>
</center>
</div>
</div>