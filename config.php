<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */

	$db_host = "localhost";
	$db_name = "eventclub";
	$db_user = "root";
	$db_pass = "";

	try{
		$db_con = new PDO("mysql:host={$db_host};dbname={$db_name}",$db_user,$db_pass);
		$db_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e){
		echo $e->getMessage();
	}
?>