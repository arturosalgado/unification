<a href="<?= $site ?>/ndps">Regresar</a>
<h1>Administración de Características</h1>
<h3 id="nueva_area"> <a href="<?= $site ?>/features/nueva/<?= $id ?>">Crear nueva</a> </h3>
<table width="100%" border="0">
  <tr>
    <th>Id</th>
    <th>Nombre</th>
    <th>C&oacute;digo</th>
    <th>Unidad de Medida</th>
    <th>Modificar</th>
    <th>Eliminar</th>
  </tr>
<?php foreach($features as $feature){ ?>
  <tr>
    <td><?= $feature['idndp_feature'] ?></td>
    <td><?= $feature['nombre'] ?></td>
    <td><?= $feature['codigo'] ?></td>
    <td><?= $feature['udm'] ?></td>
    <td><a href="<?= $site ?>/ndps/edit/<?=$feature['idndp_feature']?>">modificar</a></td>
    <td><a href="<?= $site ?>/ndps/delete/<?=$feature['idndp_feature']?>">eliminar</a></td>
  </tr>
<?php } ?>
</table>

<p>&nbsp;</p>
