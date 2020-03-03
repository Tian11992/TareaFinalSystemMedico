<?php require_once('header.php'); ?>

	<form action="./?accion=insertarDoctores" method="POST">

		<p>Tipo Documento:
			<select name="seltipodoc">
				<option value="">Seleccione...</option>
				<?php foreach($consultarTipoDocumento as $dato): ?>
					<option value="<?=$dato['idtipodoc']?>"><?= $dato['nombre']?></option>
				<?php endforeach; ?>
			</select>	
		</p>

		<p>Número Documento: <input type="text" name="txtnumerodocumento"></p>

		<p>Nombre: <input type="text" name="txtnombre"></p>

		<input type="submit" value="Guardar Doctor" name="btnguardardoctor">
	</form>

	<br>
	<br>
	<br>

	<table border="1">
		<thead>
			<tr>
				<th>Tipo Documento</th>
				<th>Número Documento</th>
				<th>Doctor</th>
				<th>Modificar</th>
			</tr>
		</thead>
		<tbody>	
			<?php foreach($consultaDoctores as $dato): ?>
				<tr>
					<td><?= $dato['documento']; ?></td>
					<td><?= $dato['numerodocumento']; ?></td>
					<td><?= $dato['nombre']; ?></td>
					<td><a href="./?accion=modificarDoctor&documento=<?php echo $dato['numerodocumento']; ?>">Modificar</a></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	<br>
	<br>
	<a href="./">Volver</a>

<?php require_once('footer.php'); ?>