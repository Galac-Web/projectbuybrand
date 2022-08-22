<?php

namespace App\Models;

use App\Filters\Traits\Filterable;
use App\Traits\HasPresets;
use App\Traits\HasTags;
use App\Traits\HasVideo;
use App\Traits\Slug;
use App\Traits\Stats;
use App\Traits\WithMedia;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Media extends Model implements HasMedia
{
    use Slug,
        Stats,
        HasTags,
        HasPresets,
        HasVideo,
        WithMedia,
        Filterable,
        HasFactory,
        InteractsWithMedia;

    protected $table = 'media';

    protected $fillable = [
       'type_id', 'slug', 'title', 'subtitle', 'content', 'is_active', 'created_at',
    ];

    public function getSlugKey(): string {
        return 'title';
    }

    public function type(): HasOne
    {
        return $this->hasOne(\App\Models\Media\Type::class, 'id', 'type_id');
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(\App\Models\Tag::class, 'media_tags')->using(\App\Models\Media\Tag::class)->withTimestamps();
    }

    public function persons(): BelongsToMany
    {
        return $this->belongsToMany(\App\Models\Person::class, 'media_persons')->using(\App\Models\Media\Person::class)->withTimestamps();
    }

    public function franchises(): BelongsToMany
    {
        return $this->belongsToMany(\App\Models\Franchise::class, 'media_franchises');
    }

    public function related(): BelongsToMany
    {
        return $this->belongsToMany(self::class, 'media_related', 'media_id', 'related_id');
    }

    public function scopeWhereType(Builder $query, string $type)
    {
        $query->whereHas('type', fn (Builder $query) => $query->where('name', $type));
    }

    public function scopeLifehacks(Builder $query, bool $only = true)
    {
        $query->whereHas('type', fn (Builder $query) => $query->where('name', $only ? '=' : '!=', 'lifehack'));
    }

    public function getPreviewAttribute(): string
    {
        return $this->getFirstMediaUrl('media') ?? media();
    }

    public function getFirstTagAttribute(): ?\App\Models\Tag
    {
        return $this->tags->first() ?? null;
    }

    public function getPresetsAttribute(): \Illuminate\Support\Collection
    {
        return $this->tags->load('preset')->pluck('preset')->filter();
    }

    public function scopeGetPresets(Builder $query): \Illuminate\Support\Collection
    {
        $preset = 'tags.preset';

        return $query->with($preset)->whereHas($preset)->get()
            ->map(fn (Media $media) => $media->tags->map(fn (Tag $tag) => $tag->presets->where('module', 'media')))
            ->flatten()
            ->unique('id');
    }
}
