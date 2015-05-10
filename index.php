<?php

ini_set('display_errors', true);
error_reporting(E_ALL);

// Include de Helper classes
require_once('app/lib/View.php');

// Include details for the app to work
require_once('app/config/apidetails.php');
require_once('app/Twitterphp.php');


$app = new TwitterPHP($settings, $url, $getfield, $requestMethod);

$tweets = $app->queryStatuses();



View::make('home', ['tweets' => $tweets]);

var_dump($tweets);


