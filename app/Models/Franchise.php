<?php

namespace App\Models;

use App\Filters\Traits\Filterable;
use App\Models\Franchise\Category;
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
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use App\Models\Company;

/**
 * @property object $investments_values
 */
class Franchise extends Model implements HasMedia
{
    use Slug,
        Stats,
        HasFactory,
        HasPresets,
        HasTags,
        HasVideo,
        InteractsWithMedia,
        WithMedia,
        Filterable,
        SoftDeletes;

    protected $table = 'franchises';

    protected $fillable = [
        'owner_id', 'type_id', 'name', 'slug', 'is_active', 'foundation_year', 'start_year',
        // TODO REMOVE
        'region_start',
    ];

    public function getSlugKey(): string {
        return 'name';
    }

    public function owner(): HasOne
    {
        return $this->hasOne(\App\Models\User::class, 'id', 'owner_id');
    }

    public function type(): HasOne
    {
        return $this->hasOne(\App\Models\Franchise\Type::class, 'id', 'type_id');
    }

    public function formats(): HasMany
    {
        return $this->hasMany(\App\Models\Franchise\Format::class, $this->getForeignKey(), 'id');
    }

    public function information(): HasOne
    {
        return $this->hasOne(\App\Models\Franchise\Information::class, $this->getForeignKey(), 'id');
    }

    public function terms()
    {
        return $this->hasOne(\App\Models\Franchise\Terms::class, $this->getForeignKey(), 'id');
    }

    public function supports(): BelongsToMany
    {
        return $this->belongsToMany(
            \App\Models\Franchise\Support::class,
            'franchises_supports_pivot',
            $this->getForeignKey(),
            'franchise_support_id'
        );
    }

    public function advantages(): BelongsToMany
    {
        return $this->belongsToMany(
            \App\Models\Franchise\Advantage::class,
            'franchises_advantages_pivot',
            $this->getForeignKey(),
            'franchise_advantage_id'
        )->withPivot('type', 'label', 'is_main');
    }

    public function badges(): BelongsToMany
    {
        return $this->belongsToMany(
            \App\Models\Franchise\Badge::class,
            'franchises_badges_pivot',
            $this->getForeignKey(),
            'franchise_badge_id'
        );
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(
            \App\Models\Franchise\Category::class,
            'franchises_categories_pivot',
            $this->getForeignKey(),
            'franchise_category_id'
        );
    }

    public function companies(): BelongsToMany
    {
        return $this->belongsToMany(
            \App\Models\Company::class,
            'franchises_companies',
            $this->getForeignKey(),
            'company_id'
        );
    }

    public function points(): HasMany
    {
        return $this->hasMany(
            \App\Models\Franchise\Point::class,
            $this->getForeignKey(),
            'id'
        );
    }

    public function requirements(): HasMany
    {
        return $this->hasMany(
            \App\Models\Franchise\Requirement::class,
            $this->getForeignKey(),
            'id'
        );
    }

    public function faq(): HasMany
    {
        return $this->hasMany(
            \App\Models\Franchise\FAQ::class,
            $this->getForeignKey(),
            'id'
        );
    }

    public function dynamics(): HasMany
    {
        return $this->hasMany(
            \App\Models\Franchise\Dynamic::class,
            $this->getForeignKey(),
            'id'
        );
    }

    public function materials(): BelongsToMany
    {
        return $this->belongsToMany(\App\Models\Media::class, 'media_franchises');
    }

    public function getCategoryAttribute(): ?Category
    {
        return $this->categories->first();
    }

    public function getCompanyAttribute(): ?Company
    {
        return $this->companies->first();
    }

    public function presetPivot(): BelongsToMany
    {
        return $this->belongsToMany(\App\Models\Preset::class, 'franchises_presets');
    }

    public function registerMediaCollections(): void
    {
        $collections = [
            'logo' => [
                'sm' => 100,
                'md' => 250,
                'lg' => 500,
            ],
            'cover' => [
                'sm' => 400,
                'md' => 850,
                'lg' => 1250,
            ],
        ];

        foreach ($collections as $collection => $sizes) {
            $this->addMediaCollection($collection)
                ->registerMediaConversions(function (Media $media) use ($sizes) {
                    foreach ($sizes as $name => $size) {
                        $this->addMediaConversion($name)
                            ->width($size)
                            ->height($size)
                            ->sharpen(5)
                            ->quality(80);
                    }
                });
        }
    }

    public static function getStatusList(): array
    {
        return ['Active', 'Inactive'];
    }
}
