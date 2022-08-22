<?php

namespace App\Models\Media;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Type extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'media_types';

    protected $fillable = [
       'name',
    ];

    public function getHumanNameAttribute(): string
    {
        $name = trans_choice(sprintf('_media.types.%s', $this->attributes['name']), 1);

        return Str::ucfirst($name);
    }

    public function humanName(): string
    {
        return Str::ucfirst(trans(sprintf('_media.human.%s', $this->attributes['name'])));
    }

    protected static function newFactory(): \Illuminate\Database\Eloquent\Factories\Factory
    {
        return \Database\Factories\MediaTypeFactory::new();
    }
}
