<?php 
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$dbname = "sistema_testeo";

	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

	if (!$conn) 
	{
		die("no hay conexion: " .mysqli_connect_error());
	}
 ?>