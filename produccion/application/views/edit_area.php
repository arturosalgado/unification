<a href="<?= $site ?>/areas">Regresar</a>
<form name="form1" method="post" action="<?= $site ?>/areas/editarea">
<fieldset>
<legend>&Aacute;rea</legend>
<input type="hidden" name="idarea" value="<?= $idarea ?>">
<p>
  <label for="nombre">Nombre</label>
  <input type="text" name="nombre" id="nombre" value="<?= $area['nombre'] ?>">
</p>
<p>
  <label for="descripcion">Descripción</label>
  <input type="text" name="descripcion" id="descripcion" value="<?= $area['descripcion'] ?>">
</p>
<p>
  <label for="creacion">Fecha de creación</label>
  <input class="datepicker" type="text" name="creacion" id="creacion" value="<?= $area['creacion'] ?>">
</p>
<p>
	<label for="idPadre">Subcategoría de:</label>
    <select name="idPadre">
    	<option value="0">Ninguno</option>
        <?php foreach($areas as $area_t){ ?>
        <option value="<?= $area_t['id']?>" <?php if($area_t['nombre']==$area['subarea'])echo 'selected = "selected"' ?>><?= $area_t['nombre']?></option>
        <?php } ?>
    </select>
</p>
<p>
  <input type="submit" name="button" id="button" value="Submit">
</p>
</fieldset>
</form>