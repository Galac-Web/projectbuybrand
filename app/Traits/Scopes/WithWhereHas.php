<?php

namespace App\Traits\Scopes;

use Closure;
use Illuminate\Database\Eloquent\Builder;

/** @mixin \Illuminate\Database\Eloquent\Model */
trait WithWhereHas
{
    /**
     * Query withWhereHas()
     * 
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @param  string $relation
     * @param  \Closure $callback
     * @return void
     */
    public function scopeWithWhereHas(Builder $query, string $relation, Closure $callback): void
    {
        $query->with($relation, $callback)->whereHas($relation, $callback);
    }
}
