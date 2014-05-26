<a href="<?= $site ?>/dashboard">Regresar</a>
<h1>Administración de Áreas</h1>
<h3 id="nueva_area"> <a href="<?= $site ?>/areas/nueva">Crear nueva</a> </h3>
<table width="100%" border="0">
  <tr>
    <th>Id</th>
    <th>Nombre</th>
    <th>Descripción</th>
    <th>Creación</th>
    <th>Subarea de</th>
    <th>Modiciar</th>
    <th>Eliminar</th>
  </tr>
<?php foreach($areas as $area){ ?>
  <tr>
    <td><?= $area['id'] ?></td>
    <td><?= $area['nombre'] ?></td>
    <td><?= $area['descripcion'] ?></td>
    <td><?= $area['creacion'] ?></td>
    <td><?= $area['subarea'] ?></td>
    <td><a href="<?= $site ?>/areas/edit/<?=$area['id']?>">modificar</a></td>
    <td><a href="<?= $site ?>/areas/delete/<?=$area['id']?>">eliminar</a></td>
  </tr>
<?php } ?>
</table>

<p>&nbsp;</p>
