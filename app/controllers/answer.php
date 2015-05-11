<?php

require_once('../config/apidetails.php');
require_once('../Twitterphp.php');

$request = new TwitterPHP($settings);
$id = $_POST['ttid'];
$status = $_POST['status'];

// var_dump($id);

// echo '<br><br><br>';

// var_dump($status);

$response = $request->postAnswer($status, $id);


// var_dump($response);

header('Location: ' . $_SERVER['HTTP_REFERER']);


