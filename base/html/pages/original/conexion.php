<?php

	/*define("DB_SERVER", "localhost");
	define("DB_USER", "arrend");
	define("DB_PASS", "arrend");
	define("DB_NAME", "calc-dev");*/

	define("DB_SERVER", "localhost");
	define("DB_USER", "root");
	define("DB_PASS", "Dev_2021");
	define("DB_NAME", "calc_dev");
	$connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
	mysqli_query($connection, "SET NAMES 'utf8'");
	if (mysqli_connect_errno()) {
		die("Database connection failed: " .
			mysqli_connect_error() .
			" (" . mysqli_connect_errno() . ")"
		);
	}

?>