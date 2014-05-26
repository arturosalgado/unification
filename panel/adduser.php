<?php require_once('Connections/calidad.php'); ?>
<?php require_once('Connections/ingenieria.php'); ?>
<?php require_once('Connections/produccion.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO usuario (username, passwd, nombre) VALUES (%s, %s, %s)",
                       GetSQLValueString($_POST['username'], "text"),
                       GetSQLValueString($_POST['passwd'], "text"),
                       GetSQLValueString($_POST['nombre'], "text"));

  mysql_select_db($database_calidad, $calidad);
  $Result1 = mysql_query($insertSQL, $calidad) or die(mysql_error());
  
  mysql_select_db($database_produccion, $calidad);
  $Result1 = mysql_query($insertSQL, $calidad) or die(mysql_error());
  
  mysql_select_db($database_ingenieria, $calidad);
  $Result1 = mysql_query($insertSQL, $calidad) or die(mysql_error());
}
?>
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
</head>
<body>
<div id="container" class="home">
<header id="header_home"> &nbsp;
 </header>
<div id="index_space">&nbsp;</div>
<form action="<?php echo $editFormAction; ?>" name="form1" method="POST">

  <p>
    <label for="username">Nombre De Usuario</label>
    <input type="text" name="username" id="username">
  </p>
  <p>
    <label for="passwd">Contraseña</label>
    <input type="text" name="passwd" id="passwd">
  </p>
  <p>
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" id="nombre">
  </p>
  <p>
    <input type="submit" name="button" id="button" value="Enviar">
  </p>
  <input type="hidden" name="MM_insert" value="form1">
</form>
</div>
<footer id="footer_home"> <span id="powered">People create tomorrow</span>  <span id="copyright">&copy;Veritas 2012</span></footer>
</body>
</html>