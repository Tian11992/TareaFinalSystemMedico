<?php require_once 'header.php'; ?>

        <h1>Menú Pacientes</h1>

        <table border="1">
            <thead>
                <tr>
                    <th>Tipo Documento</th>
                    <th>Número Documento</th>
                    <th>Paciente</th>
                    <th>Género</th>
                    <th>Edad</th>
                    <th>Modificar</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($consultaPacientes as $dato): ?>
                <tr>
                    <td><?= $dato['documento']; ?></td>
                    <td><?= $dato['numerodocumento']?></td>
                    <td><?= $dato['paciente']?></td>
                    <td><?= $dato['genero']?></td>
                    <td><?= $dato['edad']?></td>
                    
                    <td><a href="./?accion=modificarPaciente&documento=<?php echo $dato['numerodocumento']; ?>">Modificar</a></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>


        <br>
        <br>
        <br>
        <a href="./?accion=mostrarInserccion">Volver</a>
<?php require_once 'footer.php'; ?>