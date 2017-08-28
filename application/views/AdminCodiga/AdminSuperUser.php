<center>
    <form class="form-signin" action="<?php echo site_url('AdminCodiga/CambiarAdministracion'); ?>" method="POST">
        <div class="container">
            <h1 class="text-warning">Cambiar Administracion de CODIGA<br></h1>

            <h1 class="text-warning" align="center"><small><h4>Actual Contraseña de CODIGA</h4></small></h1>

            <div class="row">
                <div class="col-xs-3 col-sm-3"></div>
                <div class="col-xs-8 col-sm-8">
                    <div class="row">
                        <div class="col-md-9" align="left">
                            <rudy>Contraseña del Administrador Actual:</rudy>
                            <input type="password" name="AdminPws" class="form-control" placeholder="Introduzca Contraseña" required/>
                        </div>
                    </div> 

                </div>

                <div class="clearfix visible-xs"></div>
                <div class="col-xs-2 col-sm-2"></div>
            </div><br><br>
        </div>

        <h1 class="text-warning" align="center"><small><h4>Nuevo Contraseña de CODIGA</h4></small></h1>

        <div class="container">

            <div class="row">
                <div class="col-xs-3 col-sm-3"></div>
                <div class="col-xs-8 col-sm-8">
                    <div class="row">
                        <div class="col-md-9" align="left">
                            <rudy>Contraseña del Nuevo Administrador Actual:</rudy>
                            <input type="password" name="AdminNewPws" class="form-control" placeholder="Introduzca Nuevo Contraseña" required/>
                        </div>
                    </div> 

                </div>

                <div class="clearfix visible-xs"></div>
                <div class="col-xs-2 col-sm-2"></div>
            </div><br><br>
            <input type="submit" style=" border-left: 6px solid #339968;
                   background-color: lightgrey;" class="btn btn-default btn-md" value="Cambiar Adminiostracion">
        </div>
    </form>
</center>
