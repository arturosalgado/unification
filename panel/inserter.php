<?php require_once('Connections/calidad.php'); ?>
<?php require_once('Connections/ingenieria.php'); ?>
<?php require_once('Connections/produccion.php'); ?>
<?php 
$passwd = $_POST['passwd'];
//Performing the insert 
if($_POST['calidad'] != "0"){
	mysql_select_db($database_calidad, $calidad);
	$query_calidad = "SELECT username, passwd, nombre, apellidos, rol FROM usuario WHERE username = '".$_POST['username']."'";
	$qcalidad = mysql_query($query_calidad, $calidad) ;
	$row_calidad = mysql_fetch_assoc($qcalidad);
	$totalRows_calidad = mysql_num_rows($qcalidad);
	if($totalRows_calidad > 0 && $passwd!=""){
		$query_calidad = "UPDATE usuario SET passwd = '$passwd', rol = '".$_POST['calidad']."' WHERE username = '".$_POST['username']."'";
		echo $query_calidad;
		mysql_query("".$query_calidad, $calidad) ;
	}
	
	else if($totalRows_calidad > 0 && $passwd==""){
		$query_calidad = "UPDATE usuario SET rol = '".$_POST['calidad']."' WHERE username='".$_POST['username']."';";
		echo $query_calidad;
		mysql_query(" ".$query_calidad, $calidad) ;
	}
	
	else if($totalRows_calidad <= 0 ){
		$query_calidad = "INSERT INTO usuario (username, passwd, rol) VALUES ('".$_POST['username']."', '$passwd', '".$_POST['calidad']."')";
		echo $query_calidad;
		mysql_query($query_calidad, $calidad) ;
	}
}

if($_POST['produccion'] != "0"){
	mysql_select_db($database_produccion, $produccion);
	$query_produccion = "SELECT username, passwd, nombre, apellidos, rol FROM usuarioWHERE username = '".$_POST['username']."'";
	$qproduccion = mysql_query($query_produccion, $produccion) ;
	$row_produccion = mysql_fetch_assoc($qproduccion);
	$totalRows_produccion = mysql_num_rows($qproduccion);
	
	if($totalRows_produccion > 0 && $passwd!=""){
		$query_produccion = "UPDATE usuario SET passwd = '$passwd', rol = '".$_POST['produccion']."' WHERE username = '".$_POST['username']."'";
		echo $query_produccion;
		mysql_query("SET SQL_SAFE_UPDATES=0;".$query_produccion, $produccion) ;
	}
	
	else if($totalRows_produccion > 0 && $passwd==""){
		$query_produccion = "UPDATE usuario SET rol = '".$_POST['produccion']."' WHERE username = '".$_POST['username']."'";
		echo $query_produccion;
		mysql_query("SET SQL_SAFE_UPDATES=0;".$query_produccion, $produccion) ;

	}
	
	else if($totalRows_produccion <= 0 ){
		$query_produccion = "INSERT INTO usuario (username, passwd, rol) VALUES ('".$_POST['username']."', '$passwd', '".$_POST['produccion']."'";
		echo $query_produccion;
		mysql_query($query_produccion, $produccion) ;
	}
}

if($_POST['ingenieria'] != "0"){
	mysql_select_db($database_ingenieria, $ingenieria);
	$query_ingenieria = "SELECT username, passwd, nombre, apellidos, rol FROM usuarioWHERE username = '".$_POST['username']."'";
	$qingenieria = mysql_query($query_ingenieria, $ingenieria) ;
	$row_ingenieria = mysql_fetch_assoc($qingenieria);
	$totalRows_ingenieria = mysql_num_rows($qingenieria);
	
	if($totalRows_ingenieria > 0 && $passwd!=""){
		$query_ingenieria = "UPDATE usuario SET passwd = '$passwd', rol = '".$_POST['ingenieria']."' WHERE username = '".$_POST['username']."'";
		echo $query_ingenieria;
		mysql_query("SET SQL_SAFE_UPDATES=0;".$query_ingenieria, $ingenieria) ;
	}
	
	else if($totalRows_ingenieria > 0 && $passwd==""){
		$query_ingenieria = "UPDATE usuario SET rol = '".$_POST['ingenieria']."' WHERE username = '".$_POST['username']."'";
		echo $query_ingenieria;
		mysql_query("SET SQL_SAFE_UPDATES=0;".$query_ingenieria, $ingenieria) ;
	}
	
	else if($totalRows_ingenieria <= 0 ){
		$query_ingenieria = "INSERT INTO usuario (username, passwd, rol) VALUES ('".$_POST['username']."', '$passwd', '".$_POST['ingenieria']."'";
		echo $query_ingenieria;
		mysql_query($query_ingenieria, $ingenieria) ;
	}
}

?>
<script>
window.location = "users.php";
</script>