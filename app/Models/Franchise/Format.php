<?php

namespace App\Models\Franchise;

use App\Casts\Between;
use App\Services\Models\PaybackPeriod;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 * @property \App\Models\User $creator
 */
class Format extends Model implements HasMedia
{
    use HasFactory,
        SoftDeletes,
        InteractsWithMedia;

    protected $table = 'franchises_formats';

    protected $fillable = [
        'created_by', 'name', 'description', 'investments', 'payback_period', 'floor_space', 'staff', 'is_active',
    ];

    protected $casts = [
        'investments' => Between::class,
        'is_active' => 'boolean',
    ];

    public function creator(): HasOne
    {
        return $this->hasOne(\App\Models\User::class, 'id', 'created_by');
    }

    public function getPaybackPeriodAttribute(): ?object
    {
        return PaybackPeriod::init()->find($this->attributes['payback_period']);
    }

    public function registerMediaCollections(): void
    {
        $sizes = [
            'sm' => 400,
            'md' => 850,
            'lg' => 1000,
        ];

        $this->addMediaCollection('preview')
            ->singleFile()
            ->registerMediaConversions(function (Media $media) use ($sizes) {
                foreach ($sizes as $name => $size) {
                    $this->addMediaConversion($name)
                        ->width($size)
                        ->height($size)
                        ->sharpen(5);
                }
            });
    }
}
