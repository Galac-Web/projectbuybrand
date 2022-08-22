<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Location
{
    public function handle(Request $request, Closure $next)
    {
        if (!session()->has('city')) {
            session(['city' => optional(ip()->getLocation())->city]);
        }

        if ($request->has('ip')) {
            session(['city' => optional(ip()->getLocation($request->ip))->city]);
        }

        return $next($request);
    }
}
