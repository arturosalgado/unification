<div id="content">
<a href="<?= $site ?>/dashboard" data-role="button" data-transition="flip" data-ajax="false">Regresar</a>
<ul data-role="listview" data-inset="true" data-filter="true">
	<?php foreach($producciones as $p) { ?>
    <?php if($p['fecha']==date("Y-m-d")){ ?>
	<li> <a href="<?= $site ?>/capturas/captura/<?= $p['idproduccion'] ?>" data-transition="flip" data-ajax="false"> <?= $p['linea'] ?> </a> </li>
    <?php } ?>
    <?php } ?>
</ul>
</div>