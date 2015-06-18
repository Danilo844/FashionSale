    <div class="modal fade" id="nuevaPublicacion"  aria-labelledby="myModalLabel" aria-hidden="true">
      <div id="" class="modal show" tabindex="-1" role="dialog" aria-hidden="true">
        <div  class="modal-dialog">
          <div class="modal-content" style="background-color:#F0F8FF">

            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h1 class="text-center">Publicaciones</h1>
            </div>

            <div  class="container-fluid">
              <section  style="padding: 5%;">

                <div class="row">
                  <form action="<?php echo URL; ?>comunicacion/index" data-parsley-validate method="post">

                    <center>
                    <input type="hidden" name="txtCodigoPubli" value="<?php echo $codigo ?>">
                    <input type="hidden" name="txtCreadorPubli" value="<?php echo $empCedula ?>">
                    <br>

                      <div class="form-group">
                        <label class="col-md-3 control-label">Comunicación: </label>
                        <div class="col-md-4">
                          <select name="txtComunicacionPubli">
                            <option>Seleccionar</option>
                            
                            <?php 
                              echo $select;
                            ?>
                          </select>
                        </div>
                      </div>
                      <br>
                      <br>

                      <div class="form-group">
                        <label class="col-md-3 control-label">Descripción: </label>
                        <div class="col-md-4">
                          <textarea name="txtdescripcionPubli"><?php echo $descripcion; ?></textarea>
                        </div>
                      </div>
                      
                      <br>
                      <br>
                      <br>

                      <div class="form-group">
                        <label class="col-md-3 control-label">Fecha inicio </label>
                        <div class="col-md-4">
                          <input type="datetime-local">
                        </div>
                      </div>

                      <br>
                      <br>

                      <div class="form-group">
                        <label class="col-md-3 control-label">Fecha de finalizacion </label>
                        <div class="col-md-4">
                          <input type="datetime-local">
                        </div>
                      </div>   
                      
                    </center>

                    <br>
                    <br>
                    <br>

                    <center>
                      <button type="submit" name="action" value="btnGuardarPubli"> Guardar</button>
                    </center>

                  
                  </form> 

                  <table border="1px" width="600px" >
                    <thead> 
                      <th>Codigo</th>
                      <th>Descripción</th>
                      <th>Fecha de inicio</th>
                      <th>Fecha de finalización</th>
                      <th>Comunicación</th>
                      <th>Empleado</th>
                      <th>Opciones</th>
                    </thead>
                    <tbody>
                      <?php echo $publicaciones; ?>
                    </tbody>
                  </table>

                </div>
              </section>
            </div>       
          </div>
        </div>
      </div>
    </div>