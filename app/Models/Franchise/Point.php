<?php

namespace App\Models\Franchise;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Point extends Model
{
    use HasFactory;

    protected $table = 'franchises_points';

    protected $fillable = [
        'country_id', 'city', 'region', 'own_points', 'franchise_points', 'repeat_points', 'geo_lat', 'geo_lon',
    ];

    public function country(): HasOne
    {
        return $this->hasOne(\App\Models\Country::class, 'id', 'country_id');
    }
}
