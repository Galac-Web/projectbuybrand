<?php

namespace App\Models\Franchise;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\AsCollection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Requirement extends Model implements HasMedia
{
    use HasFactory,
        InteractsWithMedia;

    protected $table = 'franchises_requirements';

    protected $fillable = [
        'name', 'items', 'button_caption', 'sort',
    ];

    protected $casts = [
        'items' => AsCollection::class,
    ];

    public function scopeHasNotEmpty(Builder $query)
    {
        $query->whereNotNull('items')->orWhereHas('media');
    }
}
