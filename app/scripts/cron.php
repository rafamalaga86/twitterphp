<?php

// Include details for the app to work
require_once('../config/apidetails.php');
require_once('../Twitterphp.php');

$api_connection = new TwitterPHP($settings, $url, $getfield);

$tweets = $api_connection->getStatuses();

$api_connection->storeStatuses($tweets);
