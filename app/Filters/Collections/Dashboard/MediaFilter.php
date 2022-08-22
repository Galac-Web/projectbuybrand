<?php

namespace App\Filters\Collections\Dashboard;

use App\Filters\QueryFilter;

class MediaFilter extends QueryFilter
{
    public function title(string $title)
    {
        $this->query->where('title', 'LIKE', '%'.$title.'%');
    }

    public function type(int $type)
    {
        $this->query->where('type_id', $type);
    }

    public function getFilters(): ?array
    {
        return $this->request->all();
    }
}
