<?php

if (!function_exists('has_error')) {
	function has_error($errors, $field) {
		return $errors->has($field) ? 'has-error' : '';
	}
}