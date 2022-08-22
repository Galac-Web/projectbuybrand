<?php

namespace App\Models\Franchise;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    use HasFactory;

    protected $table = 'franchises_informations';

    protected $fillable = [
        'description', 'content',
    ];
}
