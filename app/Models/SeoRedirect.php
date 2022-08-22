<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeoRedirect extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'seo_redirects';

    protected $fillable = [
        'old', 'newable_model', 'newable_id',
    ];
}
