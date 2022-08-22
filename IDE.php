<?php

/**
 * @see app/Macros/macros.php
 */

namespace Illuminate\Database\Schema {
    abstract class Blueprint {
        /**
         * @var string|array $columns
         * @var callable $callback
         * @var string[] $postfixes
         * @var string $delimeter
         * @return void
         */
        abstract public function between($columns, callable $callback, array $postfixes = ['min', 'max'], string $delimeter = '_');

        /**
         * Language Column
         * 
         * @param  bool $nullable
         * @return void
         */
        abstract public function multilanguage(bool $nullable = true);
    }
}

/**
 * @see app/Traits/Macros/RouteMacro.php
 */

namespace Illuminate\Support\Facades {
    abstract class Route {
        /**
         * Grouping Route
         * 
         * @param  string $prefix
         * @param  callable $group
         * @param  null|string $name
         * @return void
         */
        abstract public static function grouping(string $prefix, callable $group, ?string $name = null): void;
    }
}

namespace Illuminate\Contracts\Auth {
    interface Guard {
        /**
         * @return \App\Models\User|null
         */
        public function user();
    }
}

namespace App\Models {
    /**
     * @property \App\Services\Video\Video $driver
     */
    class Video {}
}