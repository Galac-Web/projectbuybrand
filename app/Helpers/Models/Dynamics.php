<?php

namespace App\Helpers\Models;

class Dynamics
{
    public function getHighchartsData(int $min, int $max, callable $callback): array
    {
        $result = [];

        for ($i = $min; $i <= $max; $i++) {
            $result[] = $callback($i);
        }

        return $result;
    }
}
