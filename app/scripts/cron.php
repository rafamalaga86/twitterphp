<?php

// Include details for the app to work
require_once('../config/apidetails.php');
require_once('../Twitterphp.php');

$api_connection = new TwitterPHP($settings);

$tweets = $api_connection->getStatuses('ekomi', 50);

$api_connection->storeStatuses($tweets);
