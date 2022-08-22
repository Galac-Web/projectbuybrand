<?php

namespace App\Filters\Collections\Main;

use App\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Builder;

class FranchiseCatalogFilter extends QueryFilter
{
    public function category(int $id)
    {
        // 
    }

    public function subcategory(int $id)
    {
        // 
    }

    public function investments(string $investments)
    {
        $investments = $this->getIntegerRangeValues($investments);

        $this->query->whereHas('terms', function (Builder $query) use ($investments) {
            $query->where('investments_min', '>=', $investments[0])->where('investments_max', '<=', $investments[1]);
        });
    }

    public function payback(string $payback)
    {
        $payback = $this->getIntegerRangeValues($payback);

        $this->query->whereHas('terms', function (Builder $query) use ($payback) {
            $query->where('payback_min', '>=', $payback[0])->where('payback_max', '<=', $payback[1]);
        });
    }

    public function getInvestments(): array
    {
        return [
            [0, 500000],
            [500000, 1000000],
            [1000000, 3000000],
            [3000000, 6000000],
            [6000000, 9000000],
            [9000000, 12000000],
            [12000000, 15000000],
            [15000000, 30000000],
        ];
    }
    
    public function getPaybacks()
    {
        return [
            [0, 3],
            [3, 6],
            [6, 12],
            [12, 18],
        ];
    }

    public function getFilters(): ?array
    {
        return $this->request->filter;
    }

    private function getIntegerRangeValues(string $value)
    {
        return array_map(fn (string $item) => (int) $item, explode('-', $value));
    }
}
