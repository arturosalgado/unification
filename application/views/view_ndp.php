<a href="<?= $site ?>/reportes/general" data-role="button" data-transition="flip" data-ajax="false">Regresar</a>

<h1>Reporte por L&iacute;nea</h1>
<h2>L&iacute;nea: <?= $ndp['nombre'] ?></h2>
<h2><?= $sfecha ?></h2>
<?php if(count($capturas)>0) {?>
<table>
<tr>
	<th>Fecha</th>
    <th>Turno</th>
    <th>Lote</th>
    <th>Responsables</th>
    <th>Horas Laboradas</th>
    <th>Paso de Formado</th>
    <th>Piezas a Producir</th>
    <th>Piezas OK</th>
    <th>Piezas no OK</th>
    <th>Scrap</th>
    <th>Tiempo Muerto</th>
    <th>Promedio de Piezas por Hora</th>
</tr>
<?php 
$compCount=0;
$k=0;
foreach($ndp as $nd){
	if($k>4 && ($nd==""||$nd=="0"||$nd==NULL))
		break;
	$k++;
}
$compCount = $k;
?>
<?php foreach($capturas as $num => $c){ ?>
<?php 
$piezasProducir = $c['horas_laboradas']*$ndp['piezas'];
$porcentajeScrap = 0;
if($c['scrap']!=0 && is_int($c['scrap']))
	$porcentajeScrap = $compCount/$c['scrap'];
?>
<tr> 
	<td><?= date("d-m-Y", strtotime($c['fecha'])) ?></td>
    <td><?= $c['turno']['nombre'] ?> </td>
    <td><?= $c['lote'] ?>&nbsp;</td>
    <td><?= $c['responsable1'].",".$c['responsable2'].",".$c['responsable3'];?></td>
    <td><?= $c['horas_laboradas'] ?></td>
    <td><?= $c['pasodeformado']==0?'No':'Si' ?></td>
    <td><?= $piezasProducir ?></td>
    <td><?= $c['ok'] ?></td>
    <td><?= $c['nook'] ?></td>
    <td><?= $porcentajeScrap."%" ?></td>
    <td><?= $c['tmh']+$c['tmp']+$c['tmm'] ?>%</td>
    <td><?= $c['horas_laboradas']==0?"0":$c['ok']/$c['horas_laboradas'] ?></td>
</tr>
<?php } ?>
</table>

<?php } else { ?>
<h1> No hay capturas de &eacute;sta l&iacute;nea
<?php } ?>
