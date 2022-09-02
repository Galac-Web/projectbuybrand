<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Multilanguage
{
    public function handle(Request $request, Closure $next)
    {
        $language = \App\Services\Multilanguage::current();

        app()->setLocale($language);

        return $next($request);
    }
}
