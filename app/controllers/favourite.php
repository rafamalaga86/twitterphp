<?php

require_once('../config/apidetails.php');
require_once('../Twitterphp.php');

$app = new TwitterPHP($settings);
$id = $_GET['id'];

echo "Esto es: $id";


$url = 'http://testing.clickcreacion.com/twitterphp/app/controllers/test.php';
$data = ['id' => $id];

$options = [
    'http' => [
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data),
    ],
];
$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);

var_dump($result);