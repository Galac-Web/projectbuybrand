<?php

namespace App\Traits;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Builder;

/** @mixin \Illuminate\Database\Eloquent\Model */
trait HasTags
{
    public static function listTags(): Builder
    {
        return Tag::where('model', self::class);
    }

    public function scopeWhereTag(Builder $query, string $tag)
    {
        $query->whereHas('tags', fn (Builder $query) => $query->where('slug', $tag));
    }
}
