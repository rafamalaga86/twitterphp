<?php


/**
* This class is on charge of Views
*/

class View {


	/**
	*
	* @param string $template name 
	* @param array $vars array of vars to pass to the template 
	* @return bool $success Was the operation successful?
	*
	*/
	public static function make($template, $vars) {

		require_once 'app/config/details.php';

		extract($vars);

		include("app/views/$template.php");

	}

}