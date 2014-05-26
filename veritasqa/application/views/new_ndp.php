<a href="<?= $site ?>/ndps">Regresar</a>
<form name="form1" method="post" enctype="multipart/form-data" action="<?= $site ?>/ndps/saveNew" id="validform">
    <fieldset>
        <legend>N&uacute;mero de Parte</legend>
        <p>
            <label for="nombre">N&uacute;mero de parte:</label>
            <input type="text" name="nombre" id="nombre" required="required">
        </p>

        <p>
            <label for="rol">Descripci&oacute;n:</label>
            <input type="text" name="descripcion" id="descripcion" required="required">
        </p>
        
        <p>
            <label for="rol">Imagen(el nombre de la imagen no debe contener espacios):</label>
            <input type="file" name="imagen" id="imagen" required="required">
        </p>
        
        <p>
            <label for="rol">Activo en el turno: </label>
            <select name="idturno" id="idturno">
            	<option>Seleccione Uno</option>
                <?php foreach($turnos as $turno){ ?>
                <option value="<?= $turno['idturno']?>"><?= $turno['nombre'] ?></option>
                <?php } ?>
            </select>
        </p>
        
        <p>
            <label>Cliente</label>
            <input type="text" name="cliente" id="cliente" required="required">
        </p>

        <p>
            <input type="submit" name="button" id="button" value="Guardar">
        </p>
    </fieldset>
</form>