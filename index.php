<?php

ini_set('display_errors', true);
error_reporting(E_ALL);

// Include de Helper classes
require_once('app/lib/View.php');

// Include details for the app to work
require_once('app/config/apidetails.php');
require_once('app/Twitterphp.php');



	// Database details
	require_once('app/config/database.php');

	// Create connection
	$conn = new mysqli($server, $username, $password, $database);

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} else {
		echo "Connection stablished successfully <br><br>";
	}


	$sql = "SELECT * FROM tweets";

	$result = $conn->query($sql);

	for ( $i=0 ; $row = $result->fetch_assoc() ; $i++){

		$tweets[$i] = $row;

	}

	var_dump($tweets);

	// $tweets->free();
	$conn->close();




View::make('home', ['tweets' => $tweets]);


