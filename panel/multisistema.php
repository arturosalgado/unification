<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Cache-Control" content="no-cache">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Lang" content="en">
<meta name="author" content="">
<meta http-equiv="Reply-to" content="@.com">
<meta name="generator">
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="creation-date" content="01/01/2009">
<meta name="revisit-after" content="15 days">
<title>Veritas::Panel Central</title>
<link rel="stylesheet" type="text/css" href="./css/reset.css">
<link rel="stylesheet" type="text/css" href="./css/style.css">
<link rel="stylesheet" type="text/css" href="./css/ui.css">
<script src="./js/jquery1.8mini.js"></script>
<script src="./js/jquery-ui-1.8.23.custom.min.js"></script>
<script src="./js/script.js"></script>
<script>
$(document).ready(function(e) {
    $(".linq").click(function(){
		$("#sistema").attr("src", $(this).attr("target"));
		return false;
	});
});
</script>
</head>
<body>
<style>
	#links a{
	margin: 15px;
	border: 2px solid #000;
	background-color: #0000FD;
	color:#FFF;
	padding: 15px;
	text-decoration:none;
	}
</style>
<div id="links" style="margin-left: 150px; margin-top: 25px; margin-bottom:25px;"><a class="linq" href="#" target="http://veritasvtwi/veritasqa/index.php/login/autovalidate/usuarios">Calidad</a> || <a class="linq" href="#" target="http://veritasvtwi/produccion/index.php/login/autovalidate/usuarios">Produccion</a> || <a class="linq" href="#" target="http://veritasvtwi/index.php/login/autovalidate/usuarios">Instrucciones de Trabajo</a> || <a href="selector.php"> Regresar </a></div>
<br />
<iframe id="sistema" src="http://veritasvtwi" width="1024" height="768" />
<footer id="footer_home"> <span id="powered">People create tomorrow</span>  <span id="copyright">&copy;Veritas 2012</span></footer>
</body>
</html>