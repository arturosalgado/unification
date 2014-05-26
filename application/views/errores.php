<a href="<?= $site ?>/dashboard">Regresar</a>
<h1>Administración de C&oacute;digos de Falla</h1>
<h3 id="nueva_area"> <a href="<?= $site ?>/errores/nuevo">Crear nuevo</a> </h3>
<table width="100%" border="0">
  <tr>
    <th>Id</th>
    <th>Descripci&oacute;n</th>
    <th>C&oacute;digo</th>
    <th>Modificar</th>
    <th>Eliminar</th>
  </tr>
<?php foreach($errores as $error){ ?>
  <tr>
    <td><?= $error['iderror'] ?></td>
    <td><?= $error['descripcion'] ?></td>
    <td><?= $error['codigo'] ?></td>
    <td><a href="<?= $site ?>/errores/edit/<?=$error['iderror']?>">modificar</a></td>
    <td><a href="<?= $site ?>/errores/delete/<?=$error['iderror']?>">eliminar</a></td>
  </tr>
<?php } ?>
</table>

<p>&nbsp;</p>
