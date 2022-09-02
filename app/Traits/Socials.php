<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Relations\HasMany;

trait Socials
{
    public function socialite(): HasMany
    {
        return $this->hasMany(\App\Models\Social::class);
    }
}