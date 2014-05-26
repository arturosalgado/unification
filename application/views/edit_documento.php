<a href="<?= $site ?>/documentos">Regresar</a>
<form name="form1" method="post" action="<?= $site ?>/documentos/editdocumento" enctype="multipart/form-data">
<fieldset>
<legend>Documento</legend>
<input type="hidden" name="iddocumento" value="<?= $iddocumento ?>">
<p>
  <label for="nombre">Nombre</label>
  <input type="text" name="nombre" id="nombre" value="<?= $documento['nombre'] ?>">
</p>
<p>
  <label for="descripcion">Descripción</label>
  <input type="text" name="descripcion" id="descripcion" value="<?= $documento['descripcion'] ?>">
</p>

<p>
	<label for="idlinea">L&iacute;nea:</label>
    <select name="idlinea">
    	<option value="0">Ninguno</option>
        <?php foreach($lineas as $linea){ ?>
        <option value="<?= $linea['id']?>" <?php if($linea['nombre']==$documento['linea'])echo 'selected = "selected"' ?>><?= $linea['nombre']?></option>
        <?php } ?>
    </select>
</p>

    <p>
        <label for="rol">Area</label>
        <select name="idarea" id="idarea">
            <option value="">Seleccione Una</option>
            <?php
            foreach($areas as $a){
                $selected = $a['id']==$documento['area']?"selected='selected'":"";
                ?>
                <option value="<?= $a['id']?>" <?= $selected ?>><?= $a['nombre'] ?></option>
                <?php } ?>
        </select>
    </p>
    
    <p>
<label for="ruta">Seleccione el archivo (deje en blanco para no cambiarlo)</label>
<input type="file" name="ruta" id="ruta">
</p>
<p>
  <input type="submit" name="button" id="button" value="Submit">
</p>
</fieldset>
</form>