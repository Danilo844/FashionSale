    <div class="modal fade" id="cambiarPassword"  aria-labelledby="myModalLabel" aria-hidden="true">
      <div id="" class="modal show" tabindex="-1" role="dialog" aria-hidden="true">
        <div  class="modal-dialog">
          <div class="modal-content" style="background-color:#F0F8FF">

            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h1 class="text-center">Cambiar contraseña</h1>
            </div>

            <div  class="container-fluid">
              <section  style="padding: 5%;">

                <div class="row">
                  <form action="<?php echo URL; ?>datosPersonales/index" data-parsley-validate method="post">

                    <center>
                          <input type="hidden" value="<?php echo $cedula;?>" name="txtCedula">
                          <input type="hidden" id="contra" value="<?php echo trim($contra);?>">
                      <br>

                      <div class="form-group">
                        <label class="col-md-3 control-label">Actual: </label>
                        <div class="col-md-4">
                          <input type="password" name="txtPassword" data-parsley-equalto="#contra" 
                          data-parsley-equalto-message="No coincide la contraseña" required>
                        </div>
                      </div>
                      
                      <br>
                      <br>

                      <div class="form-group">
                        <label class="col-md-3 control-label">Nueva: </label>
                        <div class="col-md-4">
                          <input type="password" name="txtNueva" id="nueva" required>
                        </div>
                      </div>

                      <br>
                      <br>
                      
                      <div class="form-group">
                        <label class="col-md-3 control-label">Reconfirmar: </label>
                        <div class="col-md-4">
                          <input type="password" data-parsley-equalto="#nueva" required>
                        </div>
                      </div>
                    </center>

                    <br>
                    <br>

                    <center>
                      <button type="submit" name="action" value="btnContinuar"> Continuar</button>
                    </center>

                  
                  </form> 
                </div>
              </section>
            </div>       
          </div>
        </div>
      </div>
    </div>

















