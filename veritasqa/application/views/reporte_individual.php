 <a href="<?= $site ?>/reportes" data-role="button" data-transition="flip">Regresar</a>
 <h1>Reporte Estad&iacute;stico de Control de Calidad</h1>
 <h2>N&uacute;mero de Parte: <?= $ndp['nombre'] ?> </h2>
 <h2>Fecha: <?= date("d/m/Y"); ?> </h2>
 <?php 
 $n = 0;
 $cpk = 0;
 foreach($capturas as $c) { 
 	$n++;
 }
 //Generando el CPK
 $statArray = Array();
 for($i=0; $i<$featCount; $i++) {
	 $statArray[$i] = Array();
	 foreach($capturas as $c) {
		 if(isset($datos[$c['idcaptura']][$i]['valor']))
 		$statArray[$i][$c['idcaptura']] = $datos[$c['idcaptura']][$i]['valor'];
 	}
 }

 $resulta = Array();
 for($i=0; $i<$featCount; $i++){
	 //iterando en los feats
	 $fMean = array_sum($statArray[$i]) / count($statArray[$i]);
     $fVariance = 0.0;
     foreach ($statArray[$i] as $j)
     {
         $fVariance +=(($j - $fMean) * ($j - $fMean));
     }
     $fVariance /= count($statArray[$i]);
	 $desviacionStandard = (float) sqrt($fVariance);
	 $media = array_sum($statArray[$i])/count($statArray[$i]);
	 $n = count($statArray[$i]);
	 $lcs = $features[$i]['media']+$features[$i]['tolerancia'];
	 $lci = $features[$i]['media']-$features[$i]['tolerancia'];
	 $cpka = $desviacionStandard==0?0:($lcs - $media)/(3*$desviacionStandard);
	 $cpkb = $desviacionStandard==0?0:($media - $lci)/(3*$desviacionStandard);
	 $cpk= $cpka>$cpkb?$cpkb:$cpka;
	 $resulta[$i]['lcs'] = $lcs;
	 $resulta[$i]['lci'] = $lci;
	 $resulta[$i]['media'] = $media;
	 $resulta[$i]['lcs'] = $lcs;
	 $resulta[$i]['n'] = $n;
	 $resulta[$i]['cpk'] = $cpk;
	 $resulta[$i]['sigma'] = $desviacionStandard;
 }
 
 ?>
 <style>
 	.graph{
		border:2px solid black;
		margin-bottom:25px;
	}
 </style>
 <img  src="<?=$docs?>/<?=$ndp['imagen']?>" /> <br />
 <?php for($i=0; $i<$featCount; $i++) { ?>
 <div class="graph">
 	<img src="<?= $docs ?>/graph/graph<?=$i?>.png" /> <br />
    <h2>N = <?= $resulta[$i]['n']; ?> </h2>
    <h2>Media = <?= round($resulta[$i]['media'], 2); ?> </h2>
    <h2>Sigma = <?= round($resulta[$i]['sigma'], 2); ?> </h2>
    <h2>CPK = <?php echo ($n > 15?round($resulta[$i]['cpk'], 2):"No hay suficientes datos para el c&aacute;lculo");  ?> </h2>
 </div>

 <?php } ?>
 <style>
 	th{
		border:#FFF 2px solid;
	}
	#feats{
		overflow:scroll;
	}
 </style>
 <table border="1" cellspacing="10" id="feats">
 <tr>
 	<th>Fecha</th>
    <?php foreach($capturas as $c) { ?>
    <th> <?= $c['fecha'] ?> </th>
    <?php } ?>
 </tr>
 <tr>
 	<th>Captura</th>
    <?php $k = 1; foreach($capturas as $c) { ?>
    <th> <?php echo $k; $k++; ?> </th>
    <?php } ?>
 </tr>
    <?php for($i=0; $i<$featCount; $i++) { ?>
    <tr>
    	<td align="center">Caracter&iacute;stica <?= $features[$i]['codigo'] ?></td>
        <?php foreach($capturas as $cap){ ?>
        		<td> <?php $c=$cap['idcaptura']; echo isset($datos[$c][$i]['valor'])?$datos[$c][$i]['valor']:0?> </td>
        <?php } ?>
    </tr>
    <?php } ?>
 </table>