<form action="<?php echo URL; ?>comunicacion/index" method="post">
<br>
<input type="hidden" name="txtCodigo" value="<?php echo $codigo; ?>">
<br>
<br>
<label>Nombre: </label>
<input type="text" id="txtNombre" name="txtNombre" disabled="true" autofocus="true" value="<?php echo $nombre; ?>">
<br>
<br>
<label>Descripcion: </label>
​<textarea name="txtDescripcion" id="txtDescripcion" disabled="true" ><?php echo $descripcion; ?></textarea>
<br>
<br>
<a href="" class="hsubs" data-toggle="modal" data-target="#nuevaPublicacion">Publicaciones</a>
<br>
<br>
<button type="button" id="Registrar" onclick="cbtnRegistrar()">Registrar</button>
<button type="submit" id="btnRegistrar" name="action" value="btnRegistrar" style='display:none;' >Guardar</button>
<button type="button" id="Modificar" onclick="cbtnModificar()">Modificar</button>
<button type="submit" id="btnModificar" name="action" value="btnModificar" style='display:none;' >Guardar</button>
<br>
</form>
<br>

<table border="1px" width="600px" >
	<thead>	
		<th>Codigo</th>
		<th>Nombre</th>
		<th>Descripción</th>
		<th>Estado</th>
		<th>Opciones</th>
	</thead>
	<tbody>
		<?php echo $tabla; ?>
	</tbody>
</table>


<?php 
      include('../application/view/models/nuevaPublicacion.php');
  ?>