<div class="title"> Administrador de Reproducción </div>
<div class="title_description">Selecciona una ó varias vacas que fueron preñadas y sus datos se cargarán automaticamente.<br>
    De igual manera, al Deseleccionar una ó varias vacas sus datos se borarrán automaticamente.<br>
    Una vez que des click en el botón “Guardar” <span class="resalta">NO</span> nodrás realizar ningún cambio.  </div>

<div class="cont_form"> 

    <form id="fase1" method="POST">

        <div class="col-xs-6"> 

            <div class="subtitle"> Fase de inicio </div>

            <div class="ask-name">Preñada por:</div>
            <input class="txt-camp" type="text" class="form-control" name="Codigo" id="Codigo" placeholder="Introduzca Nombre de Toro" onkeyup="fase1Inicio()" required/>          

            <div class="ask-name">Forma de preñez:</div>

            <div class="box-option">
                    <input type="radio" name="concesion" id="inseminacion" value="inseminacion" required/>
                    <label for="inseminacion"></label>
                Inseminación
            </div>

            <div class="box-option">
                    <input type="radio" name="concesion" id="montada" value="montada" required/>
                    <label for="montada"></label>
                Montada
            </div>

            <div class="ask-name">Fecha de secado:</div>
            <input class="txt-camp" type="date" id="FechaSecado" name="FechaSecado" required/>
            
    </form>
    
    <br><br>

    <div class="box-option"><div class="squaredFour">
            <br>
            <input type="checkbox" name="todos" id="todos" onclick="mychecktodosreproduccion('<?php echo $Id ?>')"">
            <label for="todos"></label>
        </div>
        Seleccionar Todos
    </div>

</div>


<div class="col-xs-6" id="fase2inicio">

    <div class="subtitle"> Fases pendientes </div>

    <div class="ask-name">Fases pendientes:</div>

    <select class="txt-camp" class="form-control" name="idface2" onclick="fase2inicio();">
        <option value="" selected>Seleciona Una Fase 1 Pendiente Para Finalizarla con la Fase Final</option>
        <?php foreach ($fasespendientes as $row) { ?>
            <option value="<?php echo $row->nombre_toro . ' ' . $row->fecha_secado . ' ' . $row->tipo; ?>"><?php echo "Codigo del Toro: " . $row->nombre_toro . ", Fecha de Secado: " . $row->fecha_secado . ", Concesión: " . $row->tipo; ?></option>
        <?php } ?>
    </select>

    <form id="fase2" method="POST">
        <div class="ask-name">Numero de Nacimientos:</div>
        <input class="txt-camp" type="number" data-toggle="tooltip" data-placement="right" title="Si no hubo Nacidos poner 0." name="NumeroNacimientos" id="NumeroNacimientos" required/>          
        <div id="fase1vacas">

        </div>

        <div class="ask-name">Numero de Muertos:</div>
        <input class="txt-camp" type="number" data-toggle="tooltip" data-placement="right" title="Si no hubo Nacidos poner 0." name="NumeroMuertos" id="NumeroMuertos" placeholder="Introduzca Numero de Muertos" required/>          


        <div class="ask-name">Fecha de Parto:</div>
        <input class="txt-camp" type="date" name="FechaParto" id="FechaParto" required/>        

        <div class="option-cont">
            <button type="button" id='finalizafase2' class="btn-option">Guardar finalizacion</button>
        </div>

    </form>

</div>


