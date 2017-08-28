<div class="title">Baja de Ganado </div>
<div class="title_description">Ingresa la información necesaria para dar de baja a una vaca.</div>


<div class="cont_form">

    <div class="subtitle"> Datos de la baja</div>

    <div class="col-xs-6"> 

          <form class="form-horizontal" id="bajacabeza" method="POST" role="form">

        <div class="ask-name">Nombre de la vaca:</div>
        <input class="txt-camp" type="text" onkeyup="mycheckidcows(this.value)" name="codecows" id="codecows"  required/>

        <div class="ask-name">Tipo de baja:</div>
        <label class="radio-inline"><input type="radio" name="tipodemuerto" value="muerto" id="muerto" required/>Muerto</label>
        <label class="radio-inline"><input type="radio" name="tipodemuerto" value="vendido" id="vendido" data-toggle="modal" data-target="#myModalBaja" required/>Vendido</label>

    </div>

    <div class="col-xs-6">


        <div class="ask-name">Observaciones:</div>
        <textarea class="form-coments" name="comentario" id="comentario" placeholder="Introduce una descripción"  required/></textarea>

    </div>




    <div class="option-cont">

        <div class="btn-option" type="button" id="bajaclick"> Guardar </div>
    </form>
    </div>

</div>


<!-- Modal -->
<div class="modal fade" id="myModalBaja" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content ">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">Ingresa Los Datos del Comprador</h3>
            </div>

            <form id="comprador" method="POST">
                <div class="modal-body ">
                    <div class="row">
                        <input type="hidden" name="id" id="id" value="<?php echo $Id ?>">
                        <div class="col-md-4 col-sm-4">
                            <rudy>Nombre:</rudy>
                            <input type="text" name="name" class="form-control" placeholder="Introduzca Nombre" pattern="[a-zA-Z]*" required/>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <rudy>Numero de Factura:</rudy>
                            <input type="number" name="numerofactura" class="form-control" placeholder="Introduzca Numero de Factura" required/>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <rudy>Costo:</rudy>
                            <input type="number" name="costo" id="costo" class="form-control" placeholder="Introduzca Costo del Animal" required/>
                        </div>
                        <div class="col-sm-offset-4 col-sm-4">
                            <br>
                            <button type="button" id="buy" class="btn-primary" style="background-color:#ff6633; border-color:#ff6633;">Guardar Informacion</button>  
                        </div>
                    </div>
                </div>
            </form>
            <div class="modal-footer">
                <button type="button" onclick="myFunctionbaja()" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>