<?php

namespace App\Http\Middleware\Admin;

use Closure;
use App\Repositories\Auth\Authentication;

class AdminMiddleware
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
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Check if the user not logg in
        if ( !$this->auth->check() ) {
            // Redirect to the login page
            return redirect()->route('user.getLogin');
        }

        return $next($request);
    }
}
