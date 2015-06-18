 <div class="modal fade" id="Chat"  aria-labelledby="myModalLabel" aria-hidden="true">
        <div  class="modal-dialog">
          <div class="modal-content" style="background-color:#F0F8FF">

            <div  class="container-fluid">
              <section  style="padding: 5%;">
                <div class="row">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                  <h1 class="text-center" id="titLogin">Chat</h1>
                  <hr>
                </div>
                <div class="row">
                  <form id="formChat" role="form" name="Chat">
                    <div class="form-group">
                      <center>
                        <label class="col-md-3 control-label" id="letra"  for="nombre">Usuario: </label>
                        <div class="col-md-3">
                          <input type="text" class="control" name="user" placeholder="Usuario">
                        </div>
                      </center>
                    </div> 
                    
                    <div class="form-group">
                      <div class="row"> 
                        <div class="col-md-12" >
                          <div id="conversation" style="height:220px;  border: 1px solid #CCCCCC; padding: 10px;  border-radius: 5px; overflow-x: hidden;">
                          </div>
                        </div>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <center>
                        <label class="col-md-3 control-label" id="letra"  for="nombre">Mensaje: </label>
                        <div class="col-md-3">
                          <input type="text" class="control" name="user" placeholder="Texto" rows="3"> 
                        </div>
                      </center>
                    </div><br>
                    <br>
                    <center>
                      <button id="send" class="btn" >Enviar</button>
                    </center>
                  </form> 
                </div>
              </section>
            </div>       
          </div>
        </div>
      </div>