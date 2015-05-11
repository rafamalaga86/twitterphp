<?php

class View {

	public static function make($template, $vars) {

		require_once 'app/config/details.php';

		extract($vars);

		include("app/views/$template.php");

	}

}