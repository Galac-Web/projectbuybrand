<?php

use Illuminate\Database\Query\Builder;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Builder macro to get table from Model
 * 
 * @link https://twitter.com/WebDevRus/status/1361676810166149122
 */

Builder::macro('model', function (): Builder {
    return class_exists($this->from)
        && ((new $this->from) instanceof \Illuminate\Database\Eloquent\Model)
        && method_exists($this->from, 'getTable')
            ? $this->from((new $this->from)->getTable())
            : $this;
});

/**
 * @link https://scotch.io/tutorials/understanding-and-using-laravel-eloquent-macros
 */
HasMany::macro('one', function (): HasOne {
    return new HasOne(
        $this->getQuery(),
        $this->getParent(),
        $this->foreignKey,
        $this->localKey
    );
});

Blueprint::macro('multilanguage', function (bool $nullable = true) {
    if ($nullable) {
        $this->foreignId('language_id')->nullable()->constrained('languages')->onDelete('cascade');
    } else {
        $this->foreignId('language_id')->constrained('languages')->onDelete('cascade');
    }
});

Blueprint::macro('between', function ($columns, callable $callback, array $postfixes = ['min', 'max'], string $delimeter = '_') {
    if (!is_array($columns)) {
        $columns = [$columns];
    }

    foreach ($columns as $column) {
        foreach ($postfixes as $postfix) {
            $callback(sprintf('%s%s%s', $column, $delimeter, $postfix));
        }
    }
});
