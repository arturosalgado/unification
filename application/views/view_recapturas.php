<a href="<?= $site ?>/reportes/recaptura" data-role="button" data-transition="flip" data-ajax="false">Regresar</a>
<h1>Reporte de Recapturas</h1>
<h2>L&iacute;nea: <?= $linea['nombre'] ?></h2>
<h2><?= $sfecha ?></h2>

<!--
<pre>
	<?php print_r($capturas); ?>
</pre>
-->
<table>
<tr>
	<th>Fecha</th>
	<th>Turno</th>    
	<th>Lote</th>
    <th>Responsables</th>
    <th>Motivo de la recaptura</th>
    <th>Piezas OK</th>
    <th>Piezas no OK</th>
    <th>Scrap</th>
    <th>Tiempo Muerto</th>
    <th>Promedio de Piezas por Hora</th>
</tr>

<?php foreach($capturas as $num => $c){ ?>

<?php 

?>
<tr> 
	<td><?= date("d-m-Y", strtotime($c['fecha'])) ?></td>
    <td><?= $c['turno']['nombre'] ?></td>
    <td><?= $c['lote'] ?></td>
    <td><?= $c['responsable1'].",".$c['responsable2'].",".$c['responsable3'];?></td>
    <td><?= $c['motivo_recaptura'] ?></td>
    <td><?= $c['ok'] ?></td>
    <td><?= $c['nook'] ?></td>
    <td><?= $c['sh']+$c['sp']+$c['sm']?></td>
    <td><?= $c['tmh']+$c['tmp']+$c['tmm'] ?>%</td>
    <td><?= $c['ok']/$c['horas_laboradas'] ?></td>
</tr>
<?php } ?>
</table>
