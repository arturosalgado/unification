<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_produccion = "localhost";
$database_produccion = "veritasprod";
$username_produccion = "root";
$password_produccion = "Ver17as13";
$produccion = mysql_pconnect($hostname_produccion, $username_produccion, $password_produccion) or trigger_error(mysql_error(),E_USER_ERROR); 
?>