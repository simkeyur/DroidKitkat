<?php  
$db_host = "mysql2.000webhost.com"; 
$db_username = "a5940872_admin";
$db_pass = "unite123"; 
$db_name = "a5940872_project"; 

mysql_connect("$db_host","$db_username","$db_pass") or die ("could not connect to mysql");
mysql_select_db("$db_name") or die ("no database");              
?>
