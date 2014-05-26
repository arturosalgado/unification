<h1>Administración de Plan de Producción</h1>
<h3 id="nueva_area"> <a href="<?= $site ?>/producciones/nueva">Crear nueva</a> </h3>
<table width="100%" border="0">
  <tr>
    <th>Id</th>
    <th>Linea</th>
    <th>Responsable</th>
    <th>Fecha</th>
    <th>Piezas por Hora</th>
    <th>Modiciar</th>
    <th>Eliminar</th>
  </tr>
<?php foreach($producciones as $produccion){ ?>
  <tr>
    <td><?= $produccion['idproduccion'] ?></td>
    <td><?= $produccion['linea'] ?></td>
    <td><?= $produccion['responsable1'] ?></td>
    <td><?= $produccion['fecha'] ?></td>
    <td><?= $produccion['piezas'] ?></td>
    <td><a href="<?= $site ?>/producciones/edit/<?=$produccion['idproduccion']?>">modificar</a></td>
    <td><a href="<?= $site ?>/producciones/delete/<?=$produccion['idproduccion']?>">eliminar</a></td>
  </tr>
<?php } ?>
</table>

<p>&nbsp;</p>
