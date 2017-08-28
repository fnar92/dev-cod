<br>
<div id="the-content">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Id Usuario Soporte</th>
                <th>Nombre</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($query as $row) { ?>
                <tr>
                    <td>
                        <?php echo $row->id_usuario; ?>
                    </td>
                    <td>
                        <?php
                        $Email = $row->correo;
                        $user = strstr($Email, '@', true);
                        echo $user;
                        ?>
                    </td>
                    <td>
                        <?php
                        $estatus = $row->tipo_de_usuario_id_tipo_de_usuario;
                        if ($estatus == 2) {
                            ?>

                        <select class="form-control" id="<?php echo $row->id_usuario; ?>" onclick="BajaUserSoporte('<?php echo $row->id_usuario; ?>');">
                                <option value="Activada">Activada</option>
                                <option value="Desactivada">Desactivada</option>
                            </select>

                            <?php
                        }
                        ?>
                    </td>
                </tr>
    <?php } ?>
        </tbody>
    </table>
<?php echo $links; ?>
</div>
</div>
</center>