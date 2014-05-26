<a href="<?= $site ?>/reportes/scrap" data-role="button" data-transition="flip" data-ajax="false">Regresar</a>
<h1>Reporte de Scrap</h1>
<h2>L&iacute;nea: <?= $linea['nombre'] ?> </h2>

<?php
$error_count = count($errores);
?>
<?php
//calculando el reporte
$horasLaboradas = 0;
$piezasOk = 0;
$totalAProducir = 0;
$sh=0;
$sp=0;
$sm=0;

$numeroDeComponentes = 0;
$i = 0;
$componentes = array();
foreach($linea as $l){
	if($l!=""&&$l!="0"&&$i>=5){
		$numeroDeComponentes = $i - 4;
		$componentes[$i-5] = $l;
	}
	
	$i++;
}
 
$arrayNums = array();
//reading
foreach($capturas as $c){
		
	$horasLaboradas += $c['horas_laboradas'];
	$piezasOk += $c['ok'];
}

$totalComponentes=0;

//llenando los datos del scrap

?>
<h3>Piezas Completas</h3>
<style>

</style>
<table id="scrap_table">
	<tr>
    	<th>Dato</th>
        <th>Cantidad</th>
	</tr>
    <tr>
    	<td>Horas Laboradas</td>
        <td><?= $horasLaboradas ?></td>
    </tr>
    <tr>
    	<td>Piezas OK</td>
        <td><?= $piezasOk ?></td>
    </tr>

</table>
<hr />
<h3>Por Componente</h3>


<hr style="float:none; clear:both; margin-top:30px;" />
<?php
//preparing Data
$id2error = array();
$error2id = array(); 
$j=0;
foreach($errores as $error){
	$id2error[$j] = $error['iderror']; 
	$error2id[$error['iderror']]=$j;
	$j++;
}

//filling array of cols with data
$data_ids = array();
$data_columns = array();
foreach($materiales as $mat){
	if(!in_array($mat['iderror'], $data_ids))
		array_push($data_ids, $mat['iderror']);			
}
$total_data_cols=count($data_ids)+1;
foreach($data_ids as $di){
	array_push($data_columns, $error2id[$di]);
}

					
$tablehtml="";
$print_table = false;
$tablehtml .= "<table>";
$tablehtml .= "<tr>";
$tablehtml .= "<th colspan='".$total_data_cols."'> Scrap por Componentes </th>";
$tablehtml .= "</tr>";
$tablehtml .= "<tr>";
$tablehtml .= "<th>Errores</th>";
$j=0;
foreach($errores as $error){
	if(in_array($j, $data_columns))
		$tablehtml .= "<th>".$error['codigo']."<br  />".$error['descripcion']."</th>";
$j++;
}

$tablehtml .="</tr>";
$tablehtml .="<tr>";
$tablehtml .="<th>Componente</th>";
$tablehtml .="<th colspan='".($total_data_cols-1)."'>&nbsp; </th>";
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
				$x = 0;
						foreach($errores as $e){
							if(isset($e['iderror'])){
								if(in_array($x, $data_columns))
									$htmltoprint .= "<td align='center' valign='middle'>".$rarray[$i-4][$error2id[$e['iderror']]]."</td>";
							if($rarray[$i-4][$error2id[$e['iderror']]] != "0"){
								$print = true;
								$print_table = true;
							}}
							$x++;
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