<br>
<form action="<?php echo URL; ?>datosPersonales/index" method="post">
	<label>Cedula: </label>
	<input type="text" name="txtCedula" id="txtCedula" disabled="true" value="<?php echo $cedula;?>" OnFocus="this.blur()"><br>
	<br>
	<label>Nombre: </label>
	<input type="text" name="txtNombre" id="txtNombre" disabled="true" value="<?php echo $nombre;?>"><br>
	<br>
	<label>Correo: </label>
	<input type="Email" name="txtCorreo" id="txtCorreo" disabled="true" value="<?php  echo $correo;?>"><br>
	<br>
	<input type="hidden" name="txtEstado">

	<a href="javascript:location.reload()">Actualizar</a> <br>
	<br>

 	<a href="" class="hsubs" data-toggle="modal" data-target="#cambiarPassword">Cambiar contraseña</a> <br>
  	<br>
 
	<button type="button" id="btnModificar" onclick="datosPersonas()">Modificar</button>
	<button type="submit" name="action" value="btnGuardar" id="btnGuardar" style='display:none;'>Guardar</button>
	
	<script>
	function hola(){
	location.href=location.href;
	}
	</script>

</form>	

 <?php 
      include('../application/view/models/cambiarContra.php');
  ?>




    
