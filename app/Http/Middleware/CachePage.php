<?php

namespace App\Http\Middleware;

use Closure;
use Cache;

class CachePage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        $key = $request->fullUrl();

        if (Cache::has($key)) {
            $content = Cache::get($key);
            return response($content);
        }
        
        $timeExpire = 10;

        Cache::put($key, $response->getContent(), $timeExpire);
        
        return $response;
    }
}
