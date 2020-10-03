<?php

namespace App\Http\Middleware;

use Closure;

class Maintenance
{
    public function handle($request, Closure $next)
    {
        if (setting()->status == 'close') {
            return redirect()->route('close');
        }
        return $next($request);
    }
}
