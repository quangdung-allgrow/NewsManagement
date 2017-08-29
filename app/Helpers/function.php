<?php

if (!function_exists('has_error')) {
	function has_error($errors, $field) {
		return $errors->has($field) ? 'has-error' : '';
	}
}

if ( !function_exists('active_menu') ) {
	function active_menu($routeName) {
		return Route::currentRouteName() == $routeName ? 'active' : '';
	}
}


if ( !function_exists('format_date') ) {
    function format_date($date, $format = 'd/m/Y') {
        return date($format, strtotime($date));
    }
}

if ( !function_exists('selected') ) {
    function selected($param1, $param2) {
        return $param1 != $param2 ? : 'selected';
    }
}

if ( !function_exists('checked') ) {
    function checked($param1, $check = 1) {
        return $param1 != $check ? : 'checked';
    }
}

if ( !function_exists('flash') ) {
    function flash($type, $message) {
        return session(['type' => $type, 'message' => $message]);
    }
}

if ( !function_exists('truncate') ) {
    function truncate($string, $number_char) {
        $string = html_entity_decode(strip_tags($string));
        if(strlen($string) <= $number_char) {
            return $string;
        }
        $str_wrap = wordwrap($string, $number_char, "::");
        return substr($string, 0, strpos($str_wrap, '::')). '...';
    }
}