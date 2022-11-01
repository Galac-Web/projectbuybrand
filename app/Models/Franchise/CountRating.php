<?php

namespace App\Models\Franchise;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountRating extends Model
{
    use HasFactory;

    protected $table = 'franchises_coutnrating';

    protected $fillable = [
        'startData', 'initData','investition','payback','region','couttokinreg','couttokin','franchise_id',
    ];

}
