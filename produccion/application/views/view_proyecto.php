<a href="<?= $site ?>/reportes/general" data-ajax="false" data-role="button">Regresar</a>

<h1>Reporte por proyecto</h1>
<h2>Proyecto: <?=  str_replace("%20"," ",$proyecto)  ?></h2>

<table>
<tr>
	<th>L&iacute;nea</th>
    <th>Responsables</th>
    <th>Horas Laboradas</th>
    <th>Piezas a Producir</th>
    <th>Piezas OK</th>
    <th>Tiempo Perdido (minutos)</th>
    <th>Productividad</th>
    <th>Scrap</th>
    <th>Disponibilidad</th>
    <th>Estimado de piezas por hora</th>
    <th>Promedio de Piezas por Hora</th>
    
</tr>

<?php foreach($lineas as $l){ ?>

<?php 
$numControl = "";
$horasLaboradas = 0;
$piezasOk = 0;
$tiempoPerdido = 0;
$totalAProducir = 0;
$piezasPorHora = $l['piezas'];
$piezasScrap = $l['scrap']; 
$arrayNums = array();
$disponibilidad = 0;
$promedioPiezas = 0;
$totalAProducir = 0;
$productividad = 0;
$p_scarp =  0;
//reading
if(isset($l['capturas'])&&count($l['capturas'])>0){
foreach($l['capturas'] as $c){
	if(!in_array($c['responsable1'], $arrayNums))
		array_push($arrayNums, $c['responsable1']); 
	if(!in_array($c['responsable2'], $arrayNums))
		array_push($arrayNums, $c['responsable2']); 
	if(!in_array($c['responsable3'], $arrayNums))
		array_push($arrayNums, $c['responsable3']); 
		
	$horasLaboradas += $c['horas_laboradas'];
	$piezasOk += $c['ok'];
	$tiempoPerdido += ($c['tmh']+$c['tmp']+$c['tmm']);
	

}

$numControl = "";
//processing
foreach($arrayNums as $a)
	$numControl .= $a.", ";
	
$matCount = 0;
$k = 0;
foreach($l as $key => $value){
	if($k>4&&($value=="0"||$value==""||$value==NULL)){
		$matCount = $k;
		break;
	}
	$k++;
}

$disponibilidad = $tiempoPerdido > 0 ? round((($horasLaboradas * 60) / $tiempoPerdido), 2):100;
$promedioPiezas = $horasLaboradas > 0 ?round(($piezasOk/$horasLaboradas),2):0;
$totalAProducir = $piezasPorHora * $horasLaboradas;
$productividad = $piezasOk > 0?round((100*($totalAProducir/$piezasOk)),2):0;
$p_scarp =  $piezasOk > 0 ? round((100*($piezasScrap)/($piezasOk*$matCount)),2):0;
}
?>
<tr> 
	<td><?= $l['nombre'] ?></td>
    <td align="center"><?= $numControl ?></td>
    <td align="center"><?= $horasLaboradas ?></td>
    <td align="center"><?= $totalAProducir ?></td>
    <td align="center"><?= $piezasOk ?></td>
    <td align="center"><?= $tiempoPerdido ?></td>
    <td align="center"><?= $productividad ?>%</td>
    <td align="center"><?= $p_scarp."%"?></td>
    <td align="center"><?= $disponibilidad."%" ?></td>
    <td align="center"><?= $piezasPorHora ?></td>
    <td align="center"><?= $promedioPiezas ?></td>
</tr>
<?php } ?>
</table>
