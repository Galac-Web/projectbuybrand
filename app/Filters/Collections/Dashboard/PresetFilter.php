<?php

namespace App\Filters\Collections\Dashboard;

use App\Filters\QueryFilter;

class PresetFilter extends QueryFilter
{
    public function name(string $title)
    {
        $this->query->where('name', 'LIKE', '%'.$title.'%');
    }

    public function module(string $module)
    {
        $this->query->where('module', $module);
    }

    public function getFilters(): ?array
    {
        return $this->request->all();
    }
}
