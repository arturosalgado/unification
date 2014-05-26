<a href="<?= $site ?>/reportes" data-role="button" data-transition="flip" data-ajax="false">Regresar</a>
<form action="<?= $site ?>/reportes/view_scrapfecha" method="post" data-ajax="false">
	<legend>Seleccione las líneas</legend>
    <p>
      <label for="textfield">Fecha</label><br/>
      <input type="text" name="fecha" id="fecha" class="datepicker" width="250" required="required">
    </p>
    <p>
    <label>Turno</label>
    <select name="idturno" required="required">
    	<option value="">Seleccione Uno</option>
        <?php foreach($turnos as $t){ ?>
        	<option value="<?= $t['idturno']?>"><?= $t['nombre']?></option>
        <?php } ?>
    </select>
    </p>
    
    <p>
<button aria-disabled="false" class="ui-btn-hidden" type="submit" data-theme="a">Consultar</button>
	</p>
</form>