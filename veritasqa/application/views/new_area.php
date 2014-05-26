<a href="<?= $site ?>/areas">Regresar</a>
<form name="form1" method="post" action="<?= $site ?>/areas/saveNew">
<fieldset>
<legend>&Aacute;rea</legend>
<p>
  <label for="nombre">Nombre</label>
  <input type="text" name="nombre" id="nombre">
</p>
<p>
  <label for="descripcion">Descripción</label>
  <input type="text" name="descripcion" id="descripcion">
</p>
<p>
  <label for="creacion">Fecha de creación</label>
  <input class="datepicker" type="text" name="creacion" id="creacion">
</p>
<p>
	<label for="idPadre">Subcategoría de:</label>
    <select name="idPadre">
    	<option value="0">Ninguno</option>
        <?php foreach($areas as $area){ ?>
        <option value="<?= $area['id']?>"><?= $area['nombre']?></option>
        <?php } ?>
    </select>
</p>
<p>
  <input type="submit" name="button" id="button" value="Submit">
</p>
</fieldset>
</form>