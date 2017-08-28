<?php

if (!function_exists('has_error')) {
	function has_error($errors, $field) {
		return $errors->has($field) ? 'has-error' : '';
	}
}

function active_menu($routeName) {
	return Route::currentRouteName() == $routeName ? 'active' : '';
}