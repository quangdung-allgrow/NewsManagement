<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/

Route::get('/', ['as' => 'news', 'uses' => 'Web\HomeController@index']);

Route::prefix('news')->group( function() {
	Route::get('/{title_slug}', ['as' => 'news.detail', 'uses' => 'Web\HomeController@newsDetail']);
	Route::get('/cate/{title_slug}', ['as' => 'newsCategories.showCate', 'uses' => 'Web\HomeController@showCate']);

});


// admin auth
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
