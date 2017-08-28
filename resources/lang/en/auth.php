<?php

return [
    'messages' => [
        'invalid login' => 'Invalid login information',
        'account lock' => 'Account blocked for :delay seconds',
        'sign in' => 'Sign In',
        'remember me' => 'Remember me',
        'please sign in' => 'Please sign in',
    ],
    'validates' => [
    	'required' => 'The :field field is required',
		'min' => 'The :field must be at least :min characters',
		'email' => 'The email must be a valid email address',
		'confirmed' => 'The :field confirmation does not match',
		'same' => 'The :field confirmation does not match',
		'unique' => 'The :field has already been taken',
		'regex' => 'The :field format is invalid',
		'choose language' => 'Please choose a language.',
		'field empty' => 'Field is not empty.',
		'csv only allowed' => 'CSV only allowed.'
    ]
];
