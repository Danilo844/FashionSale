<br>
<form action="<?php echo URL; ?>roles/index" method="post">
	<input type="hidden" name="txtId"  value="<?php echo $id; ?>">
	<br>
	<label>Nombre: </label>
	<input type="text" name="txtNombre" id="txtNombre" value="<?php echo $nombre; ?>" autofocus="true" disabled="true"><br>
	<br>
	<br>
	<button type="button" id="Registrar" onclick="rbtnRegistrar()">Registrar</button>
	<button type="submit" id="btnRegistrar" name="action" value="btnRegistrar" style='display:none;'>Guardar</button>
	<button type="button" id="Modificar" onclick="rbtnModificar()">Modificar</button>
	<button type="submit" id="btnModificar" name="action" value="btnModificar" style='display:none;'>Guardar</button>
	<br>
	<br>

	<a href="" class="hsubs" data-toggle="modal" data-target="#Permisos">Permisos para el rol</a>

</form>


<table border="1px">
	<thead>	
		<th>Rol</th>
		<th>Nombre</th>
		<th>Estado</th>
		<th>Opcion</th>
	</thead>
	<tbody>
		<?php echo $tabla; ?>
	</tbody>
</table>

<?php 
      include('../application/view/models/permisosRol.php');
  ?>