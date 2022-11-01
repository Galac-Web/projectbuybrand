<?php

namespace App\Models\Franchise;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surveyor extends Model
{
    use HasFactory;

    protected $table = 'surveyor';

    protected $fillable = [
        'informational','franchise_id',
    ];

}
