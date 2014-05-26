<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_ingenieria = "localhost";
$database_ingenieria = "veritas";
$username_ingenieria = "root";
$password_ingenieria = "Ver17as13";
$ingenieria = mysql_pconnect($hostname_ingenieria, $username_ingenieria, $password_ingenieria) or trigger_error(mysql_error(),E_USER_ERROR); 
?>