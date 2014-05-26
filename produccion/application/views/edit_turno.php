<a href="<?= $site ?>/turnos">Regresar</a>
<form name="form1" method="post" action="<?= $site ?>/turnos/editTurno">
<fieldset>
<legend>Turno</legend>
<input type="hidden" id="idturno" name="idturno" value="<?= $id ?>" />
<p>
  <label for="nombre">Nombre</label>
  <input type="text" name="nombre" id="nombre" value="<?= $turno['nombre'] ?>">
</p>
<p>
  <label for="descripcion">Inicio</label>
  <input type="text" name="inicio" id="inicio" value="<?= $turno['inicio'] ?>">
</p>
<p>
  <label for="creacion">T&eacute;rmino</label>
  <input type="text" name="fin" id="fin" value="<?= $turno['fin'] ?>">
</p>

<p>
  <input type="submit" name="button" id="button" value="Submit">
</p>
</fieldset>
</form>