<?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
*/

Route::prefix(config('web.admin-prefix'))->group( function() {

    # dashboard home
    Route::get('/', [
        'as' => 'dashboard.index', 
        'uses' => 'DashboardController@index',
        'middleware' => 'can:dashboard.index'
    ]);

    #News and News categories
    Route::prefix('news')->group( function() {
    	// index
	    Route::get('/', [
	        'as' => 'news.index',
	        'uses' => 'News\NewsController@index',
	        'middleware' => 'can:news.index',
	    ]);
	    // create
	    Route::get('create', [
	        'as' => 'news.create',
	        'uses' => 'News\NewsController@create',
	        'middleware' => 'can:news.create',
	    ]);
	    // store
	    Route::post('/', [
	        'as' => 'news.store',
	        'uses' => 'News\NewsController@store',
	        'middleware' => 'can:news.store',
	    ]);
	    // show
	    Route::get('{id}', [
	        'as' => 'news.show',
	        'uses' => 'News\NewsController@show',
	        'middleware' => 'can:news.show',
	    ]);
	    // edit
	    Route::get('{id}/edit', [
	        'as' => 'news.edit',
	        'uses' => 'News\NewsController@edit',
	        'middleware' => 'can:news.edit',
	    ]);
	    // update
	    Route::put('{id}', [
	        'as' => 'news.update',
	        'uses' => 'News\NewsController@update',
	        'middleware' => 'can:news.update',
	    ]);
	    //destroy
	    Route::delete('{id}', [
	        'as' => 'news.destroy',
	        'uses' => 'News\NewsController@destroy',
	        'middleware' => 'can:news.destroy',
	    ]);

	    # News categories
	    Route::prefix('categories')->group( function() {
	    	// index
		    Route::get('/', [
		        'as' => 'newsCategories.index',
		        'uses' => 'News\NewsCategoriesController@index',
		        'middleware' => 'can:newsCategories.index',
		    ]);
		    // create
		    Route::get('create', [
		        'as' => 'newsCategories.create',
		        'uses' => 'News\NewsCategoriesController@create',
		        'middleware' => 'can:newsCategories.create',
		    ]);
		    // store
		    Route::post('/', [
		        'as' => 'newsCategories.store',
		        'uses' => 'News\NewsCategoriesController@store',
		        'middleware' => 'can:newsCategories.store',
		    ]);
		    // show
		    Route::get('{id}', [
		        'as' => 'newsCategories.show',
		        'uses' => 'News\NewsCategoriesController@show',
		        'middleware' => 'can:newsCategories.show',
		    ]);
		    // edit
		    Route::get('{id}/edit', [
		        'as' => 'newsCategories.edit',
		        'uses' => 'News\NewsCategoriesController@edit',
		        'middleware' => 'can:newsCategories.edit',
		    ]);
		    // update
		    Route::put('{id}', [
		        'as' => 'newsCategories.update',
		        'uses' => 'News\NewsCategoriesController@update',
		        'middleware' => 'can:newsCategories.update',
		    ]);
		    //destroy
		    Route::delete('{id}', [
		        'as' => 'newsCategories.destroy',
		        'uses' => 'News\NewsCategoriesController@destroy',
		        'middleware' => 'can:newsCategories.destroy',
		    ]);
	    });
    });

});
