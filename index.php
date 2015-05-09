<?php

ini_set('display_errors', true);
error_reporting(E_ALL);


require_once('app/config/apidetails.php');
require_once('app/Twitterphp.php');
require_once('app/lib/View.php');

$connection = new TwitterPHP($settings, $url, $getfield, $requestMethod);

$tweets = $connection->getStatuses();


View::make('home', ['tweets' => $tweets]);


