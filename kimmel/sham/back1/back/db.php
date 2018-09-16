<?php
	$hostname = 'localhost';
	$username = 'root';
	$password = 'kulli123';
	$database_name = 'VEHICLE';

	$db = mysqli_connect($hostname, $username, $password, $database_name);
	if(!$db) {
		die("Connection Failed". mysqli_connect_error());
	}
	$selected_db = mysqli_select_db($db,$database_name);
	if(!$selected_db) {
		die("Database Selection Failed".mysqli_error());
	}
?>