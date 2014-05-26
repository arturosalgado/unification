<a href="<?= $site ?>/ndps">Regresar</a>
<form name="form1" method="post" enctype="multipart/form-data" action="<?= $site ?>/ndps/editNew/<?= $id ?>" id="validform">
    <fieldset>
        <legend>N&uacute;mero de Parte</legend>
        <p>
            <label for="nombre">N&uacute;mero de parte</label>
            <input type="text" name="nombre" id="nombre" required="required" value="<?= $ndp['nombre']; ?>">
            <input type="hidden" name="idndp" id="idndp" value="<?= $id ?>">
        </p>

        <p>
            <label for="rol">Descripci&oacute;n</label>
            <input type="text" name="descripcion" id="descripcion" required="required" value="<?= $ndp['descripcion']; ?>">
        </p>
        
        <p>
            <label for="rol">Imagen</label>
            <input type="file" name="imagen" id="imagen">
        </p>
        <p>
          <label for="rol">Activo en el turno: </label>
            <select name="idturno" id="idturno">
            	<option>Seleccione Uno</option>
                <?php foreach($turnos as $turno){ ?>
                <?php $selected = $turno['idturno'] == $ndp['idturno']?"selected='selected'":''; ?>
                <option value="<?= $turno['idturno']?>" <?= $selected ?>><?= $turno['nombre'] ?></option>
                <?php } ?>
            </select>
        </p>
        
        <p>
            <label>Cliente</label>
          <input type="text" name="cliente" id="cliente" value="<?= $ndp['cliente'] ?>" required="required">
        </p>
        
        <p>
            <input type="submit" name="button" id="button" value="Guardar">
        </p>
    </fieldset>
</form>