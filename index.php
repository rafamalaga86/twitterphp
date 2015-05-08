<?php

ini_set('display_errors', true);
error_reporting(E_ALL);

$settings = array(
    'oauth_access_token' => "1359745544-fbLmg2Mr7xXGANpp3eCkluUjcqQ4MpK1yur5zkP",
    'oauth_access_token_secret' => "D6qEa4vn3ssef7BaZSfDnEOtLn21D2TUZ7b1DAbeMPzpX",
    'consumer_key' => "Gy9GHvSKBKGtSndZgUfBwmzan",
    'consumer_secret' => "h5xp4MKIRv9BT6I4pHFQ5X7ltEdLErtFlN3Gg7zbOZHBJROdOK"
);

require_once('app/Twitterphp.php');
require_once('app/lib/View.php');

$connection = new TwitterPHP($settings);

$tweets = $connection->getStatuses();


View::make('app/views/home.php', $tweets);


