<a href="<?= $site ?>/lineas">Regresar</a>
<form name="form1" method="post" action="<?= $site ?>/lineas/saveLinea">
<fieldset>
<legend>L&iacute;nea</legend>
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
  <input type="hidden" name="creador" id="creador" value="<?= $usuario ?>"/>
</p>
<p>
  <input type="submit" name="button" id="button" value="Submit">
</p>
</fieldset>
</form>