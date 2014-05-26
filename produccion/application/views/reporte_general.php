<a href="<?= $site ?>/reportes">Regresar</a>
<h1>Consulta de Documentos Vista General</h1>
<table width="100%" border="0">
  <tr>
    <th>Id</th>
    <th>Documento</th>
    <th>Ip</th>
    <th>Fecha y Hora</th>
  </tr>
<?php foreach($consultas as $consulta){ ?>
  <tr>
    <td><?= $consulta['idconsulta'] ?></td>
    <td><?= $consulta['documento'] ?></td>
    <td><?= $consulta['ip'] ?></td>
    <td><?= $consulta['hora'] ?></td>
  </tr>
<?php } ?>
</table>

<p>&nbsp;</p>
