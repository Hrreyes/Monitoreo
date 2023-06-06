<?php
	define("DB_SERVER", "kidslab.accountsupportmysql.com");
	define("DB_USER", "kidslab");
	define("DB_PASS", "kidslabpass");
	define("DB_NAME", "kidslab_420");


  // 1. Create a database connection
  $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
  // Test if connection succeeded
  mysqli_query($connection, "SET NAMES 'utf8'");
  if(mysqli_connect_errno()) {
    die("Database connection failed: " . 
         mysqli_connect_error() . 
         " (" . mysqli_connect_errno() . ")"
    );
  }
?>