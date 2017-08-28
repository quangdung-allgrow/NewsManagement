<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Schema;

class BindingServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerBindings(); // binding class implement interface
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    private function registerBindings() 
    {
        $this->app->bind(
                'App\\Repositories\\Auth\\Authentication',
                'App\\Repositories\\Auth\\SentinelAuthentication'
            );

        $this->app->bind(
                'App\\Repositories\\News\\NewsRepository', 
                function ($app) {
                    return new \App\Repositories\News\EloquentNewsRepository(
                        $app->make('App\Entities\News')
                    );
            });

        $this->app->bind(
                'App\\Repositories\\News\\NewsCategoriesRepository', 
                function ($app) {
                    return new \App\Repositories\News\EloquentNewsCategoriesRepository(
                        $app->make('App\Entities\NewsCategories')
                    );
            });
    }

}
