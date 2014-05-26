<a href="<?= $site ?>/documentos">Regresar</a>
<form name="form1" method="post" action="<?= $site ?>/documentos/saveNew" enctype="multipart/form-data">
<fieldset>
<legend>Documento</legend>
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
</p>
<p>
	<label for="idlinea">Pertenece a la línea:</label>
    <select name="idlinea">
    	<option value="0">Ninguno</option>
        <?php foreach($lineas as $linea){ ?>
        <option value="<?= $linea['id']?>"><?= $linea['nombre']?></option>
        <?php } ?>
    </select>
</p>

    <p>
        <label for="rol">Pertenece al &Aacute;rea </label>
        <select name="idarea" id="idarea">
            <option value="" selected="selected">Seleccione Una</option>
            <?php
            foreach($areas as $a){
                ?>
                <option value="<?= $a['id']?>"><?= $a['nombre'] ?></option>
                <?php } ?>
        </select>
    </p>

<label for="ruta">Seleccione el archivo</label>
<input type="file" name="ruta" id="ruta">
<p>
  <input type="submit" name="button" id="button" value="Submit">
</p>
</fieldset>
</form>