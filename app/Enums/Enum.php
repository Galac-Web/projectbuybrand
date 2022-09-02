<?php

namespace App\Enums;

use ReflectionClass;

class Enum
{
    public static function get(): array
    {
        $reflection = new ReflectionClass(static::class);

        return $reflection->getConstants();
    }

    public static function getValues(): array
    {
        return array_values(self::get());
    }
}
