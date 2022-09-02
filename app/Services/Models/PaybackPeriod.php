<?php

namespace App\Services\Models;

use Illuminate\Support\Collection;

class PaybackPeriod
{
    /** @var \Illuminate\Support\Collection */
    private $list;

    public function __construct()
    {
        $this->list = $this->toCollection();
    }

    /**
     * Initialization this class from static method
     * 
     * @return \App\Services\Models\PaybackPeriod
     */
    public static function init(): self
    {
        return new static();
    }

    /**
     * Get payback period list or find by ID
     * 
     * @param  null|int $id
     * @return \Illuminate\Support\Collection|null|object
     */
    public function get(?int $id = null)
    {
        return is_null($id)
            ? $this->list
            : $this->find($id);
    }

    /**
     * Find payback period by ID
     * 
     * @param  int $id
     * @return null|object
     */
    public function find(int $id): ?object
    {
        return $this->list->firstWhere('id', $id) ?? null;
    }

    /**
     * @return array
     */
    public function list(): array
    {
        return [
            'от 3 до 6 месяцев',
            'от 6 месяцев до года',
            'от 8 месяцев до года',
            'от 10 месяцев до года',
            '1 год',
            'от 12 до 18 месяцев',
            '2 года',
            '3 года',
            'более 3 лет',
        ];
    }

    /**
     * Convert a payback period list from array to collection
     * 
     * @return \Illuminate\Support\Collection
     */
    private function toCollection(): Collection
    {
        return collect($this->list())->map(fn ($name, $i) => (object) [
            'id' => $i + 1,
            'name' => $name,
        ]);
    }
}
