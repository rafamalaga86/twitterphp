<?php

// Include details for the app to work
require_once('../config/apidetails.php');
require_once('../config/details.php');
require_once('../Twitterphp.php');

$api_connection = new TwitterPHP($settings);

$tweets = $api_connection->getStatuses($screen_name, $max_statuses);

$api_connection->storeStatuses($tweets);
