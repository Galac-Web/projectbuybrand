<?php

namespace App\Traits;

use App\Models\Preset;
use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/** @mixin \Illuminate\Database\Eloquent\Model */
trait HasPresets
{
    /**
     * Get query for presets
     * 
     * @param  null|string $module Module name
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public static function presets(?string $module = null): Builder
    {
        static::getModuleName($module);

        return Preset::where('module', $module);
    }

    /**
     * Get materials by presets
     * 
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @param  string $slug Preset slug
     * @param  null|string $module Module name
     * @return void
     */
    public function scopePreset(Builder $query, string $slug, string $relationship = 'tags.preset', ?string $module = null): void
    {
        static::getModuleName($module);

        $query->whereHas(Str::camel($relationship), fn (Builder $query) => $query->where('module', $module)->where('slug', $slug));
    }

    /**
     * Module name by self class
     * 
     * @param  null|string $module
     * @return void
     */
    public static function getModuleName(?string &$module = null): ?string
    {
        if (is_null($module)) {
            $module = Str::lower(basename(self::class));
        }

        return $module ?? null;
    }

    public static function presetExists(string $preset, ?string $module = null): bool
    {
        return self::presets($module)->where('slug', $preset)->exists();
    }
}
