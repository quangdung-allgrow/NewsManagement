<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', ['as' => 'home', 'uses' => 'Web\HomeController@index']);

Route::prefix(config('web.admin-prefix'))->group( function() {
	Route::prefix('auth')->group( function() {
	    # Login
	    Route::get('login', [
	    	'as' => 'user.getLogin',
	    	'uses' => 'Auth\AuthController@getLogin',
	    	'middleware' => 'logged.in'
	    ]);
	    # Do Login
	    Route::post('postLogin', [
	    	'as' => 'user.postLogin',
	    	'uses' => 'Auth\AuthController@postLogin'
	    ]);
	    # Logout
        Route::get('logout', [
            'as' => 'user.logout',
            'uses' => 'Auth\AuthController@getLogout',
            'middleware' => 'admin.auth'
        ]);
	});
});
