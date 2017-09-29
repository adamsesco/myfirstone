<?php 
    
	ob_start();
	$db_user = "root";
	$db_pass = "";
	$db_name = "alpha";
	$db_local = "localhost";
    $site = "http://localhost/alpha/";
	$cehck_data_host = @mysql_connect($db_local, $db_user, $db_pass);
	$check_data_db = @mysql_select_db($db_name);
    
?>