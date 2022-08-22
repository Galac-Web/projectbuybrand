<?php

namespace App\Models\Franchise\Support;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'franchises_supports_groups';

    protected $fillable = [
        'name',
    ];
}
