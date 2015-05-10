<?php

require_once('../config/database.php');

// Include details for the app to work
require_once('../config/apidetails.php');
require_once('../Twitterphp.php');

$api_connection = new TwitterPHP($settings, $url, $getfield, $requestMethod);

$tweets = $api_connection->getStatuses();

var_dump($tweets);


// Create connection
$conn = new mysqli($server, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
	echo "Connection stablished successfully <br><br>";
}



$sql = "INSERT IGNORE INTO tweets (
	tt_id, 
	text,
	source,
	truncated,
	in_reply_to_status_id_str,
	in_reply_to_user_id_str,
	in_reply_to_screen_name,
	favorited,
	retweeted,
	possibly_sensitive,
	lang
)

VALUES (
	'590439141420224512', 
	'API updates for Direct Message options https://t.co/RXjGMkCbbi', 
	'<a href=\"http://itunes.apple.com/us/app/twitter/id409789998?mt=12\" rel=\"nofollow\">Twitter for Mac</a>',
	0,
	0,
	0,
	0,
	0,
	0,
	1,
	'en'
)";


if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


/*
Values to store
---------------------------

id

created_at
tt_id
text
created_at STRING (60)
id_str STRING (30) "590439141420224512"
text TEXT
source TEXT 
truncated  BOOLEAN
in_reply_to_status_id_str NULLABLE STRING (30)
in_reply_to_user_id_str NULLABLE STRING (30)
in_reply_to_screen_name NULLABLE STRING (30)
favorited BOOLEAN
retweeted BOOLEAN
possibly_sensitive NULLABLE BOOLEAN
lang NULLABLE STRING (10)

CREATE TABLE Tweets
(
created_at STRING (60)


id INT,
created_at VARCHAR(60),
tt_id VARCHAR(30),
text TEXT
source TEXT 
truncated  BOOLEAN
in_reply_to_status_id_str NULLABLE STRING (30)
in_reply_to_user_id_str NULLABLE STRING (30)
in_reply_to_screen_name NULLABLE STRING (30)
favorited BOOLEAN
retweeted BOOLEAN
possibly_sensitive NULLABLE BOOLEAN
lang NULLABLE STRING (10)
);




["entities"]=>
array(4) {
    ["hashtags"]=>
    array(0) {
    }
    ["symbols"]=>
    array(0) {
    }
    ["user_mentions"]=>
    array(0) {
    }
    ["urls"]=>
    array(1) {
      [0]=>
      array(4) {
        ["url"]=>
        string(23) "https://t.co/RXjGMkCbbi"
        ["expanded_url"]=>
        string(74) "https://twittercommunity.com/t/api-updates-for-direct-messages-rules/36061"
        ["display_url"]=>
        string(38) "twittercommunity.com/t/api-updates-…"
        ["indices"]=>
        array(2) {
          [0]=>
          int(39)
          [1]=>
          int(62)
        }
      }
    }
  }



*/





// Create database
// $sql = "CREATE DATABASE myDB";
// if ($conn->query($sql) === TRUE) {
//     echo "Database created successfully";
// } else {
//     echo "Error creating database: " . $conn->error;
// }

$conn->close();