<?php

namespace App\Filters\Collections\Main;

use App\Filters\QueryFilter;
use App\Models\Media;
use Illuminate\Database\Eloquent\Builder;

class MediaFilter extends QueryFilter
{
    public function tag(string $tag)
    {
        $this->query->whereHas('tags', fn (Builder $query) => $query->where('model', Media::class)->where('slug', $tag));
    }

    public function type(string $type)
    {
        $this->query->whereHas('type', fn (Builder $query) => $query->where('name', $type));
    }

    public function getFilters(): ?array
    {
        return $this->request->all();
    }
}
