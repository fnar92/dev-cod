<div class="container">
    <form class="form-signin" action="<?php echo site_url('Welcome/logincheck'); ?>" method="POST">
        <center>
            <h1 class="text-warning">Codiga Gestor Ganadero<br><small>Entra al tu Sistema de Gestion de Ganado</small></h1>
        </center>
        <div class="row">
            <div class="col-sm-10"></div>
            <!-- Código opcional para limpiar las columnas XS en caso de que el
                 contenido de todas las columnas no coincida en altura -->
            <div class="clearfix visible-xs"></div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <rudy>Email:</rudy>
                <input type="email" name="Email" class="form-control" placeholder="Introduzca Email" required/>
                <rudy>Contraseña:</rudy>
                <input type="password" name="Pws" class="form-control" placeholder="Introduzca Contraseña" required/>
                <br>
                <input type="hidden" name="token" value="<?php echo site_url('Welcome/token'); ?>" />
                <div class="col-sm-offset-4 col-sm-4">
                    <button type="submit" style="background-color:#339999; border-color: #339999;" class="btn btn-primary btn-md btn-block">Log in</button>
                </div>
            </div>
        </div>
    </form>
    <div class="col-sm-offset-4 col-sm-4">
        <button type="button" style="background-color:green; border-color:green;" class="btn btn-primary btn-md btn-block" data-toggle="modal" data-target="#myModal">Crea Una Cuenta</button>  
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="ResetmyModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content ">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">Ingresa tu Nueva Contraseña</h3>
            </div>
            <form action="<?php echo site_url('Welcome/SaveResetPassword'); ?>" id="CheckPassword" method="POST">
                <div class="modal-body ">
                    <div class="row">
                        <input type="hidden" name="id" value="<?php echo $id ?>" required/>
                        <div class="col-md-4 col-sm-4">
                            <rudy>Contraseña:</rudy>
                            <input type="password" name="NewPwd" id="NewPwd" class="form-control" placeholder="Ingresa tu Contraseña" required/>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <rudy>Re-Contraseña:</rudy>
                            <input type="password"  name="RepPwd" id="RepPwd" class="form-control" placeholder="Repetir Contraseña" required/>
                        </div>
                        <div class="col-sm-offset-4 col-sm-4">
                            <br>
                            <button type="submit" class="btn-primary" style="background-color:green; border-color:green;">Registrate</button>  
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12" id="Mensaje" >

                    </div>
                </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
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
                <h3 class="modal-title">Ingresa Tus Datos Para Crear Cuenta CODIGA</h3>
            </div>
            <form action="<?php echo site_url('Welcome/Regristrar'); ?>" method="POST">
                <div class="modal-body ">
                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                            <rudy>Email:</rudy>
                            <input type="Email" name="NewEmail" class="form-control" placeholder="Ingresa tu Email" required/>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <rudy>Contraseña:</rudy>
                            <input type="password" name="NewPwd" class="form-control" placeholder="Ingresa tu Contraseña" required/>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <rudy>Re-Contraseña:</rudy>
                            <input type="password" name="RepPwd" class="form-control" placeholder="Repetir Contraseña" required/>
                        </div>
                        <div class="col-sm-offset-4 col-sm-4">
                            <br>
                            <button type="submit" class="btn-primary" style="background-color:green; border-color:green;">Registrate</button>  
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12" id="Mensaje" >

                    </div>
                </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>