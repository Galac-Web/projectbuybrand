<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Relations\MorphOne;

/** @mixin \Illuminate\Database\Eloquent\Model */
trait Stats
{
    public function stats(): MorphOne
    {
        return $this->morphOne(\App\Models\Stats::class, 'model');
    }
}
