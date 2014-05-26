<a href="<?= $site ?>/reportes/scrap" data-role="button" data-transition="flip" data-ajax="false">Regresar</a>
<h1>Reporte de Scrap</h1>
<h2>L&iacute;nea: <?= $linea['nombre'] ?> </h2>
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
<table>

<tr>
	<th> Falla </th>
    <?php 
	foreach ($errores as $error) { ?>

	<th> <?= $error['codigo'] ?> <br /> <?= $error['descripcion'] ?></th>
    
    <?php } ?>
</tr>

<tr>
	<th> Componente </th>
    <th colspan="<?= count($errores); ?>">&nbsp;  </th>
</tr>

<?php
$htmltorpint = "";
$print = false; 
		for($i=1; $i<=20; $i++){ 
			 if(isset($linea['c'.$i])&&$linea['c'.$i]!=""&&$linea['c'.$i]!="0"){
				 $htmltorpint = "<tr>"; 
				 $value = isset($linea['c'.$i])?$linea['c'.$i]:0;
				 $htmltorpint .= "<td>$value</td>";
				 
		 			foreach ($errores as $error) {
					$result=0;
					$htmltorpint .= "<td>";		
					foreach($materiales as $m){
					if($m['idmat']==$i&&$m['iderror']==$error['codigo'])
						$result += $m['cantidad'];
					}
					if($result > 0)
						$print=true;

					$htmltorpint .= $result."</td>";
				}
				$htmltorpint.="</tr>";
				if($print)
					echo $htmltorpint;
				$print=false;
				$htmltorpint="";
			}
?>
     
<?php
	
		}//end of main for
?>

</table>
