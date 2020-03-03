<?php require_once('header.php'); ?>

	<h1>Menú Historial</h1>

	<form action="./?accion=insertarHistoria" method="POST">
		<p>Paciente:
			<select name="selpaciente">
				<option value="">Seleccione...</option>
				<?php foreach($consultarPacientes as $datopaciente): ?>
					<option value="<?=$datopaciente['numerodocumento']?>"><?= $datopaciente['paciente']?></option>
				<?php endforeach; ?>
			</select>	
		</p>

		<p>Médico:
			<select name="selmedico">
				<option value="">Seleccione...</option>
				<?php foreach($consultaDoctores as $datodoctor): ?>
					<option value="<?=$datodoctor['numerodocumento']?>"><?= $datodoctor['nombre']?></option>
				<?php endforeach; ?>
			</select>
		</p>

		<p>Observación: <input type="text" name="txtobservacion"></p>

		<input type="submit" value="Guardar Historia" name="btnguardarhistoria">
	</form>

	<br>
	<br>
	<br>

	<table border="1">
		<thead>
			<tr>
				<th>Tipo Documento</th>
				<th>Paciente</th>
				<th>Ver</th>
				<th>Eliminar</th>
			</tr>
		</thead>
		<tbody>	
			<?php foreach($consultaHistorial as $dato): ?>
				<tr>
					<td><?= $dato['documento']; ?></td>
					<td><?= $dato['paciente']; ?></td>
					<td><a href="./?accion=verHistorial&id=<?php echo $dato['idpaciente']; ?>">Ver</a></td>
					<td><a href="./?accion=eliminarHistorial&id=<?php echo $dato['idhistoria']; ?>">Eliminar</a></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	<br>
	<br>
	<a href="./">Volver</a>

<?php require_once('footer.php'); ?>