<?php

require_once('../config/apidetails.php');
require_once('../Twitterphp.php');

$request = new TwitterPHP($settings);
$id = $_POST['ttid'];
$status = $_POST['status'];

// $response = $request->postFavouriteOff($id);


// header('Location: ' . $_SERVER['HTTP_REFERER']);


