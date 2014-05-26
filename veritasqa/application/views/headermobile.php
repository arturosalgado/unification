<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="apple-mobile-web-app-capable" content="yes">
<title>Veritas::Control de Calidad</title>
<link rel="stylesheet" type="text/css" href="<?=$css?>/style_mobile.css">
<link rel="stylesheet" type="text/css" href="<?=$css?>/print.css" media="print">
<link rel="stylesheet" type="text/css" href="<?=$css?>/ui.css">
<link rel="stylesheet" type="text/css" href="<?= $css ?>/jquerymobile.css" />
<link rel="stylesheet" type="text/css" href="<?= $css ?>/mobile.css" />
<link rel="stylesheet" type="text/css" href="<?= $css ?>/skin/minimalist.css" />
<script src="<?=$js?>/jquery1.8mini.js"></script>
<script src="<?=$js?>/jquery-ui-1.8.23.custom.min.js"></script>
<script src="<?=$js?>/jquerymobile.js"></script>
<script src="<?=$js?>/printpage.js"></script>
<script src="<?=$js?>/script.js"></script>

<script>
	$(document).ready(function(e) {
        $(".hitarea").click(function(){
			var linkto = $(this).children("a").attr("href");
			window.location = linkto;
		});
    });
</script>
</head>
<body>
<div id="container">
<header id="header_general">
 </header>
 <?php date_default_timezone_set("America/Mexico_City"); ?>

