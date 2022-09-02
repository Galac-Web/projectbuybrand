<?php

namespace App\Models\Franchise;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advantage extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'franchises_advantages';

    protected $fillable = [
        'name',
    ];
}
