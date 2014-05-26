<script>
$(document).ready(function(e) {
	  $("a").click(function(e) {
        e.preventDefault();
		window.location = $(this).attr("href")+"/"+$("#inicio").val()+"/"+$("#fin").val();
    });
});
</script>

<div id="content">
<a href="<?= $site ?>/dashboard" data-role="button" data-transition="flip" data-ajax="false">Regresar</a>
Elegir la linea a reportar, elija todos para ver el reporte global
<form>
<label>Inicio: </label> <br />
<input id="inicio" type="text" class="datepicker" data-role="none"/> 
</form>

<form>
<label>Fin: </label><br />
<input id="fin" type="text" class="datepicker" data-role="none"/> 
</form>

<?php 
$lastClient = "";
$first = true;
foreach($ndps as $ndp){
	if($ndp['cliente'] != $lastClient){
?>

<?php if(!$first){ ?>
</ul>
</div>
<?php } ?>

<div data-role="collapsible" data-collapsed="true" data-theme="b" data-content-theme="d">
<h4><?php echo $ndp['cliente']; ?></h4>

<ul data-role="listview" data-inset="true" data-filter="true">
<?php
	}
?>
	<li><a href="<?= $site ?>/reportes/individual/<?= $ndp['idndp'] ?>" data-ajax="false"><?= $ndp['nombre'] ?></a></li>

<?php 
$lastClient = $ndp['cliente'];
$first = false;
?>
<?php } ?>
</ul>
</div>