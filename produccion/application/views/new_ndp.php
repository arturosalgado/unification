<a href="<?= $site ?>/ips">Regresar</a>
<form name="form1" method="post" enctype="multipart/form-data" action="<?= $site ?>/ndps/saveNew">
    <fieldset>
        <legend>N&uacute;mero de Parte</legend>
        <p>
            <label for="nombre">N&uacute;mero de parte</label>
            <input type="text" name="nombre" id="nombre">
        </p>

        <p>
            <label for="rol">Descripci&oacute;n</label>
            <input type="text" name="descripcion" id="descripcion">
        </p>
        
        <p>
            <label for="rol">Imagen</label>
            <input type="file" name="imagen" id="imagen">
        </p>

        <p>
            <input type="submit" name="button" id="button" value="Guardar">
        </p>
    </fieldset>
</form>