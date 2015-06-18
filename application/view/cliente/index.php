<br>
<form action="<?php echo URL; ?>cliente/index" data-parsley-validate method="post">
	<label>Cedula: </label>
	<input type="text" name="txtCedula"  id="tcedula" autofocus="true" value="<?php echo trim($cedula);?>"
	 data-parsley-trigger="change" data-parsley-length="[1,12]" data-parsley-length-message="Ingrese un maximo de 12 datos"
	 data-parsley-type="integer" data-parsley-type-message="Debe ingresar valores numericos" disabled="true" ><br>

	<label>Nombre: </label>
	<input type="text" name="txtNombre" id="tnombre" disabled="true" value="<?php echo trim($nombre);?>"
	><br>

	<label>Correo: </label>
	<input type="email" name="txtCorreo" id="tcorreo" disabled="true" value="<?php echo trim($correo);?>"
	data-parsley-trigger="change" data-parsley-type="email" data-parsley-type-message="Debe contener un caracter @ y ."  ><br>

	<label id="lblcontra">Contraseña: </label>
	<input type="password" name="txtPassword" id="tcontra" disabled="true" 
	data-parsley-trigger="change" data-parsley-length="[6,40]" data-parsley-lenhgth-message="La contraseña debe tener como minimo 6 caracteres"
	><br>

	<input type="hidden" name="txtRol" value="23" onfocus="this.blur()">
	<br> 
	<br>

	<button type="button" id="bregistrar" onclick="rbtnRegistrarCliente()">Registrar</button> 
	<button type="submit" name="action"  id="btnguardar" value="btnRegistrar"  style="display:none;">Guardar</button>
	<!-- <button type="button" id="bmodificar" onclick="rbtnModificar()">Modificar</button>
	<button type="submit" name="action" id="btnmodificar" value="btnModificar" style="display:none;">Actualizar</button> -->

</form>
<br>
<!-- <table border="1px" width="600px" >
	<thead>	
		<th>Cedula</th>
		<th>Nombre</th>
		<th>Correo</th>
		<th>Estado</th>
		<th>Rol</th>
		<th>Opciones</th>
	</thead>
	<tbody>
		<?php echo $this->tabla; ?>
	</tbody>
</table> -->




