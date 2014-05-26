<a href="<?= $site ?>/lineas">Regresar</a>

<?php 

$stringMat = "";
$stringMat .= isset($linea['c1'])&$linea['c1']!=""&$linea['c1']!="0"?$linea['c1'].",":"";
$stringMat .= isset($linea['c2'])&$linea['c2']!=""&$linea['c2']!="0"?$linea['c2'].",":"";
$stringMat .= isset($linea['c3'])&$linea['c3']!=""&$linea['c3']!="0"?$linea['c3'].",":"";
$stringMat .= isset($linea['c4'])&$linea['c4']!=""&$linea['c4']!="0"?$linea['c4'].",":"";
$stringMat .= isset($linea['c5'])&$linea['c4']!=""&$linea['c5']!="0"?$linea['c5'].",":"";
$stringMat .= isset($linea['c6'])&$linea['c6']!=""&$linea['c6']!="0"?$linea['c6'].",":"";
$stringMat .= isset($linea['c7'])&$linea['c7']!=""&$linea['c7']!="0"?$linea['c7'].",":"";
$stringMat .= isset($linea['c8'])&$linea['c8']!=""&$linea['c8']!="0"?$linea['c8'].",":"";
$stringMat .= isset($linea['c9'])&$linea['c9']!=""&$linea['c9']!="0"?$linea['c9'].",":"";
$stringMat .= isset($linea['c10'])&$linea['c10']!=""&$linea['c10']!="0"?$linea['c10'].",":"";
$stringMat .= isset($linea['c11'])&$linea['c11']!=""&$linea['c11']!="0"?$linea['c11'].",":"";
$stringMat .= isset($linea['c12'])&$linea['c12']!=""&$linea['c12']!="0"?$linea['c12'].",":"";
$stringMat .= isset($linea['c13'])&$linea['c13']!=""&$linea['c13']!="0"?$linea['c13'].",":"";
$stringMat .= isset($linea['c14'])&$linea['c14']!=""&$linea['c14']!="0"?$linea['c14'].",":"";
$stringMat .= isset($linea['c15'])&$linea['c15']!=""&$linea['c15']!="0"?$linea['c15'].",":"";
$stringMat .= isset($linea['c16'])&$linea['c16']!=""&$linea['c16']!="0"?$linea['c16'].",":"";
$stringMat .= isset($linea['c17'])&$linea['c17']!=""&$linea['c17']!="0"?$linea['c17'].",":"";
$stringMat .= isset($linea['c18'])&$linea['c18']!=""&$linea['c18']!="0"?$linea['c18'].",":"";
$stringMat .= isset($linea['c19'])&$linea['c19']!=""&$linea['c19']!="0"?$linea['c19'].",":"";
$stringMat .= isset($linea['c20'])&$linea['c20']!=""&$linea['c20']!="0"?$linea['c20'].",":"";



?>

<form name="form1" method="post" action="<?= $site ?>/lineas/editlinea" enctype="multipart/form-data">
<fieldset>
<legend>L&iacute;nea</legend>
<input type="hidden" name="idlinea" value="<?= $idlinea ?>">
<p>
  <label for="nombre">Nombre</label>
  <input type="text" name="nombre" id="nombre" value="<?= $linea['nombre'] ?>">
</p>
<p>
  <label for="descripcion">Descripción</label>
  <input type="text" name="descripcion" id="descripcion" value="<?= $linea['descripcion'] ?>">
</p>

<p>
  <label for="descripcion">Piezas por Hora</label>
  <input type="number" name="piezas" id="piezas" value="<?= $linea['piezas'] ?>">
</p>

<p>
  <label for="idarea">Creador:</label>
    <input type="text" disabled="disabled" name="creador" id="creador" value="<?= $linea['creador'] ?>" />
</p>
<p>
  <label for="proyecto">Proyecto</label>
  <input type="text" name="proyecto" id="proyecto" value="<?= $linea['proyecto']; ?>"/>
</p>
<p>
  <label for="ldm">Lista de Materiales (Separe por comas)</label>
  <textarea name="ldm" id="ldm" cols="45" rows="5"><?= $stringMat ?></textarea>
</p>

<fieldset>
	<legend>
	<input type="submit" name="button" id="button" value="Submit">
</legend>
</fieldset>
</fieldset>
</form>