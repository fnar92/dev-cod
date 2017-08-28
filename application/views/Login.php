
	<div class="login-page">

		<div class="form">

			<div id="logo">

				<img src="<?php echo base_url(); ?>assets/login/img/logo.png" alt="logo">

			</div>

    <form class="form-signin " action="<?php echo site_url('Welcome/logincheck'); ?>" method="POST">


                <p type="button" class="message" data-toggle="modal" data-target="#myModalpws">¿Olvidaste tu contraseña?</p>

     
                <input type="email" name="Email" class="form-control" placeholder="Introduzca Email" required/>
                <input type="password" name="Pws" class="form-control" placeholder="Introduzca Contraseña" required/>

                <input type="hidden" name="token" value="<?php echo site_url('Welcome/token'); ?>" />
 
                    <button type="submit" class="btn_left btn-1 btn-1c">Login</button>
 

    </form>
        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">Crea Una Cuenta</button>  


			
		</div>
	</div>


    


<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content ">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">Ingresa Tus Datos Para Crear Cuenta CODIGA</h3>
            </div>
            <form action="<?php echo site_url('Welcome/Regristrar'); ?>" id="CheckPassword" method="POST">
                <div class="modal-body ">
                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                            <rudy>Email:</rudy>
                            <input type="Email" name="NewEmail" class="form-control" placeholder="Ingresa tu Email" required/>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <rudy>Contraseña:</rudy>
                            <input type="password" name="NewPwd" id="NewPwd" class="form-control" placeholder="Ingresa tu Contraseña" required/>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <rudy>Re-Contraseña:</rudy>
                            <input type="password" name="RepPwd" id="RepPwd" class="form-control" placeholder="Repetir Contraseña" required/>
                        </div>
                        <button type="submit" class="btn_registro" style="margin-top: 10px;">Registrarme</button>          
                    </div>
                    
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="myModalpws" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content ">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">Reiniciar ò Resetear Contraseña</h3>
            </div>
            <form action="<?php echo site_url('Welcome/resetpws'); ?>" method="POST">
                <div class="modal-body ">
                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                            <rudy>Email:</rudy>
                            <input type="Email" name="NewEmailPws" class="form-control" placeholder="Ingresa tu Email" required/>
                        </div>
                            <br>
                            <button type="submit" class="btn btn_registro" >Continuar</button>  
                    </div>
                    <div class="col-md-12 col-sm-12" id="Mensaje" >

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
