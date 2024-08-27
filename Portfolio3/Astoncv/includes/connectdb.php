<?php

$db_host = 'localhost';
$db_name = 'u_210044641_astoncv';
$username = 'u-210044641';
$password = 'G2Rv9Ds6kDtmMNt';

try {
	$db = new PDO("mysql:dbname=$db_name;host=$db_host", $username, $password); 
	#$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $ex) {
	echo("Failed to connect to the database.<br>");
	echo($ex->getMessage());
	exit;
}
