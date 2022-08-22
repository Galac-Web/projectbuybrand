<?php

namespace App\Models\Media;

use App\Traits\Slug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use Slug,
        HasFactory;

    protected $table = 'franchises_categories';

    protected $fillable = [
        'name', 'description', 'slug',
    ];

    public function getSlugKey(): string {
        return 'name';
    }
}
