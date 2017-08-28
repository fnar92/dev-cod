<div class="title">Tus Reportes </div>
<div class="title_description">Selecciona un reporte para buscarlo en el sistema.</div>

<div class="cont_form">

    <form class="form-signin" id="reportes" method="post" autocomplete="off">
    
    <div class="subtitle"> Datos del Reporte </div>

    <div class="col-xs-6"> 

        <div class="ask-name">Nombre de la vaca:</div>
        <input class="txt-camp" type="text" name="CodigoCows" id="CodigoCows" required/>


    </div>

    <div class="col-xs-6">

        <div class="ask-name">Tipo de Evento Que Buscas:</div>
        <select class="form-control" name="Evento" id="Evento">
            <option>Selecciona Un Tipo de Busqueda</option>
            <option>Administracion de Vacunas</option>
            <option>Administracion de Produccion</option>
            <option>Administracion de Reproduccion</option>
        </select>
    </div>

    <div class="option-cont">

       <button type="button" id="clickreporte" class="btn-option">Buscar</button>

    </div>

    </form>




