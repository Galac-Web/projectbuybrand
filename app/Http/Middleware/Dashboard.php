<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class Dashboard
{
    public function handle(Request $request, Closure $next)
    {
        abort_unless(Gate::allows('dashboard'), 403);

        return $next($request);
    }
}
