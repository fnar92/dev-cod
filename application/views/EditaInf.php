	<div class="title"> Edita tu Cuenta </div>
    <div class="title_description">Edita los datos de tu usuario dentro del sistema. </div>
    
    
    	<div class="cont_form">
        
        	
        
        	<div class="col-xs-6"> 
            
            <div class="subtitle"> Datos Personales </div>
            
             <form class="form-horizontal" role="form" id="infself" method="POST">
            
            	<div class="ask-name">Nombre:</div>
                <input class="txt-camp" name="nombre" id="nombre" type="text" pattern="[a-zA-Z]*" required/>
                
            
                
                <div class="ask-name">Apellido paterno:</div>
                <input class="txt-camp" name="apelldiop" id="apelldiop" type="text" pattern="[a-zA-Z]*" required/>
                
                <div class="ask-name">Apellido materno:</div>
                <input class="txt-camp" name="apelldiom" id="apelldiom" pattern="[a-zA-Z]*" type="text" required/>
                
                <div class="ask-name">Teléfono:</div>
                <input class="txt-camp" type="number" name="tel" id="tel" required/>
                
                
                
                
            
            </div>
            
            <div class="col-xs-6">
            
            <div class="subtitle"> Datos domiciliarios</div>
            
            <div class="ask-name">Estado:</div>
            <input class="txt-camp" name="estado" id="estado" type="text" required/>
            
                
                <div class="ask-name">Municipio/Delegaciòn:</div>
                <input class="txt-camp" name="municipio" id="municipio" type="text" required/>
                
                <div class="ask-name">Direccion:</div>
                <input class="txt-camp" name="dir" id="dir" type="text" required/>
            
            </div>

            <div class="option-cont">
            
                <button type="submit" class="btn-option">Guardar</button>
            
            </div>
</form>
    	</div>
        
