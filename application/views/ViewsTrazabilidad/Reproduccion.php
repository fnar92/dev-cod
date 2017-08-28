<div id="the-content">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nombre de Vacas</th>
                <th>Seleccione Vacas</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($query as $row) { ?>
                <tr>
                    <td>
                        <?php echo $row->nombre; ?>
                    </td>
                    <td>
                         <div class="row">
                             
                              <div class="box-option"><div class="squaredFour">
                                        <input type="checkbox" class="cows" id="<?php echo $row->id_cabeza; ?>" name="<?php echo $row->id_cabeza; ?>" value="<?php echo $row->id_cabeza; ?>" onclick="mycheckreproduccion('<?php echo $row->id_cabeza; ?>')">
                                    <label for="<?php echo $row->id_cabeza; ?>"></label>
                                </div>
                            </div>
                             <div class="col-md-6" id="<?php echo $row->id_cabeza; ?>">
                               
                            </div>
                            </div>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <?php echo $links; ?>
</div>
</div>
</center>