<?php

namespace App\Models;

use App\Traits\Multilanguage;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use Multilanguage;

    protected $table = 'settings';

    protected $fillable = [
       'name', 'value',
    ];
}
