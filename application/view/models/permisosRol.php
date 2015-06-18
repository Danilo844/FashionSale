<div class="modal fade" id="Permisos"  aria-labelledby="myModalLabel" aria-hidden="true">
      <div id="" class="modal show" tabindex="-1" role="dialog" aria-hidden="true">
        <div  class="modal-dialog">
          <div class="modal-content" style="background-color:#F0F8FF">

            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h1 class="text-center">Permisos</h1>
            </div>

            <div  class="container-fluid">
              <section  style="padding: 5%;">

                <div class="row">
                  <form action="<?php echo URL; ?>roles/index" data-parsley-validate method="post">

                    <center>

                      <div class="form-group">
                        <label class="col-md-3 control-label">Rol: </label>
                        <div class="col-md-4">
                          <select name="txtpRol">
                            <?php 
                              echo $select;
                            ?>
                          </select>
                        </div>
                      </div>
                      
                      <br>
                      <br>

                      <div class="form-group">
                        <label class="col-md-3 control-label">Permisos: </label>
                        <br>
                        <br>
                        <center>
                        <div class="col-md-0">
                        
                          <?php 
                            echo $permisos;
                          ?>
                        </div>
                        </center>
                      </div>           
                    </center>

                    <br>
                    <br>

                    <center>
                      <button type="submit" name="action" value="btnRegistrarR">Guardar</button>
                    </center>

                  
                  </form> 
                </div>
              </section>
            </div>       
          </div>
        </div>
      </div>
    </div>