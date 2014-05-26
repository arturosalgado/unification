<a href="<?= $site ?>/dashboard">Regresar</a>
<h1>Administración de Usuarios</h1>
<h3 id="nueva_area"> <a href="<?= $site ?>/usuarios/nuevo">Crear nuevo</a> </h3>
<table width="100%" border="0">
  <tr>
    <th>Id</th>
    <th>Nombre de Usuario</th>
    <th>Nombre</th>
    <th>Apellidos</th>
    <th>Rol</th>
    <th>Mail</th>
    <th>Area</th>
    <th>QR</th>
    <th>Modiciar</th>
    <th>Eliminar</th>
  </tr>
<?php foreach($usuarios as $usuario){ ?>
  <tr>
    <td><?= $usuario['idusuario'] ?></td>
    <td><?= $usuario['username'] ?></td>
    <td><?= $usuario['nombre'] ?></td>
    <td><?= $usuario['apellidos'] ?></td>
    <td><?= $usuario['rol'] ?></td>
    <td><?= $usuario['mail'] ?></td>
      <td><?= $usuario['area'] ?></td>
      <td><a href="<?= $site ?>/usuarios/qr/<?=$usuario['idusuario']?>">generar</a></td>
    <td><a href="<?= $site ?>/usuarios/edit/<?=$usuario['idusuario']?>">modificar</a></td>
    <td><a href="<?= $site ?>/usuarios/delete/<?=$usuario['idusuario']?>">eliminar</a></td>
  </tr>
<?php } ?>
</table>

<p>&nbsp;</p>
