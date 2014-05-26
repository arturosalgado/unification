<?php 
date_default_timezone_set("America/Mexico_City");
?>

<script>
$(function() {
    var availableTags = [
      <?php foreach($lineas as $linea){ 
		   echo  '"'.$linea['nombre'].'",';
        } ?>
    ];
    $( "#lineas" ).autocomplete({
      source: availableTags
    });
  });
  </script>
<a href="<?= $site ?>/producciones/">Regresar</a>
<form name="form1" method="post" action="<?= $site ?>/producciones/update">
<fieldset>
<legend>&Oacute;rden de Producción</legend>
<span>Elija una opcion borrando el nombre de la linea y utilizando la funci&oacute;n autocompletar</span>
<p>
	<label for="idlinea">L&iacute;nea</label>
    <input type="text" required="required"  name="linea" id="lineas" value="<?= $produccion['linea'] ?>"/>
    <!--<select name="idlinea">
    	<option value="0">Ninguno</option>
        <?php foreach($lineas as $linea){ ?>
        <option value="<?= $linea['id']?>"><?= $linea['nombre']?></option>
        <?php } ?>
    </select> -->
</p>

<input type="hidden" value="<?= $produccion['idproduccion'] ?>"  name="id"/>

<p>
  <label for="nombre">Responsables (separe por comas)</label>
  <?php 
  	$strprodres =  $produccion['responsable1'];
	$strprodres .= $produccion['responsable2']>0?", ".$produccion['responsable2']:"";
	$strprodres .= $produccion['responsable3']>0?", ".$produccion['responsable3']:"";
  ?>
  <input type="text" name="responsable" id="responsable" required="required" value="<?= $strprodres ?>">
</p>




<p>
  <input type="submit" name="button" id="button" value="Submit">
</p>
</fieldset>
</form>