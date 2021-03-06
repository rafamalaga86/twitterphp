<?php

/**
* This class GET and POST using the Twitter API REST and also
* write and read data from the Database, caching twitters statuses
*
*/

class TwitterPHP {

	private $settings;

	public function __construct($settings){
		$this->settings = $settings;
	}

	/**
	*
	* @param string $scree_name Twitter user
	* @param int $number Number of twits the function should get from Twitter API REST
	* @return array multdimensional
	*
	*/
	public function getStatuses($screen_name, $number) {

		require_once('../../vendor/j7mbo/twitter-api-php/TwitterAPIExchange.php');

		$requestMethod = 'GET';
		$getfield = '?screen_name='. $screen_name .'&count='.$number;
		$url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';


		$twitter = new TwitterAPIExchange($this->settings);

		$request = $twitter->setGetfield($getfield)
			               ->buildOauth($url, $requestMethod)
			               ->performRequest();

		return json_decode($request, true);
	}


	/**
	*
	* @param array multidimensional $tweets 
	* @return bool $success Was the operation successful?
	*
	*/
	public function storeStatuses($tweets) {

		// Database details
		require_once('../config/database.php');

		// Create connection
		$conn = new mysqli($server, $username, $password, $database);

		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		} else {


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
				)
				";


				if ($conn->query($sql) === TRUE) {
					$success = true;
				    echo "<br><br>New record created successfully";
				} else {
				    echo "<br><br>Error: " . $sql . "<br>" . $conn->error;
				}

			}

			$conn->close();

			return $success;
		}
	}



	/**
	*
	* @return array multidimensional with the twitter statuses
	*
	*/
	public function queryStatuses() {

		// Database details
		require_once('app/config/database.php');

		// Create connection
		$conn = new mysqli($server, $username, $password, $database);

		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		} else {

			$sql = "SELECT * FROM tweets ORDER BY created_at DESC";

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



	/**
	*
	* @param string $id the ID of the twitter we want to check if it is favourited
	* @return bool $result_bool Is it favourite?
	*
	*/
	public function isFavouriteOn($id) {

		// Alter the field of favourite in the DB
		require('../config/database.php');

		// Create connection
		$conn = new mysqli($server, $username, $password, $database);

		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		} else {

			$sql = "SELECT favorited FROM tweets WHERE tt_id = '$id'";

			$result = $conn->query($sql)->fetch_row()[0];

			$conn->close();
		}

		$result_bool = $result == 1 ? true : false;

		return $result_bool;
	}



	/**
	*
	* @param string $id the ID of the twitter we want to favourite
	* @return array multidimensional with the json response
	*
	*/
	public function postFavouriteOn($id) { 

		// Post the favourite to facebook
		require_once('../../vendor/j7mbo/twitter-api-php/TwitterAPIExchange.php');

		$url = 'https://api.twitter.com/1.1/favorites/create.json';
		$requestMethod = 'POST';

		$postfields = [ 'id' => $id ];

		$twitter = new TwitterAPIExchange($this->settings);

		$response = $twitter->buildOauth($url, $requestMethod)
							->setPostfields($postfields)
							->performRequest();


		// Alter the field of favourite in the DB
		require('../config/database.php');

		// Create connection
		$conn = new mysqli($server, $username, $password, $database);

		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		} else {

			$sql = "UPDATE tweets SET favorited = '1' WHERE tt_id = '$id';";

			$result = $conn->query($sql);

			$conn->close();
		}

		return json_decode($response, true);
	}



	/**
	*
	* @param string $id the ID of the twitter we want to defavourite
	* @return array multidimensional with the json response
	*
	*/
	public function postFavouriteOff($id) {

		require_once('../../vendor/j7mbo/twitter-api-php/TwitterAPIExchange.php');

		$url = 'https://api.twitter.com/1.1/favorites/destroy.json';
		$requestMethod = 'POST';

		$postfields = [ 'id' => $id ];

		$twitter = new TwitterAPIExchange($this->settings);

		$response = $twitter->buildOauth($url, $requestMethod)
							->setPostfields($postfields)
							->performRequest();

		// Alter the field of favourite in the DB
		require('../config/database.php');

		// Create connection
		$conn = new mysqli($server, $username, $password, $database);

		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		} else {

			$sql = "UPDATE tweets SET favorited = '0' WHERE tt_id = '$id';";

			$result = $conn->query($sql);

			$conn->close();
		}

		return json_decode($response, true);
	}




	/**
	*
	* @param string $id the ID of the twitter we want to retweet
	* @return array multidimensional with the json response
	*
	*/
	public function postRetweet($id) {

		// Post the favourite to facebook
		require_once('../../vendor/j7mbo/twitter-api-php/TwitterAPIExchange.php');

		$url = "https://api.twitter.com/1.1/statuses/retweet/$id.json";
		$requestMethod = 'POST';

		$postfields = [ 'id' => $id ];

		$twitter = new TwitterAPIExchange($this->settings);

		$response = $twitter->buildOauth($url, $requestMethod)
							->setPostfields($postfields)
							->performRequest();




		// Alter the field of favourite in the DB 
		require('../config/database.php');

		// Create connection
		$conn = new mysqli($server, $username, $password, $database);

		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		} else {

			$sql = "UPDATE tweets SET retweeted = '1' WHERE tt_id = '$id';";

			$result = $conn->query($sql);

			$conn->close();
		}

		return json_decode($response, true);
	}



	/**
	*
	* @param string $status the status we want to update as an asnwer
	* @param string $in_reply_to_status_id the id of the status we want to answer
	* @return array multidimensional with the json response
	*
	*/
	public function postAnswer($status, $in_reply_to_status_id) {
		// Post the favourite to facebook
		require_once('../../vendor/j7mbo/twitter-api-php/TwitterAPIExchange.php');

		$url = "https://api.twitter.com/1.1/statuses/update.json";
		$requestMethod = 'POST';

		$postfields = [
			'status' => $status,
			'in_reply_to_status_id' => $in_reply_to_status_id
		];

		$twitter = new TwitterAPIExchange($this->settings);

		$response = $twitter->buildOauth($url, $requestMethod)
							->setPostfields($postfields)
							->performRequest();

		return json_decode($response, true);
	}

}






