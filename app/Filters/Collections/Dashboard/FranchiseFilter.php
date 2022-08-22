<?php

namespace App\Filters\Collections\Dashboard;

use App\Filters\QueryFilter;
use App\Models\Franchise;

class FranchiseFilter extends QueryFilter
{
    public function name(string $name)
    {
        $this->query->where('name', 'LIKE', '%'.$name.'%');
    }

    public function status(string $status)
    {
        $status = ucfirst($status);
        $statuses = status(Franchise::getStatusList());

        $this->query->where('is_active', array_key_exists($status, $statuses) ? $statuses[$status] : false);
    }

    public function getFilters(): ?array
    {
        return $this->request->all();
    }
}
