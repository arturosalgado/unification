<a href="<?= $site ?>/reportes">Regresar</a>

<?php
$error_count = count($errores);
?>

<!-- Datos geenerales -->
<br />
<div style="width:100%; height:25px; background-color:#01437D">&nbsp;</div>
<h1> Línea <?= $linea['nombre'] ?> </h1>

<table width="30%">
<tr>
	<th colspan="2"> Datos Generales de la Línea </th>
</tr>

<tr>
	<th> Valor </th>
    <th> Dato </th>
</tr>

<tr>
	<td>L&iacute;nea</td>
    <td><?= $linea['nombre'] ?></td>
</tr>
<tr>
	<td>N&uacute;mero de lote</td>
    <td><?= $captura['lote'] ?></td>
</tr>
<tr>
	<td>Proyecto</td>
    <td><?= $linea['proyecto'] ?></td>
</tr>
<tr>
	<td>Fecha</td>
    <td><?= date("d-m-Y", strtotime($produccion['fecha'])) ?></td>
</tr>
<tr>
	<td>Turno</td>
    <td><?= $turno['nombre'] ?></td>
</tr>
<tr>
	<td>Responsable</td>
    <td><?= $produccion['responsable1'] ?>, <?= $produccion['responsable2'] ?>, <?= $produccion['responsable3'] ?></td>
</tr>

<tr>
	<td>Captur&oacute;</td>
    <td><?= $captura['responsable1'] ?>, <?= $captura['responsable2'] ?>,<?= $captura['responsable3'] ?></td>
</tr>
<tr>
	<td>Horas Laboradas</td>
    <td><?= $captura['horas_laboradas'] ?></td>
</tr>
<tr>
	<td>Piezas planeadas</td>
    <td><?= $captura['horas_laboradas']*$linea['piezas'] ?></td>
</tr>
<tr>
	<td>Piezas reales</td>
    <td><?= $captura['ok'] ?></td>
</tr>
<tr>
	<td>Tiempo muerto en minutos</td>
    <td><?= $captura['tmh']+$captura['tmp']+$captura['tmm'] ?></td>
</tr>
<tr>
	<td>Tiempo de disponibilidad en minutos</td>
    <td><?= ($captura['horas_laboradas']*60)-($captura['tmh']+$captura['tmp']+$captura['tmm']) ?></td>
</tr>


</table>

<hr />
<?php
$tablehtml="";
$print_table = false;
$tablehtml .= "<table>";
$tablehtml .= "<tr>";
$tablehtml .= "<th colspan='".($error_count +1)."'> Scrap por Componentes </th>";
$tablehtml .= "</tr>";
$tablehtml .= "<tr>";
$tablehtml .= "<th>Errores</th>";
$id2error = array();
$error2id = array(); 
$j=0;
foreach($errores as $error){
	$id2error[$j] = $error['iderror']; 
	$error2id[$error['iderror']]=$j;
	$j++;

$tablehtml .= "<th>".$error['codigo']."<br  />".$error['descripcion']."</th>";
 
}

$tablehtml .="</tr>";
$tablehtml .="<tr>";
$tablehtml .="<th>Componente</th>";
$tablehtml .="<th colspan='".$error_count."'>&nbsp; </th>";
$tablehtml .="</tr>";

//Preparing the results into an array
$rarray=array();
for($k=0; $k<20; $k++){
	for($l=0; $l<$error_count; $l++){
		$rarray[$k][$l]=0;
	}
}

foreach($materiales as $m){
	if(isset($error2id[$m['iderror']]))
		$rarray[$m['idmat']-1][$error2id[$m['iderror']]]=$m['cantidad'];
}


$htmltoprint = "";
$print = false; 
$i=0;
	foreach($linea as $l){
		if($i>3){
			if($l!="0"&&$l!=NULL&&$l!=""){
				$htmltoprint = "<tr>";
				$htmltoprint .= "<td align='center'> $l </td>";
				$print = false;
						foreach($errores as $e){
							$htmltoprint .= "<td align='center' valign='middle'>".$rarray[$i-4][$error2id[$e['iderror']]]."</td>";
							if($rarray[$i-4][$error2id[$e['iderror']]] != "0"){
								$print = true;
								$print_table = true;
							}
                     } 
				$htmltoprint .= "</tr>";
				 if($print){//$print
				 $tablehtml .= $htmltoprint;
				 $print = false;
				 $htmltoprint="";
				}
                 
			}else
				break;
		
			
		}
		$i++;
	}
	
$tablehtml .= "</table>";

if($print_table)
	echo $tablehtml;
else
	echo "<h1>No hay scrap</h1>"
?>

