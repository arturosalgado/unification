<a href="<?= $site ?>/ndp">Regresar</a>
<form name="form1" method="post" action="<?= $site ?>/features/update" id="validform">
<fieldset>
<legend>L&iacute;nea</legend>
<p>
  <label for="nombre">Nombre</label>
  <input type="text" name="nombre" id="nombre" required="required" value="<?= $feature['nombre']?>">
</p>
<input type="hidden" value="<?= $ndp ?>" name="ndp"/>
<input type="hidden" value="<?= $id ?>" name="id" />
<p>
  <label for="descripcion">Codigo</label>
  <input type="text" name="codigo" id="codigo" required="required" maxlenght="15" value="<?= $feature['codigo']?>">
</p>
<p>
  <label for="descripcion">Unidad de Medida</label>
  <input type="text" name="udm" id="udm" required="required" value="<?= $feature['udm']?>">
</p>

<p>
  <label for="descripcion">Media</label>
  <input type="number" name="media" id="media" required="required" min="0.0001" max="10000" step="any" value="<?= $feature['media']?>">
</p>

<p>
  <label for="descripcion">Tolerancia</label>
  <input type="number" name="tolerancia" id="tolerancia" required="required" min="0.0001" max="10000" step="any" value="<?= $feature['tolerancia']?>">
  <input type="hidden" value="<?= $id ?>" name="id" id="id" />
</p>

<p>
  <input type="submit" name="button" id="button" value="Submit">
</p>
</fieldset>
</form>