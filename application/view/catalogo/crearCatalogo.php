<br>
<form action="<?php echo URL; ?>catalogo/index" method="post">
	<label>Nombre Catalogo: </label>
	<input type="text" name="txtNombre" id="catalogo" value="<?php echo trim ($nombre); ?>" disabled="true"><br>
	<input type="hidden" name="txtIdCatalogo" value="<?php echo trim ($idCatalogo); ?>"  >
	<input type="hidden" name="txtEstado">
	<br>
	<label>Descripcion:</label>
	<textarea rows="4" cols="50" name = "txtDescripcion" id="descripcion" disabled="true"> <?php echo $descripcion; ?></textarea><br>
	<br>

	<button type="button" id="BuRegistar" onclick="ButtonRegistrar()" >Registrar</button>
	<button type="submit" name="action" value="btnRegistrar" id="btnguardar" style="display:none;">Guardar</button>
	<button type="button" id="BuActualizar" onclick="ButtonActualizar()">Actualizar</button>
	<button type="submit" name="action" id="bModificar" value="btnModificar" style="display:none;">Modificar</button>
    <button type="submit" name="action" id="bListar" value="btnListar">Listar</button>
    
</form>
<br>
	<table>
				<thead>
					<th colspan=2>Catalogos</th>
					<tr>
						<th>Codigo</th>
						<th>Nombre</th>
						<th>Descripción</th>
						<th>Estado</th>
						<th>Opción</th>
					</tr>
				</thead>
				<tbody>
					<?php echo $this->tabla; ?>
				</tbody>
			</table>
</form>

			
