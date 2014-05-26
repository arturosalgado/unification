<h1>Reporte por l&iacute;nea</h1>
<h2>Linea: <?= $linea['nombre'] ?> </h2>

<table>
<tr>
	<th>Proyecto</th>
    <th>Captura</th>
    <th>Operadores</th>
    <th>Piezas OK</th>
    <th>Piezas No OK </th>
    <th>Tiempo de paro</th>
    <th>Disponibilidad</th>
    <th>Scrap</th>
    <th>Eficiencia</th>
</tr>
<?php foreach($capturas as $captura){ ?>
<tr>
	<td><?= $linea['proyecto'] ?></td>
    <td><?= $captura['idcaptura'] ?></td>
    <td><?= $captura['responsable1'].", ".$captura['responsable2'].", ".$captura['responsable3'] ?></td>
    <td><?= $captura['ok'] ?></td>
    <td><?= $captura['nook'] ?></td>
    <td><?= $captura['tmh']+$captura['tmp']+$captura['tmm'] ?></td>
    <td><?= ((8-($captura['tmh']+$captura['tmp']+$captura['tmm']))*100) / 8 ?>%</td>
    <td><?= $captura['sh']+$captura['sp']+$captura['sm'] ?></td>
    <td><?= ($captura['ok'] * 100)/($captura['ok']+$captura['nook'])?>%</td>
</tr>
<?php } ?>
</table>