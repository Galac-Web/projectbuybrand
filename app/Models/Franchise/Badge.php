<?php

namespace App\Models\Franchise;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Badge extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'franchises_badges';

    protected $fillable = [
        'name', 'icon',
    ];
}
