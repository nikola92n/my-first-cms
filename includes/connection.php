<?php 

	$host = "localhost";
	$database = "firstcms";
	$username = "root";
	$password = "wartex92";

		try {

	$connect = new PDO("mysql:host=$host;dbname=$database", $username, $password);

	$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}


	catch(PDOException $error) {
		echo $error->getMessage();
	}

 ?>