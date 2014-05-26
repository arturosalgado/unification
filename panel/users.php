<?php require_once('Connections/calidad.php'); ?>
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

mysql_select_db($database_calidad, $calidad);
$query_calidad = "SELECT username, passwd, nombre, apellidos, rol FROM usuario";
$calidad = mysql_query($query_calidad, $calidad) or die(mysql_error());
$row_calidad = mysql_fetch_assoc($calidad);
$totalRows_calidad = mysql_num_rows($calidad);

mysql_select_db($database_produccion, $produccion);
$query_ingenieria = "SELECT username, passwd, nombre, apellidos, rol FROM usuario";
$ingenieria = mysql_query($query_ingenieria, $produccion) or die(mysql_error());
$row_ingenieria = mysql_fetch_assoc($ingenieria);
$totalRows_ingenieria = mysql_num_rows($ingenieria);

mysql_select_db($database_produccion, $produccion);
$query_produccion = "SELECT username, passwd, nombre, apellidos, rol FROM usuario";
$produccion = mysql_query($query_produccion, $produccion) or die(mysql_error());
$row_produccion = mysql_fetch_assoc($produccion);
$totalRows_produccion = mysql_num_rows($produccion);
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
<?php
//building the array that will display the users
$temp = array();
$a_users = array();
$i=0;
//reading the first system
do{
	$temp[$i] = $row_calidad;
	$i++;
}while($row_calidad=mysql_fetch_assoc($calidad));
//second and third
do{
	$temp[$i] = $row_produccion;
	$i++;
}while($row_produccion=mysql_fetch_assoc($produccion));

do{
	$temp[$i] = $row_ingenieria;
	$i++;
}while($row_ingenieria=mysql_fetch_assoc($ingenieria));
sort($temp);
$last_user="";
$j=0;
foreach($temp as $t){
	if($last_user != $t['username']){
		$a_users[$j] = $t;
		$j++;
		$last_user = $t['username'];
	}
}
?>


<div id="container" class="home">
<header id="header_home"> &nbsp;
 </header>
<div id="index_space">&nbsp;</div>
<a href="selector.php"> Regresar </a>
<table width="100%">
	<tr>
    	<th> Usuario </th>
        <th> Nombre </th>
        <th> Passwd </th>
        <th> Calidad </th>
        <th> Produccion </th>
        <th> Ingenier&iacute;a </th>
        <th> Acciones </th>
	</tr>
    <?php  foreach($a_users as $user){ ?>
    <form action="inserter.php" method="post" />
    <tr>
    	<td><?= $user['username'] ?></td>
        <input type="hidden" name="username" value="<?= $user['username'] ?>" />
        <td><?= $user['nombre']." ".$user['apellidos'] ?></td>
        <td><input type="password" id="passwd" name="passwd" /> </td>
        <td><select name="calidad"><option value="0">Sin Cambio</option><option value="usuario">Usuario</option><option value="admin">Supervisor</option><option value="sadmin">Administrador</option></select></td>
        <td><select name="produccion"><option value="0">Sin Cambio</option><option value="usuario">Usuario</option><option value="admin">Supervisor</option><option value="sadmin">Administrador</option></select></td>
        <td><select name="ingenieria"><option value="0">Sin Cambio</option><option value="usuario">Usuario</option><option value="admin">Supervisor</option><option value="sadmin">Administrador</option></select></td>
        <td> <input type="submit" /> </td>
    </tr>
    </form>
    <?php } ?>
</table>
</div>
<footer id="footer_home"> <span id="powered">People create tomorrow</span>  <span id="copyright">&copy;Veritas 2012</span></footer>
</body>
</html>
<?php
mysql_free_result($calidad);

mysql_free_result($ingenieria);

mysql_free_result($produccion);
?>
