<?php

namespace App\Models;

use App\Services\Video\Service;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Video extends Model
{
    use HasFactory;

    protected $table = 'videos';

    protected $fillable = [
        'service', 'value',
    ];

    public function model(): MorphTo
    {
        return $this->morphTo();
    }

    public function getDriverAttribute(): \App\Services\Video\Video
    {
        return Service::getDriver($this->service, $this->value);
    }
}
