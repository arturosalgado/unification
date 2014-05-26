<a href="<?= $site ?>/errores">Regresar</a>
<form name="form1" method="post" action="<?= $site ?>/errores/editError">
<fieldset>
<legend>Error</legend>
<input type="hidden" id="iderror" name="iderror" value="<?= $id ?>" />
<p>
  <label for="nombre">C&oacute;digo</label>
  <input type="text" name="codigo" id="codigo" value="<?= $error['codigo'] ?>">
</p>

<p>
  <label for="descripcion">Descripci&oacute;n</label>
  <input type="text" name="descripcion" id="descripcion" value="<?= $error['descripcion'] ?>">
</p>

<p>
  <input type="submit" name="button" id="button" value="Submit">
</p>
</fieldset>
</form>