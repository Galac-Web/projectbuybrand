<?php

namespace App\Traits;

use App\Models\Video;
use App\Services\Video\Service;
use Illuminate\Database\Eloquent\Relations\MorphMany;

/**
 * @mixin \Illuminate\Database\Eloquent\Model
 * 
 * @property \Illuminate\Database\Eloquent\Collection $video
 */
trait HasVideo
{
    public function video(): MorphMany
    {
        return $this->morphMany(Video::class, 'model');
    }

    public function getVideo(?string $service = null): ?\App\Services\Video\Video
    {
        if (is_null($service)) {
            $service = array_key_first(Service::getDrivers());
        }

        return optional($this->video->firstWhere('service', $service))->driver;
    }
}
