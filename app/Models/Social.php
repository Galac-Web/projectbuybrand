<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    protected $table = 'users_socials';
    
    protected $fillable = [
        'email', 'social_id', 'driver'
    ];
}
