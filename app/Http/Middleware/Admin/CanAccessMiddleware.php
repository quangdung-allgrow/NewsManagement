<?php

namespace App\Http\Middleware\Admin;

use Closure;
use Illuminate\Http\Request;
use App\Repositories\Auth\Authentication;
use Illuminate\Support\Facades\Response;

class CanAccessMiddleware
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
    public function handle(Request $request, Closure $next, $routeName)
    {
        if ($this->auth->hasAccess($routeName) === false) {
            return $this->handleUnauthorizedRequest($request, $routeName);
        }
        
        return $next($request);
    }

    /**
     * @param Request $request
     * @param $routeName
     */
    private function handleUnauthorizedRequest(Request $request, $routeName)
    {
        if ($request->ajax()) {
            return Response::json([
                'code' => 403,
                'message' => '<span class="red">'.__('messages.permission denied', ['permission' => $routeName]).'</span>',
                'data' => null
            ]);
        }

        return view('errors.403');
    }
}
