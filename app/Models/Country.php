<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Country extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'countries';

    protected $fillable = [
        'name', 'capital', 'geo_lat', 'geo_lon',
    ];

    public function group(): HasOne
    {
        return $this->hasOne(\App\Models\Country\Group::class, 'id', 'group_id');
    }
}
