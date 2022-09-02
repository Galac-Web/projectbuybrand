<?php

namespace App\Traits;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

/** @mixin \Illuminate\Database\Eloquent\Model */
trait WithUuid
{
    protected static function bootWithUuid()
    {
        self::creating(function (Model $model) {
            $model->uuid = Str::uuid()->toString();
        });
    }
}
