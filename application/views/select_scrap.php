<script>
$(document).ready(function(e) {
	  $("a").click(function(e) {
        e.preventDefault();
		window.location = $(this).attr("href")+"/"+$("#inicio").val()+"/"+$("#fin").val();
    });
});
</script>

<div id="content">
<a href="<?= $site ?>/reportes" data-role="button" data-transition="flip" data-ajax="false">Regresar</a>
<form action="<?= $site ?>/reportes/viewgeneral" method="post" data-ajax="false">
    <legend>Seleccione las líneas</legend>
    <p>
      <label for="textfield">Fecha inicial</label><br/>
      <input type="text" name="textfield" id="inicio" class="datepicker" width="250">
    </p>
    <p>
      <label for="textfield2">Fecha final</label><br/>
      <input type="text" name="textfield2" id="fin" class="datepicker" width="250">
    </p>
</form>
<br />
<ul data-role="listview" data-filter="true">
	<?php foreach($lineas as $l) { ?>
	<li> <a href="<?= $site ?>/reportes/view_scrap/<?= $l['id'] ?>" data-transition="flip" data-ajax="false"> <?= $l['nombre'] ?>  </a> </li>
    <?php } ?>
</ul>
</div>