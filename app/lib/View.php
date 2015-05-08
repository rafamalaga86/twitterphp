<?php

class View {

	public static function make($template, $vars) {

		include("$template");

	}

}