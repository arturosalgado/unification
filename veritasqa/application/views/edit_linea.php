<a href="<?= $site ?>/lineas">Regresar</a>
<form name="form1" method="post" action="<?= $site ?>/lineas/editlinea" enctype="multipart/form-data">
<fieldset>
<legend>Unidad de Producci&oacute;n</legend>
<input type="hidden" name="idlinea" value="<?= $idlinea ?>">
<p>
  <label for="nombre">Nombre: </label>
  <input type="text" name="nombre" id="nombre" value="<?= $linea['nombre'] ?>">
</p>
<p>
  <label for="descripcion">Descripción: </label>
  <input type="text" name="descripcion" id="descripcion" value="<?= $linea['descripcion'] ?>">
</p>
<p>
  <label for="creacion">Fecha de creación: </label>
  <input class="datepicker" type="text" name="creacion" id="creacion" value="<?= $linea['creacion'] ?>">
</p>
<p>
	<label for="idarea">Creador: </label>
    <input type="text" disabled="disabled" name="creador" id="creador" value="<?= $linea['creador'] ?>" />
</p>


<p>
    <label for="imagen">Imagen (dejar en balnco para no modificar) </label>
    <input type="file" name="imagen" id="imagen">
</p>


<p>
  <input type="submit" name="button" id="button" value="Submit">
</p>
</fieldset>
</form>