<div class="modal fade" id="login"  aria-labelledby="myModalLabel" aria-hidden="true" >
      <div id="loginModal" class="modal show" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content" style="background-color:#F0F8FF">

            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h1 class="text-center" id="titLogin">Inicio de sesión</h1>
            </div>

            <div class="modal-bod">
              <form class="form col-md-12 center-block" action="<?php echo URL; ?>login/index" method="post">
                <div class="form-group">
                  <input type="text" name="txtCedula"  autofocus="true" class="form-control input-lg" placeholder="Identificación" >
                </div>
                <div class="form-group">
                  <input type="password" name="txtPassword" class="form-control input-lg" placeholder="Contraseña" >
                </div>
                <div class="form-group">
                  <button class="btn btn-primary btn-lg btn-block"  type="submit" name="btnEntrar" id="btn"><label id="btnLogin">Entrar</label></button>
                  <span class="pull-right"><a id="enlace" href="<?php echo URL; ?>usuario/index">Registrese</a></span><span></span>
                  <span class="pull-left"><a id="enlace" href="" data-toggle="modal" data-target="#RestablecerModal">¿Olvidaste tu contraseña?</a></span><span></span>
                  <br>
                </div>
              </form>
            </div>

            <div class="modal-footer">
              <div class="col-md-12">
                <button class="btn" id="btn" data-dismiss="modal" aria-hidden="true">Salir</button>
              </div>  
            </div>
                  
          </div>
        </div>
      </div>      
</div>

<!-- Reestablecer -->
<div class="modal fade" id="RestablecerModal"  aria-labelledby="myModalLabel" aria-hidden="true" >
      <div id="loginModal" class="modal show" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content" style="background-color:#F0F8FF">

            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h1 class="text-center" id="titLogin">Restablecer</h1>
            </div>

             <form class="form col-md-12 center-block" method="post" action="<?php echo URL; ?>login/recuperarPassword">
                <div class="form-group">
                  <label id="Prestablecer"> Ingrese aquí el correo electrónico que proporcionó al momento de su registro y de clic en enviar. Luego de esto, debe ingresar a su correo electrónico y seguir las indicaciones que se enviaron para poder restablecer su contraseña.</label>

                  <label id="enlace"> Correo electrónico (*)</label>
                  <input type="email" name="txtCorreo" class="form-control input-lg" placeholder="Correo electronico">
                </div>
                
                <div class="modal-footer">
                <div class="form-group">
                  <button class="btn btn-primary btn-lg btn-block" type="submit" name="btnRecuperar" id="btn">Enviar</button>
                </div>
                </div>
              </form>
            

              <div class="modal-footer">
                <div class="col-md-12">
                  <button class="btn" id="btn" data-dismiss="modal" aria-hidden="true">Salir</button>
                </div>  
              </div>             
          </div>
        </div>
      </div>      
</div>
















