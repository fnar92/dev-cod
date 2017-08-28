<div class="title"> Administrador de Producción </div>
<div class="title_description">Selecciona una ó varias vacas que fueron ordeñadas y sus datos se cargarán automaticamente.<br>
    De igual manera, al Deseleccionar una ó varias vacas sus datos se borarrán automaticamente.<br>
    Una vez que des click en el botón “Guardar” <span class="resalta">NO</span> nodrás realizar ningún cambio.  </div>

<form id="checkbox" method="POST">

    <div class="cont_form">
        <div class="subtitle"> Datos de producción </div>

        <div class="col-xs-6"> 
            
           	<div class="ask-name">Litros obtenidos:</div>
                <input class="txt-camp" type=number name="Litros" id="Litros" required/>

                <div class="ask-name">Vendida a:</div>
                <input class="txt-camp" type="text" name="Vendido" id="Vendido" required/>
                
                <div class="ask-name">Precio:</div>
                <input class="txt-camp" type=number name="Costo" id="Costo" required/>
                 
                 <div class="box-option"><div class="squaredFour">
                    <br>
                        <input type="checkbox" name="todos" name="todos" id="todos" onclick="mychecktodosproduccion('<?php echo $Id ?>')">
                        <label for="todos"></label>
                    </div>
                    Seleccionar Todos
                </div>
        
        </div>
        
          <div class="col-xs-6">
            
            	<div class="ask-name">Observaciones:</div>
                <textarea class="form-coments" name="comentario" placeholder="Introduce una descripción"></textarea>
 
            </div>
            </form>

