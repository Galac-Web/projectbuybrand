<?php

namespace App\Filters;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use App\Filters\Contracts\QueryFilterContract;

class QueryFilter implements QueryFilterContract
{
    /** @var \Illuminate\Http\Request */
    public $request;

    /** @var \Illuminate\Database\Eloquent\Builder */
    public $query;

    /** @var array|null */
    public $filters;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function apply(Builder $query): Builder
    {
        $this->query = $query;
        $this->filters = $this->getFilters();

        if (!is_null($this->filters)) {
            foreach ($this->filters as $filter => $value) {
                $method = Str::camel($filter);

                if (method_exists($this, $method) && !empty($value)) {
                    $this->$method($value);
                }
            }
        }

        return $this->query;
    }

    public function getFilters(): ?array
    {
        return $this->request->input('filter');
    }
}
