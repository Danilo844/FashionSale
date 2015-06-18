<br>
<form action="<?php echo URL; ?>usuario/index" data-parsley-validate method="post">
	<label>Cedula: </label>
	<input type="text" name="txtCedula" value="<?php echo trim($cedula);?>" autofocus="true"
	 data-parsley-trigger="change" data-parsley-maxlength="15" data-parsley-length-message="Ingrese un maximo de 15 datos"
	 data-parsley-type="integer" data-parsley-type-message="Debe ingresar valores numericos"><br>

	<label>Nombre: </label>
	<input type="text" name="txtNombre" value="<?php echo trim($nombre);?>"
	><br>

	<label>Correo: </label>
	<input type="email" name="txtCorreo" value="<?php echo trim($correo);?>"
	data-parsley-trigger="change" data-parsley-type="email" data-parsley-type-message="Debe contener un caracter @ y ."><br>

	<label>Contraseña: </label>
	<input type="password" name="txtPassword" value="<?php echo trim($pass);?>"
	data-parsley-trigger="change"  data-parsley-minlength="6" data-parsley-minlength-message="La contraseña debe tener como minimo 6 caracteres"
	><br>

	<label>Rol: </label>
		<select name="txtRol">
		<option>Seleccionar</option>
		
		<?php 
			echo $select;
		?>
	</select>
	<br>
	<input type="hidden" name="txtEstado">

	<button type="submit" name="action" value="btnRegistrar">Guardar</button>
	<button type="submit" name="action" value="btnModificar">Modificar</button>
<br>
<table border="1px" width="600px" >
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
</table>

<!-- http://live4dev.com/blog/plugins/parsley-validacion-de-formularios/ -->



