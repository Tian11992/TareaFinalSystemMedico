<?php require_once('header.php'); ?>

	<h1>Historial de: <?= $consultaHistorial[0]['paciente']?></h1>
	<br>
	<?php foreach($consultaHistorial as $datos): ?>
		<h1>Por el médico: <?= $datos['doctor'];?></h1>
		

		<h2>Observación: <?= $datos['observacion']?></h2>
		<h3>Fecha: <?= $datos['fecha']?></h3>
	<?php endforeach; ?>

	<a href="./?accion=menuHistorial">Volver</a>
	
<?php require_once('footer.php'); ?>