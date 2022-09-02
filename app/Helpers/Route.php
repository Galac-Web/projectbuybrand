<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Route as Facade;

class Route
{
    public function current(): ?\Illuminate\Routing\Route
    {
        return Facade::current();
    }
}
