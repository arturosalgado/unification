<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_calidad = "localhost";
$database_calidad = "veritasqa";
$username_calidad = "root";
$password_calidad = "Ver17as13";
$calidad = mysql_pconnect($hostname_calidad, $username_calidad, $password_calidad) or trigger_error(mysql_error(),E_USER_ERROR); 
?>