<?php

class TwitterPHP {

	private $settings;

	public function __construct($settings){
		$this->settings = $settings;
	}

	public function getStatuses($number) {

		require_once('../../vendor/j7mbo/twitter-api-php/TwitterAPIExchange.php');

		$requestMethod = 'GET';
		$getfield = '?screen_name=twitterapi&count='.$number;
		$url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';


		$twitter = new TwitterAPIExchange($this->settings);

		$request = $twitter->setGetfield($getfield)
			               ->buildOauth($url, $requestMethod)
			               ->performRequest();

		return json_decode($request, true);
	}

	public function storeStatuses($tweets) {

		// Database details
		require_once('../config/database.php');

		// Create connection
		$conn = new mysqli($server, $username, $password, $database);

		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		} else {
			echo "Connection stablished successfully <br><br>";
		}

		foreach ( $tweets as $tweet ){


			foreach ( $tweet as $key => $value ){

				$$key = $value;

				if ('string' == gettype($value)){  // Escape it

					$$key = $conn->real_escape_string($$key);

				}
			}

			$datetime = strtotime($created_at);
			$created_at_processed = date("Y-m-d H:i:s", $datetime);



			$sql = "INSERT IGNORE INTO tweets (
				created_at,
				name,
				screen_name,
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
				'$created_at_processed',
				'$user[name]',
				'$user[screen_name]',
				'$id_str', 
				'$text', 
				'$source',
				'$truncated',
				'$in_reply_to_status_id_str',
				'$in_reply_to_user_id_str',
				'$in_reply_to_screen_name',
				'$favorited',
				'$retweeted',
				'$possibly_sensitive',
				'$lang'
			)";


			if ($conn->query($sql) === TRUE) {
			    echo "<br><br>New record created successfully";
			} else {
			    echo "<br><br>Error: " . $sql . "<br>" . $conn->error;
			}

		}

		$conn->close();
	}

	public function queryStatuses(){

		// Database details
		require_once('app/config/database.php');

		// Create connection
		$conn = new mysqli($server, $username, $password, $database);

		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		} else {

			$sql = "SELECT * FROM tweets";

			$result = $conn->query($sql);

			for ( $i=0 ; $row = $result->fetch_assoc() ; $i++){

				$tweets[$i] = $row;

			}

			$result->free_result();
			$conn->close();

			if ( ! isset($tweets)){
				echo "There is no tweets in the DB";

				$tweets = NULL;
			}

			return $tweets;
		}
	}



	public function postFavourite($id){

		require_once('TwitterAPIExchange.php');

		$url = 'http://testing.clickcreacion.com/twitterphp/app/controllers/test.php';
		$requestMethod = 'POST';

		$postfields = [ 'id' => $id ];

		$twitter = new TwitterAPIExchange($this->settings);

		$twitter->buildOauth($url, $requestMethod)
				->setPostfields($postfields)
				->performRequest();

		return $twitter;


		/*
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
		*/

	}


}






