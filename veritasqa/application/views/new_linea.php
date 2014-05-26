<a href="<?= $site ?>/lineas">Regresar</a>
<form name="form1" method="post" enctype="multipart/form-data" action="<?= $site ?>/lineas/saveLinea">
<fieldset>
<legend>Unidad de Producci&oacute;n</legend>
<p>
  <label for="nombre">Nombre</label>
  <input type="text" name="nombre" id="nombre" required="required">
</p>
<p>
  <label for="descripcion">Descripción</label>
  <input type="text" name="descripcion" id="descripcion" required="required">
</p>
<p>
  <label for="creacion">Fecha de creación</label>
  <input class="datepicker" type="text" name="creacion" id="creacion" required="required">
  <input type="hidden" name="creador" id="creador" value="<?= $usuario ?>"/>
</p>

<p>
  <label for="creacion">Cliente</label>
  <input type="text" name="creacion" id="creacion" required="required">
  <input type="hidden" name="creador" id="creador" value="<?= $usuario ?>"/>
</p>

<p>
    <label for="imagen">Imagen</label>
    <input type="file" name="imagen" id="imagen">
</p>



<p>
  <input type="submit" name="button" id="button" value="Submit">
</p>
</fieldset>
</form>