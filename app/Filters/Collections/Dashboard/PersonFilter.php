<?php

namespace App\Filters\Collections\Dashboard;

use App\Filters\QueryFilter;

class PersonFilter extends QueryFilter
{
    public function name(string $title)
    {
        $this->query->where('name', 'LIKE', '%'.$title.'%');
    }

    public function getFilters(): ?array
    {
        return $this->request->all();
    }
}
