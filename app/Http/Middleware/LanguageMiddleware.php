<?php

namespace App\Http\Middleware;

use Closure;

class LanguageMiddleware
{
    public function handle($request, Closure $next)
    {
        app()->setLocale(lang());
        return $next($request);
    }
}
