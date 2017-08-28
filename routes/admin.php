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
});
