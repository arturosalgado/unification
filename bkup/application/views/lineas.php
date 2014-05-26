<a href="<?= $site ?>/dashboard">Regresar</a>
<h1>Administración de L&iacute;neas</h1>
<h3 id="nueva_linea"> <a href="<?= $site ?>/lineas/nueva">Crear nueva</a> </h3>

<form action="" method="post">
  <fieldset>
  <legend> Filtro </legend>
  
    <p>  
      <label> Nombre </label> <input name="fnombre" type="text" />
      </p>
      <p>
      <label> Descripcion </label> <input name="fdescripcion" type="text" />
      </p>
      <p>
      <input name="Filtrar" type="submit" value="Filtrar" />
      </p><br />

  </fieldset>

</form>
<br />

<table width="100%" border="0">

  <tr>
    <th>Id</th>
    <th>Nombre</th>
    <th>Descrpción</th>
    <th>Creación</th>
    <th>Creador</th>
    <th>QR</th>
    <th>Modiciar</th>
    <th>Eliminar</th>
  </tr>
<?php foreach($lineas as $linea){ ?>
  <tr>
    <td><?= $linea['id'] ?></td>
    <td><?= $linea['nombre'] ?></td>
    <td><?= $linea['descripcion'] ?></td>
    <td><?= $linea['creacion'] ?></td>
    <td><?= $linea['creador'] ?></td>
    <td><a href="<?= $site ?>/documentos/qr/<?=$linea['id']?>">generar</a></td>
    <td><a href="<?= $site ?>/lineas/edit/<?=$linea['id']?>">modificar</a></td>
    <td><a href="<?= $site ?>/lineas/delete/<?=$linea['id']?>">eliminar</a></td>
  </tr>
<?php } ?>
</table>

<p>&nbsp;</p>
