<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
*/


// user router
Route::prefix('news')->group( function ( $router ) {

    Route::post('delete', [
        'as' => 'news.delete',
        'uses' => 'NewsController@delete',
        'middleware' => 'can:news.delete',
    ]);

});