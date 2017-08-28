<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * @var array
     */
    protected $middlewares = [
        'admin.auth' => 'Admin\\AdminMiddleware',          // redirect to login page if user not login
        'logged.in'  => 'Admin\\Auth\\LoggedInMiddleware', // redirect to dashboard if user logded
        'can'        => 'Admin\\CanAccessMiddleware',      // check user permission
    ];

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191); // set length limit string

        $this->registerMiddleware(); // register middleware

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


    private function registerMiddleware()
    {
        foreach ($this->middlewares as $name => $middleware) {
            $class = "App\\Http\\Middleware\\{$middleware}";
            $this->app['router']->aliasMiddleware($name, $class);
        }
    }

    private function registerBindings() 
    {
        $this->app->bind(
                'App\\Repositories\\Auth\\Authentication',
                'App\\Repositories\\Auth\\SentinelAuthentication'
            );
    }

}
