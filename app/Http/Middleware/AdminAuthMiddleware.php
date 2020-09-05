<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;

class AdminAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (auth()->guard($guard)->check()) {
            return redirect(RouteServiceProvider::DASHBOARD);
        }
        return $next($request);
    }
}
