<a href="<?= $site ?>/ips">Regresar</a>
<form name="form1" method="post" action="<?= $site ?>/ips/saveNew">
    <fieldset>
        <legend>Ip</legend>
        <p>
            <label for="nombre">Ip</label>
            <input type="text" name="ip" id="ip">
        </p>

        <p>
            <label for="rol">Area</label>
            <select name="idarea" id="idarea">
                <option value="" selected="selected">Seleccione Una</option>
                <?php
                foreach($areas as $a){
                    ?>
                    <option value="<?= $a['id']?>"><?= $a['nombre'] ?></option>
                    <?php } ?>
            </select>
        </p>

        <p>
            <input type="submit" name="button" id="button" value="Guardar">
        </p>
    </fieldset>
</form>