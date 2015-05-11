<?php


/**
* This script is for retweeting
*/

require_once('../config/apidetails.php');
require_once('../Twitterphp.php');

$request = new TwitterPHP($settings);
$id = $_GET['id'];

$response = $request->postRetweet($id);


header('Location: ' . $_SERVER['HTTP_REFERER']);

// var_dump($response);