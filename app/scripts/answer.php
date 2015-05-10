<?php

require_once('../config/apidetails.php');
require_once('../Twitterphp.php');

$request = new TwitterPHP($settings);
$id = $_POST['ttid'];
$status = $_POST['status'];

var_dump($id);

echo '<br><br><br>';

// $response = $request->postFavouriteOff($id);


// header('Location: ' . $_SERVER['HTTP_REFERER']);


