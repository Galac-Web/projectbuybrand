<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Stats extends Model
{
    public $timestamps = false;

    protected $table = 'stats';

    protected $fillable = [
        'views',
    ];

    public function model(): MorphTo
    {
        return $this->morphTo();
    }
}
