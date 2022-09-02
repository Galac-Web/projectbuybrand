<?php

namespace App\Filters\Traits;

use App\Filters\Contracts\QueryFilterContract;
use Illuminate\Database\Eloquent\Builder;

/** @mixin \Illuminate\Database\Eloquent\Model */
trait Filterable
{
    public function scopeFilter(Builder $query, QueryFilterContract $filter)
    {
        $filter->apply($query);
    }
}
