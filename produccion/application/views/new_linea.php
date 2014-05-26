<a href="<?= $site ?>/lineas">Regresar</a>
<form name="form1" method="post" enctype="multipart/form-data" action="<?= $site ?>/lineas/saveLinea">
<fieldset>
<legend>L&iacute;nea</legend>
<p>
  <label for="nombre">Nombre</label>
  <input type="text" name="nombre" id="nombre" required="required">
</p>
<p>
  <label for="descripcion">Descripción</label>
  <input type="text" name="descripcion" id="descripcion" required="required">
</p>

<p>
  <label for="descripcion">Piezas por hora</label>
  <input type="number" name="piezas" id="piezas" required="required">
</p>

<p>
  <label for="nombre">Proyecto</label>
  <input type="text" name="proyecto" id="proyecto" required="required">
  <input type="hidden" name="creador" id="creador" value="<?= $usuario ?>"/>
</p>
<p>
  <label> Lista de Materiales (Separe por comas)</label>
    <textarea name="ldm" rows="3" required="required">
    </textarea>
</p>


<p>
  <input type="submit" name="button" id="button" value="Submit">
</p>
</fieldset>
</form>