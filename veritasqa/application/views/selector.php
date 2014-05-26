<div id="content">
<a href="<?= $site ?>/dashboard" data-role="button" data-transition="flip" data-ajax="false">Regresar</a>
<ul data-role="listview" data-inset="true" data-filter="true">
	<?php foreach($ndps as $ndp) { ?>
	<li> <a href="<?= $site ?>/capturas/captura/<?= $ndp['idndp'] ?>" data-transition="flip" data-ajax="false"> <?= $ndp['nombre'] ?> </a> </li>
    <?php } ?>
</ul>
</div>