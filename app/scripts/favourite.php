<?php

require_once('../config/apidetails.php');
require_once('../Twitterphp.php');

$request = new TwitterPHP($settings);
$id = $_GET['id'];

// $is_on = $request->isFavouriteOn($id);

// echo $is_on;

if (1){
	$response = $request->postFavouriteOff($id);
} else {
	$response = $request->postFavouriteOn($id);
}


header('Location: ' . $_SERVER['HTTP_REFERER']);


