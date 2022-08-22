<?php

namespace App\Models\Franchise;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Support extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'franchises_supports';

    protected $fillable = [
        'name', 'sort',
    ];

    public function group(): HasOne
    {
        return $this->hasOne(\App\Models\Franchise\Support\Group::class, 'id', 'group_id');
    }
}
