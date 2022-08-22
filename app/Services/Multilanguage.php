<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class Multilanguage
{
    public const URI = 'language';

    public static function routes(): void
    {
        if (self::enabled()) {
            Route::match(['GET', 'POST'], self::URI, function (Request $request) {
                session()->put('language', $request->language);
                session()->remove('city');

                return redirect()->back();
            })->name('switch-language');
        }
    }

    public static function current(): string
    {
        return session()->get('language') ?? config('app.locale');
    }

    public static function enabled(): bool
    {
        return env('APP_MULTILANGUAGE', false);
    }
}
