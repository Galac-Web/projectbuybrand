<?php

namespace App\Models;

use App\Filters\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory,
        Filterable;

    protected $table = 'persons';

    protected $fillable = [
        'name',
    ];
}
