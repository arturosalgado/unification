<a href="<?= $site ?>/turnos">Regresar</a>
<form name="form1" method="post" action="<?= $site ?>/turnos/saveTurno">
<fieldset>
<legend>Turno</legend>
<p>
  <label for="nombre">Nombre</label>
  <input type="text" name="nombre" id="nombre">
</p>
<p>
  <label for="descripcion">Inicio</label>
  <input type="text" name="inicio" id="inicio">
</p>
<p>
  <label for="creacion">T&eacute;rmino</label>
  <input type="text" name="fin" id="fin">
</p>

<p>
  <input type="submit" name="button" id="button" value="Submit">
</p>
</fieldset>
</form>