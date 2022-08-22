<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasOne;

/** @mixin \Illuminate\Database\Eloquent\Model */
trait Multilanguage
{
    protected function bootMultilanguage()
    {
        self::addGlobalScope('language', function (Builder $query) {
            $language = \App\Services\Multilanguage::current();

            $query->whereHas('language', fn (Builder $query) => $query->where('slug', $language))->orWhere('language_id', null);
        });
    }

    public function language(): HasOne
    {
        return $this->hasOne(\App\Models\Language::class, 'id', 'language_id');
    }
}
