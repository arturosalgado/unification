<a href="<?= $site ?>/errores">Regresar</a>
<form name="form1" method="post" action="<?= $site ?>/errores/saveError">
<fieldset>
<legend>Turno</legend>
<p>
  <label for="nombre">Codigo</label>
  <input type="text" name="codigo" id="codigo" required="required">
</p>
<p>
  <label for="descripcion">Descripcion</label>
  <input type="text" name="descripcion" id="descripcion" required="required">
</p>

<p>
  <input type="submit" name="button" id="button" value="Submit">
</p>
</fieldset>
</form>