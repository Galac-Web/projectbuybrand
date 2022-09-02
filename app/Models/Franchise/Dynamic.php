<?php

namespace App\Models\Franchise;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dynamic extends Model
{
    use HasFactory;

    protected $table = 'franchises_dynamics';

    protected $fillable = [
        'franchise_id', 'year', 'count',
    ];
}
