<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "portfolio";

	// Create connection
	$connection = new mysqli($servername, $username, $password , $database);

	// Check connection
	if (!$connection) {
	    echo "faile";
	}



?> 