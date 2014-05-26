<script>
$(document).ready(function(e) {
	  $("a").click(function(e) {
        e.preventDefault();
		window.location = $(this).attr("href")+"/"+$("#inicio").val()+"/"+$("#fin").val();
    });
});
</script>

<div id="content">

<a href="<?= $site ?>/reportes/index" data-role="button" data-transition="flip" data-ajax="false">Regresar</a>

<br />


<ul data-role="listview" data-filter="true">
	<?php foreach($recapturas as $r) { ?>
	<li> <a href="<?= $site ?>/reportes/view_recapturas/<?= $r['idlinea'] ?>" data-transition="flip" data-ajax="false"> <?= $r['nombrelinea'] ?> <?= date("d-m-Y", strtotime($r['fecha']))?> <?= $r['nombreturno']?> </a> </li>
    <?php } ?>
</ul>
</div>