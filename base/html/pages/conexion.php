<?php
	
	define("DB_SERVER", "localhost");
	define("DB_USER", "root");
	define("DB_PASS", "Hr42165526");
	define("DB_NAME", "controlador_web");
	$connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
	$resultado = mysqli_query($connection, "SET NAMES 'utf8'");
	//var_dump($resultado);
	//exit();
	
	if (mysqli_connect_errno()) {
		die("Database connection failed: " .
			mysqli_connect_error() .
			" (" . mysqli_connect_errno() . ")"
		);
	}
?>
