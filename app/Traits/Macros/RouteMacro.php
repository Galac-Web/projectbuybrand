<?php

namespace App\Traits\Macros;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;

trait RouteMacro
{
    /**
     * Route Macros
     *
     * @return void
     */
    private static function macros(): void
    {
        Route::macro('grouping', function (string $prefix, callable $group, ?string $name = null): void {
            $name = $name ?? str_replace(['/'], '.', trim($prefix, '/'));

            if (empty($name)) {
                $name = 'index';
            }

            Route::prefix($prefix)->name(Str::finish($name, '.'))->group($group);
        });
    }
}
