<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
//$hostname_medicina = "localhost";
//$database_medicina = "authentication";
//$username_medicina = "recordsetuser";
//$password_medicina = "admin4recordset";
//$medicina = mysql_pconnect($hostname_medicina, $username_medicina, $password_medicina) or //trigger_error(mysql_error(),E_USER_ERROR); 



define("HOST", "localhost"); // The host you want to connect to.
define("USER", "recordsetuser"); // The database username.
define("PASSWORD", "admin4recordset"); // The database password. 
define("DATABASE", "paciente_estandarizado"); // The database name.
 
$mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);
// If you are connecting via TCP/IP rather than a UNIX socket remember to add the port number as a parameter.
 







?>