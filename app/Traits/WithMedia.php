<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

/** @mixin \Illuminate\Database\Eloquent\Model */
trait WithMedia
{
    public function scopeWithMedia(Builder $query)
    {
        $query->with('media', 'media.model');
    }
}