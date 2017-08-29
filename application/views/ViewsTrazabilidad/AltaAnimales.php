<h1 class="title">Alta de Vacas<br></h1>

<div class="title_description"> Ingresa la información necesaria para dar de alta a una vaca </div>

<div>

    <div class="cont_form">

        <div class="subtitle"> Datos del Recien Nacido </div>

        <div class="col-md-6">

            <form class="form-horizontal" role="form" method="POST" action="<?php echo site_url("ControllersTrazabilidad/Trazabilidad/AddVaca/{$Id}"); ?>"> 

                <div class="ask-name">Nombre del Recien nacido:</div>
                <input class="txt-camp" type="Text" onkeyup="mycheckname(this.value)" name="Nombre" required/>

                <div class="box-option"><div class="squaredFour">
                        <input type="checkbox"  id="box" name="Procedencia" data-toggle="modal" data-target="#myModal" value="adquisicion"/>
                        <label for="box"></label>
                    </div>
                    Adquisición
                </div>

                <div class="ask-name">Fecha de nacimiento:</div>
                <input class="txt-camp" type="date" name="FechaNac" id="theDate" required/>

                <div class="box-option">
                        <input type="radio" id="masculino" name="sexo" value="masculino" required/>
                        <label for="masculino"></label>
                   
                    Macho
                </div>
                
                <div class="box-option">
                        <input type="radio" id="femenino" name="sexo" value="femenino" required/>
                        <label for="femenino"></label>

                    Hembra
                </div>

                <div class="ask-name">Color del recien nacido:</div>
                <input class="txt-camp" type=text list=color name="Color" required/>
                <datalist id=color >
                    <?php foreach ($fetchcolor as $row) { ?>
                        <option><?php echo $row->color; ?>
                        <?php } ?>
                </datalist>

                <div class="ask-name">Catálogo de razas:</div>
                <input class="txt-camp" type=text list=razas name="Razas" required/>
                <datalist id=razas >
                    <?php foreach ($fetchraza as $row) { ?>
                        <option><?php echo $row->nombre_raza; ?>
                        <?php } ?>
                </datalist>

                <div class="ask-name">Peso:</div>
                <input class="txt-camp" type="number" name="Peso" required/>

                <div class="ask-name">Observaciones:</div>
                <textarea class="form-coments" id="textarea" name="comentario" placeholder="Introduce una descripción" required/></textarea><
                <br>
                </div>

                <div class="col-md-6">

                    <div class="ask-name">Nombre del padre:</div>
                    <input class="txt-camp" type="text" name="NombrePadre" id="NombrePadre"  onkeyup="mycheckpadres(this.value)" required/>

                    <div class="ask-name">Código del padre:</div>
                    <input class="txt-camp" type="number" name="CodigoPurezaPadre" id="CodigoPurezaPadre" required/>

                    <div class="ask-name">Raza del padre:</div>
                    <input class="txt-camp" type="text" list=razas name="RazasPadre" id="RazasPadre" required/>
                    <datalist id=razas >
                        <?php foreach ($fetchraza as $row) { ?>
                            <option><?php echo $row->nombre_raza; ?>
                            <?php } ?>
                    </datalist>

                    <div class="ask-name">Nombre de la madre:</div>
                    <input class="txt-camp" type="text" name="NombreMadre"  id="NombreMadre"  onkeyup="mycheckmadres(this.value)" required/>

                    <div class="ask-name">Código de la madre:</div>
                    <input class="txt-camp" type="number" id="CodigoPurezaMadre" name="CodigoPurezaMadre" required/>

                    <div class="ask-name">Raza de la madre:</div>
                    <input class="txt-camp" type="text" list=razas id="RazasMadre" name="RazasMadre" required/>
                    <datalist id=razas >
                        <?php foreach ($fetchraza as $row) { ?>
                            <option><?php echo $row->nombre_raza; ?>
                            <?php } ?>
                    </datalist>
                    <br>
                </div>

                <div class="option-cont">
                    <button type="submit" class="btn-option" id="style">Guardar</button>
                </div>
        
            </form>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content ">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">Ingresa Los Datos del Vendedor</h3>
            </div>
            <form method="POST" id="seller">
                <div class="modal-body ">
                    <div class="row">
                        <input type="hidden" name="id" id="id" value="<?php echo $Id ?>">
                        <div class="col-md-4 col-sm-4">
                            <rudy>Nombre:</rudy>
                            <input type="text" name="nombre" class="form-control" placeholder="Introduzca Nombre" pattern="[a-zA-Z]*" required/>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <rudy>Numero de Factura:</rudy>
                            <input type="number" name="numerofactura" class="form-control" placeholder="Introduzca Numero de Factura" required/>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <rudy>Costo:</rudy>
                            <input type="number" name="costo" class="form-control" placeholder="Introduzca Costo del Animal" required/>
                        </div>
                        <div class="col-sm-offset-4 col-sm-4">
                            <br>
                            <button id="sell" type="button" class="btn-primary">Guardar Informacion</button>  
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12" id="Mensaje" >

                    </div>
                </div>
            </form>
            <div class="modal-footer">
                <button type="button" onclick="myFunction()" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
