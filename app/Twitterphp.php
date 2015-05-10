<?php

class TwitterPHP {

	private $url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
	private $getfield = '?screen_name=twitterapi&count=1';
	private $requestMethod = 'GET';
	private $settings;

	public function __construct($settings, $url, $getfield, $requestMethod){
		$this->settings = $settings;
		$this->url = $url;
		$this->getfield = $getfield;
		$this->requestMethod = $requestMethod;
	}

	public function getStatuses() {

		require_once('../../vendor/j7mbo/twitter-api-php/TwitterAPIExchange.php');

		$twitter = new TwitterAPIExchange($this->settings);

		$request = $twitter->setGetfield($this->getfield)
			               ->buildOauth($this->url, $this->requestMethod)
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

			return $tweets;
		}
	}

	public function postFavourite($id){

		require_once('TwitterAPIExchange.php');

		$settings = array(
		    'oauth_access_token' => "YOUR_OAUTH_ACCESS_TOKEN",
		    'oauth_access_token_secret' => "YOUR_OAUTH_ACCESS_TOKEN_SECRET",
		    'consumer_key' => "YOUR_CONSUMER_KEY",
		    'consumer_secret' => "YOUR_CONSUMER_SECRET"
		);

		$url = 'https://api.twitter.com/1.1/blocks/create.json';
		$requestMethod = 'POST';

		$postfields = array(
		    'screen_name' => 'usernameToBlock', 
		    'skip_status' => '1'
		);

		$twitter = new TwitterAPIExchange($settings);
		echo $twitter->buildOauth($url, $requestMethod)
					 ->setPostfields($postfields)
					 ->performRequest();
		}


}






