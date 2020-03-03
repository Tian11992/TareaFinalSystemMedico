<?php require_once 'header.php'; ?>

        <h1>Modificar Pacientes</h1>

        <form action="./?accion=guardarCambiosPaciente" method="POST">
            
            <?php foreach($consultaPaciente as $dato): ?>
            <p>Número Documento: <input type="text" name="txtnumerodocumento" value="<?= $dato['numerodocumento']?>" readonly></p>

            <p>Nombre: <input type="text" name="txtnombre" value="<?=$dato['nombre']?>"></p>
            <p>Apellidos: <input type="text" name="txtapellidos" value="<?= $dato['apellido']?>"></p>

            <p>Tipo Documento:
                <select name="seltipodoc">
                    <?php foreach($consultarTipoDocumento as $datodocumento): ?>
                        <option <?= $datodocumento['idtipodoc'] == $dato['tipodoc'] ? "selected='selected'" : '' ?> value="<?=$datodocumento['idtipodoc']?>"><?= $datodocumento['nombre']?></option>
                    <?php endforeach; ?>
                </select>   
            </p>

            <p>Género: 
                <select name="selgenero">
                    <?php foreach($consultarGeneros as $datogenero): ?>
                        <option <?= $datogenero['idgenero'] == $dato['genero'] ? "selected='selected'" : '' ?> value="<?= $datogenero['idgenero']?>"><?= $datogenero['nombre']?></option>
                    <?php endforeach; ?>
                </select>
            </p>

            <p>Edad: <input type="text" name="txtedad" value="<?= $dato['edad']?>"></p>

            <input type="submit" value="Guardar Paciente" name="btnguardarpaciente">
            <?php endforeach; ?>
        </form>        


        <br>
        <br>
        <br>
        <a href="./?accion=menuPacientes">Volver</a>
<?php require_once 'footer.php'; ?>