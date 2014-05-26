<script>
jQuery(document).ready(function(){
	var tags = [
					<?php foreach($lineas as $linea){ ?>
        			"<?= $linea['nombre'] ?>",
        			<?php } ?>
				];
	
	jQuery("#auto")autocomplete({
            source: tags
        });
	
	});

</script>
<form name="form1" method="post" action="<?= $site."/lineas/redirect" ?>">
  <p>
	<input id="auto" />
	<label for="idlinea">Nombre de la línea:</label>
    <select name="idlinea">
    	<option value="0">Ninguno</option>
        <?php foreach($lineas as $linea){ ?>
        <option value="<?= $linea['id']?>"><?= $linea['nombre']?></option>
        <?php } ?>
    </select>
</p>
  <p>
    <input type="submit" name="button" id="button" value="Submit">
  </p>
</form>
