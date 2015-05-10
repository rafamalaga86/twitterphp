<?php

require_once('../config/apidetails.php');
require_once('../Twitterphp.php');

$request = new TwitterPHP($settings);
$id = $_GET['id'];


$response = $request->postFavouriteOn($id);


var_dump($response);


