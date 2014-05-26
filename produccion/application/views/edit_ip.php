<a href="<?= $site ?>/ips">Regresar</a>
<form name="form1" method="post" action="<?= $site ?>/ips/editip">
    <fieldset>
        <legend>Ip</legend>
        <input type="hidden" name="idip" value="<?= $ip['idip'] ?>">
        <p>
            <label for="nombre">Ip</label>
            <input type="text" name="ip" id="ip" value="<?= $ip['ip'] ?>" />
        </p>

        <p>
            <label for="rol">Area</label>
            <select name="idarea" id="idarea">
                <option value="">Seleccione Una</option>
                <?php
                foreach($areas as $a){
                    $selected = $a['nombre']==$ip['area']?"selected='selected'":"";
                    ?>
                    <option value="<?= $a['id']?>" <?= $selected ?>><?= $a['nombre'] ?></option>
                    <?php } ?>
            </select>
        </p>

        <p>
            <input type="submit" name="button" id="button" value="Guardar">
        </p>
    </fieldset>
</form>