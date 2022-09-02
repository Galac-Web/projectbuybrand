<?php

namespace App\Services\Video;

use App\Services\Video\Video;
use Illuminate\Database\Eloquent\Model;

class Service
{
    protected static $drivers = [
        'youtube' => \App\Services\Video\Drivers\YouTube::class,
    ];

    public static function getDriver(string $driver, string $value): Video
    {
        if (!in_array($driver, self::$drivers)) {
            return app(self::$drivers[$driver], ['value' => $value]);
        }
    }

    public static function getDrivers(): array
    {
        return self::$drivers;
    }

    public function save(Model $model, array $video): void
    {
        foreach ($video as $service => $value) {
            if (is_null($value)) {
                $check = $model->video->firstWhere('service', $service);

                if (!is_null($check)) {
                    $check->delete();
                }

                continue;
            }

            $model->video()->updateOrCreate(
                ['service' => $service],
                ['value' => $value],
            );
        }
    }
}
