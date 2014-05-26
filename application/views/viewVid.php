<a href="<?= $site ?>/viewdoc/listview/<?= $id ?>" data-role="button">Ver Lista de Documentos</a> 
<?php
$vidpath =str_replace("https", "http", $docs."/".$ruta);
?>

<?php echo $vidpath ?>

<video width="900" height="630" controls="true">
	El navegador no soporta este video
	<source src ="<?php echo $vidpath;?>">
</video>

<a href="<?= $vidpath ?>" target="_blank">Descargar</a>