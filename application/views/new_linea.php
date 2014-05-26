<a href="<?= $site ?>/lineas">Regresar</a>
<form name="form1" method="post" enctype="multipart/form-data" action="<?= $site ?>/lineas/saveLinea">
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
    <label for="imagen">Imagen del Auto</label>
    <input type="file" name="imagen" id="imagen">
</p>

<p>
    <label for="imagen2">Imagen del Auto (2)</label>
    <input type="file" name="imagen2" id="imagen2">
</p>


<p>
  <input type="submit" name="button" id="button" value="Submit">
</p>
</fieldset>
</form>