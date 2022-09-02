<?php

namespace App\Helpers;

use Illuminate\Support\Str;
use Illuminate\Support\Stringable;

class Dashboard
{
    public static function form(?string $view = null, array $data = [], array $mergeData = [])
    {
        return view(
            Str::finish($view, '.' . self::getFormName()),
            $data,
            $mergeData
        );
    }

    public static function getFormName(): string
    {
        return (string) Str::of('form')->when(
            request()->ajax(),
            fn (Stringable $str) => $str->start('_')
        );
    }
}
