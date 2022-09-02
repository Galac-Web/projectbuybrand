<?php

namespace App\Models;

use App\Traits\Slug;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tag extends Model
{
    use Slug,
        HasFactory;

    protected $table = 'tags';

    protected $fillable = [
        'model', 'name', 'slug',
    ];

    public function getSlugKey(): string
    {
        return 'name';
    }

    public function preset()
    {
        return $this->belongsToMany(\App\Models\Preset::class, 'presets_tags')->withTimestamps();
    }

    public function getPresetAttribute(): ?\App\Models\Preset
    {
        return $this->relations['preset']->first();
    }

    public function getPresetsAttribute(): \Illuminate\Database\Eloquent\Collection
    {
        return $this->relations['preset'];
    }

    public function media()
    {
        return $this->belongsToMany(\App\Models\Media::class, 'media_tags')->using(\App\Models\Media\Tag::class)->withTimestamps();
    }

    public function scopeMediaType(Builder $query, string $type, bool $operator = true)
    {
        $query->whereHas('media.type', fn (Builder $query) => $query->where('name', $operator ? '=' : '!=', $type));
    }
}
