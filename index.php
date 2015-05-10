<?php

ini_set('display_errors', true);
error_reporting(E_ALL);

// Include de Helper classes
require_once('app/lib/View.php');

// Include details for the app to work
require_once('app/config/apidetails.php');
require_once('app/Twitterphp.php');


$request = new TwitterPHP($settings);

$tweets = $request->queryStatuses();



View::make('home', ['tweets' => $tweets]);



