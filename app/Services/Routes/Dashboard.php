<?php

namespace App\Services\Routes;

use Illuminate\Support\Facades\Route;

class Dashboard
{
    public const NAME = 'dashboard';

    public static function routes(array $data, bool $auth = false): void
    {
        Route::prefix($data['prefix'])
            ->name($data['name'])
            ->middleware($data['middleware'])
            ->namespace($data['namespace'])
            ->group($auth ? fn () => self::auth() : $data['group']);
    }

    public static function auth(): void
    {
        Route::get('/auth', 'Auth\LoginController')->name('auth');
    }
}
