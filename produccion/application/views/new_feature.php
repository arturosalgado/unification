<a href="<?= $site ?>/lineas">Regresar</a>
<form name="form1" method="post" action="<?= $site ?>/features/saveNew">
<fieldset>
<legend>L&iacute;nea</legend>
<p>
  <label for="nombre">Nombre</label>
  <input type="text" name="nombre" id="nombre">
</p>
<p>
  <label for="descripcion">Codigo</label>
  <input type="text" name="codigo" id="codigo">
</p>

<p>
  <label for="descripcion">Unidad de Medida</label>
  <input type="text" name="udm" id="udm">
</p>

<p>
  <label for="descripcion">M&aacute;ximo</label>
  <input type="text" name="maximo" id="maximo">
</p>

<p>
  <label for="descripcion">M&iacute;nimo</label>
  <input type="text" name="minimo" id="minimo">
  <input type="hidden" value="<?= $id ?>" name="id" id="id" />
</p>

<p>
  <input type="submit" name="button" id="button" value="Submit">
</p>
</fieldset>
</form>