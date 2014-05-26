<a href="<?= $site ?>/ndp">Regresar</a>
<form name="form1" method="post" action="<?= $site ?>/features/saveNew" id="validform">
<fieldset>
<legend>L&iacute;nea</legend>
<p>
  <label for="nombre">Nombre</label>
  <input type="text" name="nombre" id="nombre" required="required">
</p>
<p>
  <label for="descripcion">Codigo</label>
  <input type="text" name="codigo" id="codigo" required="required" maxlenght="15">
</p>
<p>
  <label for="descripcion">Unidad de Medida</label>
  <input type="text" name="udm" id="udm" required="required">
</p>

<p>
  <label for="descripcion">Media</label>
  <input type="number" name="media" id="media" required="required" min="0.0001" max="10000" step="any">
</p>

<p>
  <label for="descripcion">Tolerancia</label>
  <input type="number" name="tolerancia" id="tolerancia" required="required" min="0.0001" max="10000" step="any">
  <input type="hidden" value="<?= $id ?>" name="id" id="id" />
</p>

<p>
  <input type="submit" name="button" id="button" value="Submit">
</p>
</fieldset>
</form>