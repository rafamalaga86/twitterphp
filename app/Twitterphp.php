<?php

class TwitterPHP {

	protected $url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
	protected $getfield = '?screen_name=twitterapi&count=1';
	protected $requestMethod = 'GET';
	protected $settings;


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

	public function storeStatuses() {

	}

}






