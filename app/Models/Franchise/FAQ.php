<?php

namespace App\Models\Franchise;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FAQ extends Model
{
    use HasFactory;

    protected $table = 'franchises_faq';

    protected $fillable = [
        'question', 'answer', 'is_active',
    ];

    public function scopeActive(Builder $query)
    {
        $query->where('is_active', true);
    }
}
