<?php

require_once('../config/apidetails.php');
require_once('../Twitterphp.php');

$request = new TwitterPHP($settings);
$id = $_GET['id'];

echo "Esto es: $id";

$response = $request->postFavourite($id);

var_dump($response);