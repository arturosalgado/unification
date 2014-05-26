<?php 
date_default_timezone_set("America/Mexico_City");
?>
<!--
<script>
$(function(){
	alert("I work");
		var tags = [
			<?php foreach($lineas as $linea){ 
		   echo  $linea['nombre'].",";
        } ?>
		];
		
		jQuery("#lineas").autocomplete({source: tags});
		
	
	});
	
</script> -->
<script>
$(function() {
    var availableTags = [
      <?php foreach($lineas as $linea){
		  $nombreLinea = strtolower($linea['nombre']); 
	  	  if(!strpos($nombreLinea, "obsoleto"))
		  	echo  '"'.$linea['nombre'].'",';
        } ?>
    ];
    $( "#lineas" ).autocomplete({
      source: availableTags
    });
  });
  </script>
<a href="<?= $site ?>/dashboard">Regresar</a>
<form name="form1" method="post" action="<?= $site ?>/producciones/saveNew">
<fieldset>
<legend>Órden de Producción</legend>
<p>
	<label for="idlinea">L&iacute;nea (utilize la funcion de autocompletar) </label>
    <input type="text" required  name="linea" id="lineas"/>
    <!--<select name="idlinea">
    	<option value="0">Ninguno</option>
        <?php foreach($lineas as $linea){ ?>
        <option value="<?= $linea['id']?>"><?= $linea['nombre']?></option>
        <?php } ?>
    </select> -->
</p>



<p>
  <label for="nombre">Responsables (separe por comas)</label>
  <input type="text" name="responsable" id="responsable" required>
</p>



<p>
  <input type="submit" name="button" id="button" value="Submit">
</p>
</fieldset>
</form>