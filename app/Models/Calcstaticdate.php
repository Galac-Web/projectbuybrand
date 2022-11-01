<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calcstaticdate extends Model
{
    use HasFactory;

    protected $table = 'calcstaticdate';

    protected $fillable = [
        'name', 'element_D', 'element_e', 'element_a', 'element_b'
    ];
}
