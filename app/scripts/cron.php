<?php

// Include details for the app to work
require_once('../config/apidetails.php');
require_once('../Twitterphp.php');

$api_connection = new TwitterPHP($settings);

$tweets = $api_connection->getStatuses(10);

/*

var_dump($tweets);

foreach ($tweets as $tweet){

	echo "<br><br>" . $tweet['text'];
}

*/

$api_connection->storeStatuses($tweets);
