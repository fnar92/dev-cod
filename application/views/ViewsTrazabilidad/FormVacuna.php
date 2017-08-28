<div class="title"> Administrador de Vacunas </div>
<div class="title_description">Selecciona una ó varias vacas que fueron vacunadas y sus datos se cargarán automaticamente.<br>
    De igual manera, al Deseleccionar una ó varias vacas sus datos se borarrán automaticamente.<br>
    Una vez que des click en el botón “Guardar” <span class="resalta">NO</span> nodrás realizar ningún cambio.  </div>

<form id="checkbox" method="POST">

    <div class="cont_form">
        <div class="subtitle"> Datos de vacunación </div>

        <div class="col-xs-6"> 

            <div class="ask-name">Nombre de la vacuna:</div>
            <input class="txt-camp" type=text list=vacunas name="Vacuna" id="Vacuna">
            <datalist id=vacunas >
                <?php foreach ($fetchvacunas as $row) { ?>
                    <option><?php echo $row->nombre; ?>
                    <?php } ?>
            </datalist>

            <div class="ask-name">Próxima vacuna:</div>
            <input class="txt-camp" type="date" id="theDate" name="FechaProx">

            <div class="ask-name">Fecha de la vacuna:</div>
            <input class="txt-camp" type=number name="Costo" id="Costo">

            <div class="box-option"><div class="squaredFour">
                    <br>
                        <input type="checkbox" name="todos" id="todos" onclick="mychecktodos('<?php echo $Id ?>')">
                        <label for="todos"></label>
                    </div>
                    Seleccionar Todos
                </div>
            
        </div>

        <div class="col-xs-6">
            
            	<div class="ask-name">Observaciones:</div>
                <textarea class="form-coments" name="observacion" id="observacion" placeholder="Introduce una descripción"></textarea>
            
            </div> 
</form>
