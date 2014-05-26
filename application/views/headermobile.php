<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="apple-mobile-web-app-capable" content="yes">
<title>Veritas::Sistema de Control de Documentos</title>
<link rel="stylesheet" type="text/css" href="<?=$css?>/style.css">
<link rel="stylesheet" type="text/css" href="<?=$css?>/print.css" media="print">
<link rel="stylesheet" type="text/css" href="<?= $css ?>/mobile.css" />
<link rel="stylesheet" type="text/css" href="<?= $css ?>/skin/minimalist.css" />
<script src="<?=$js?>/jquery1.8mini.js"></script>
<script src="<?=$js?>/jquery-ui-1.8.23.custom.min.js"></script>
<script src="<?=$js?>/printpage.js"></script>
<script src="<?=$js?>/script.js"></script>
<script src="<?=$js?>/flowplayer/flowplayer.min.js"></script>

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

