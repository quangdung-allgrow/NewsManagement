<?php

namespace App\Http\Middleware\Admin\Auth;

use App\Repositories\Auth\Authentication;

class LoggedInMiddleware
{
    /**
     * @var Authentication
     */
    private $auth;

    public function __construct(Authentication $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     * @return mixed
     */
    public function handle($request, $next)
    {
        if ( $this->auth->check() ) {
            return redirect()->route('dashboard.index');
        }

        return $next($request);
    }
}
