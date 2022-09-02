<?php

namespace App\Models\Franchise;

use App\Traits\Slug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use Slug,
        HasFactory;

    protected $table = 'franchises_categories';

    protected $fillable = [
        'name', 'parent_id', 'description', 'slug', 'sort',
    ];

    public function getSlugKey(): string {
        return 'name';
    }

    public function childrens()
    {
        return $this->hasMany(self::class, 'parent_id', 'id');
    }
}
