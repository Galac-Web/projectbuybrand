<?php

namespace App\Extensions\Spatie\MediaLibrary;

use Spatie\MediaLibrary\Conversions\Conversion;
use Spatie\MediaLibrary\Support\FileNamer\FileNamer;

class CustomFileNamer extends FileNamer
{
    public function conversionFileName(string $fileName, Conversion $conversion): string
    {
        $fileName = pathinfo($fileName, PATHINFO_FILENAME);

        return sprintf('%s%s%s', $fileName, env('MEDIA_CONVERSION_SEPARATOR', '_'), $conversion->getName());
    }

    public function responsiveFileName(string $fileName): string
    {
        return pathinfo($fileName, PATHINFO_FILENAME);
    }
}
