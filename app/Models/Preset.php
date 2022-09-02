<?php

namespace App\Models;

use App\Filters\Traits\Filterable;
use App\Traits\Slug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Preset extends Model
{
    use Slug,
        HasFactory,
        Filterable;

    protected $table = 'presets';

    protected $fillable = [
        'name', 'slug', 'model',
    ];

    public function getSlugKey(): string
    {
        return 'name';
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(\App\Models\Tag::class, 'presets_tags')->withTimestamps();
    }

    public function franchises(): BelongsToMany
    {
        return $this->belongsToMany(\App\Models\Franchise::class, 'franchises_presets');
    }

    public static function getModules(): array
    {
        $models = get_models_uses_trait(\App\Traits\HasPresets::class);

        return collect($models)->map(fn (string $model) => $model::getModuleName())->toArray();
    }
}
