<a href="<?= $site ?>/dashboard">Regresar</a>
<h1>Administración de Turnos</h1>
<h3 id="nueva_area"> <a href="<?= $site ?>/turnos/nuevo">Crear nuevo</a> </h3>
<table width="100%" border="0">
  <tr>
    <th>Id</th>
    <th>Nombre</th>
    <th>Hora de Inicio</th>
    <th>Hora de T&eacute;rmino</th>
    <th>Modificar</th>
    <th>Eliminar</th>
  </tr>
<?php foreach($turnos as $turno){ ?>
  <tr>
    <td><?= $turno['idturno'] ?></td>
    <td><?= $turno['nombre'] ?></td>
    <td><?= $turno['inicio'] ?></td>
    <td><?= $turno['fin'] ?></td>
    <td><a href="<?= $site ?>/turnos/edit/<?=$turno['idturno']?>">modificar</a></td>
    <td><a href="<?= $site ?>/turnos/delete/<?=$turno['idturno']?>">eliminar</a></td>
  </tr>
<?php } ?>
</table>

<p>&nbsp;</p>
