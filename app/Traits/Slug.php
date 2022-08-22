<?php

namespace App\Traits;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/** @mixin \Illuminate\Database\Eloquent\Model */
trait Slug
{
    protected static function bootSlug()
    {
        // TODO Refactoring
        static::saving(function (Model $model) {
            if ($model->getAttribute('slug')) {
                if (
                    $model->where('slug', $model->slug)->count() >= 1 &&
                    $model->where($model->getKeyName(), $model->getKey())->where('slug', $model->slug)->count() === 0
                ) {
                    $model->slug = $model->slug . '-' . 1;
                } else {
                    $model->slug = $model->where('id', $model->id)->where('slug', $model->slug)->count() === 1 ? $model->slug : $model->getSlug($model->slug, $model);
                }
            } else if ($model->{$model->getSlugKey()}) {
                $model->slug = $model->getSlug($model->{$model->getSlugKey()}, $model);
            }
        });
    }

    /**
     * Get Slug Value
     * 
     * @param  string $slug
     * @param  \Illuminate\Database\Eloquent\Model $model
     * @param  string $column
     * @return string
     */
    private function getSlug(string $slug, Model $model, string $column = 'slug'): string
    {
        $slug = Str::slug($slug);

        $count = $this->getSlugCount($slug, $model, $column);

        return !$count ? $slug : $slug . '-' . $count;
    }

    private function getSlugCount(string $slug, Model $model, string $column = 'slug'): int
    {
        return $model->where(fn (Builder $query) => $this->getSlugQuery($query, $slug, $column))->count();
    }

    /**
     * Query For Search Duplicate Items
     * 
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @param  string $slug
     * @param  string $column
     * @return void
     */
    private function getSlugQuery(Builder $query, string $slug, string $column): void
    {
        $query->where($column, '=', $slug)->orWhere($column, 'LIKE', $slug . '-' . '%');
    }

    /**
     * Get the value of the model's route key
     *
     * @return string
     */
    public function getRouteKeyName(): string
    {
        return Route::current()->getAction('namespace') === 'App\Http\Controllers\Dashboard'
            ? 'id'
            : 'slug';
    }

    /**
     * Model Column for Slug
     * 
     * @return string
     */
    abstract function getSlugKey(): string;
}
