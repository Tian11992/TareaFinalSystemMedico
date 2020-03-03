<?php require_once('header.php'); ?>
	
	<form action="./?accion=insertarPacientes" method="POST">

		<p>Nombre: <input type="text" name="txtnombre"></p>
		<p>Apellidos: <input type="text" name="txtapellidos"></p>

		<p>Tipo Documento:
			<select name="seltipodoc">
				<option value="">Seleccione...</option>
				<?php foreach($consultarTipoDocumento as $dato): ?>
					<option value="<?=$dato['idtipodoc']?>"><?= $dato['nombre']?></option>
				<?php endforeach; ?>
			</select>	
		</p>

		<p>Número Documento: <input type="text" name="txtnumerodocumento"></p>

		<p>Género: 
			<select name="selgenero">
				<option value="">Seleccione...</option>
				<?php foreach($consultarGeneros as $dato): ?>
					<option value="<?= $dato['idgenero']?>"><?= $dato['nombre']?></option>
				<?php endforeach; ?>
			</select>
		</p>

		<p>Edad: <input type="text" name="txtedad"></p>

		<input type="submit" value="Guardar Paciente" name="btnguardarpaciente">
	</form>

	<br>
	<br>
	<a href="./?accion=menuPacientes">Consultar Pacientes</a>
	<br>
	<a href="./">Volver</a>

<?php require_once('footer.php'); ?>