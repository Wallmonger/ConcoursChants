<?php 
	$servername = "localhost";
	$username  = "benjaminl";            // Est ce qu'il y a vraiment besoin d'une explication?
	$password = "benjaminl";
	$dbname = "chant";

	$db = mysqli_connect($servername, $username, $password, $dbname);

	if (!$db) {
		die("Connection Failed". mysqli_connect_error());
	}
 ?>