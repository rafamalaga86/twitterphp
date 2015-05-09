<?php

class View {

	public static function make($template, $vars) {

		extract($vars);

		include("app/views/$template.php");

	}

}