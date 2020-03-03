<?php require_once 'header.php'; ?>

        <h1>Modificar Doctores</h1>

        <form action="./?accion=guardarCambiosDoctor" method="POST">
            
            <?php foreach($consultaDoctor as $dato): ?>
            <p>Número Documento: <input type="text" name="txtnumerodocumento" value="<?= $dato['numerodocumento']?>" readonly></p>

            <p>Nombre: <input type="text" name="txtnombre" value="<?=$dato['nombre']?>"></p>

            <p>Tipo Documento:
                <select name="seltipodoc">
                    <?php foreach($consultarTipoDocumento as $datodocumento): ?>
                        <option <?= $datodocumento['idtipodoc'] == $dato['tipodoc'] ? "selected='selected'" : '' ?> value="<?=$datodocumento['idtipodoc']?>"><?= $datodocumento['nombre']?></option>
                    <?php endforeach; ?>
                </select>   
            </p>

            <input type="submit" value="Guardar Doctor" name="btnguardardoctor">
            <?php endforeach; ?>
        </form>        


        <br>
        <br>
        <br>
        <a href="./?accion=menuDoctores">Volver</a>
<?php require_once 'footer.php'; ?>