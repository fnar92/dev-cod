	<div class="title">Anomalías del Sistema </div>
    <div class="title_description">Reporta cualquier problema que encuentres con el sistema para tener un óptimo funcionamiento.</div>
    
    
    	<div class="cont_form">
        
            <form class="form-horizontal" id="InsertTicket" role="form">
            
                 <input type="hidden" name="id" value="<?php echo $Id ?>">
                
        		<div class="subtitle"> Datos de la anomalía </div>
        
        	<div class="col-xs-6"> 
                
                <div class="ask-name">Elige un tipo de error:</div>
                <input class="txt-camp" type=text list=error class="form-control" name="Error" id="Error" name="error_list" required/>
                  <datalist id=error >
                    <?php foreach ($errores as $row) { ?>
                        <option><?php echo $row->nombre_error; ?>
                        <?php } ?>
                </datalist>

            </div>
            
            <div class="col-xs-6">

            
            	<div class="ask-name">Observaciones:</div>
                <textarea class="form-coments" name="Descripcion" id="Descripcion" placeholder="Introduce una descripción"required/></textarea>
            
            </div>
            
            
            
            
            <div class="option-cont">
                 <button class="btn-option" type="button" id="insertTickets"> Reportar </div>
            
            </div>
            </form>
    	</div>
       