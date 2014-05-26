<div id="content">
<a href="<?= $site ?>/dashboard/index" data-role="button" data-transition="flip">Regresar</a>
<ul data-role="listview" data-inset="true" data-filter="true">
	<?php foreach($producciones as $p) { ?>
	<li> <a href="<?= $site ?>/recapturas/captura/<?= $p['idproduccion'] ?>" data-transition="flip" data-ajax="false"> <?= $p['linea'] ?> ejecutada el <?= $p['fecha'] ?> </a> </li>
    <?php } ?>
</ul>
</div>