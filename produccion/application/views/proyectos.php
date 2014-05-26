<a href="<?= $site ?>/dashboard">Regresar</a>
<h1>Administración de Proyectos</h1>
<h3 id="nueva_area"> <a href="<?= $site ?>/usuarios/nuevo">Crear nuevo</a> </h3>
<table width="100%" border="0">
  <tr>
    <th>Id</th>
    <th>Nombre del Proyecto</th>
    <th>Responsable</th>
    <th>Cliente</th>
    <th>Modiciar</th>
    <th>Eliminar</th>
  </tr>
<!--
<?php foreach($usuarios as $usuario){ ?>
  <tr>
    <td><?= $usuario['idusuario'] ?></td>
    <td><?= $usuario['username'] ?></td>
    <td><?= $usuario['passwd'] ?></td>
    <td><?= $usuario['nombre'] ?></td>
    <td><a href="<?= $site ?>/usuarios/edit/<?=$usuario['idusuario']?>">modificar</a></td>
    <td><a href="<?= $site ?>/usuarios/delete/<?=$usuario['idusuario']?>">eliminar</a></td>
  </tr>
<?php } ?>
-->
<tr>
    <td>1</td>
    <td>Proyecto 1</td>
    <td>Juan Perez</td>
    <td>Audi</td>
    <td><a href="<?= $site ?>/usuarios/edit/<?=$usuario['idusuario']?>">modificar</a></td>
    <td><a href="<?= $site ?>/usuarios/delete/<?=$usuario['idusuario']?>">eliminar</a></td>
  </tr>
</table>

<p>&nbsp;</p>
