<?php

require_once('../config/apidetails.php');
require_once('../Twitterphp.php');

$app = new TwitterPHP($settings);
$id = $_GET['id'];