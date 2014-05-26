<a href="<?= $site ?>/reportes/scrap" data-role="button" data-transition="flip" data-ajax="false">Regresar</a>
<h1>Reporte de Scrap</h1>
<h2>L&iacute;nea: <?= $linea['nombre'] ?> </h2>
<h2><?= $sfecha ?></h2>
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
	<th>Componentes</th>
	<?php
	$countComponent = 0;
	 for($i=1; $i<=20; $i++){ 
		 if(isset($linea['c'.$i])&&$linea['c'.$i]!=""&&$linea['c'.$i]!="0"){
			echo "<th>".$linea['c'.$i]."</th>"; 
			$countComponent++;
		}
	 }
	?>
</tr>
<tr>
	<th>Falla</th>
    <?php
	for($j=0; $j<$countComponent; $j++){
		echo "<th>&nbsp;</th>";
	}
	?>
</tr>
<?php foreach ($errores as $error) {
$print = true; 
for($i=1; $i<=20; $i++){ 
	 if(isset($linea['c'.$i])&&$linea['c'.$i]!=""&&$linea['c'.$i]!="0"){
		$result = 0;
		foreach($materiales as $m){
			if($m['idmat']==$i&&$m['iderror']==$error['codigo'])
			$result += $m['cantidad'];
		}
		if($result <= 0)
			$print = false;
	 }

}
if($print){
?>
 	<tr>
    	<td align="center"><?= $error['codigo'].'<br />'.$error['descripcion'] ?></td>
      	<?php 
			for($i=1; $i<=20; $i++){ 
			 if(isset($linea['c'.$i])&&$linea['c'.$i]!=""&&$linea['c'.$i]!="0"){
				 //recorremos el arreglo de capturas de errores buscando todos los datos que coincidan y losmandamos a imprimir
				$result = 0;
				foreach($materiales as $m){
					if($m['idmat']==$i&&$m['iderror']==$error['codigo'])
						$result += $m['cantidad'];
					}
				echo "<td>".$result."</td>"; 
		}
	 }
		?>  
    </tr>
<?php } }?>
</table>
