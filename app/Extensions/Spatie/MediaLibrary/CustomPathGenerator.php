<?php

namespace App\Extensions\Spatie\MediaLibrary;

use Illuminate\Support\Str;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\Support\PathGenerator\PathGenerator;
use Spatie\MediaLibrary\Support\PathGenerator\DefaultPathGenerator;

class CustomPathGenerator extends DefaultPathGenerator implements PathGenerator
{
    public function getPath(Media $media): string
    {
        if (!empty($media->collection_name) && $media->collection_name !== 'default') {
            return $this->getDirectory(sprintf('%s/%s', $media->collection_name, $this->getBaseName($media)));
        }

        return $this->getDirectory($this->getBaseName($media));
    }

    public function getPathForConversions(Media $media): string
    {
        return $this->getDirectory($this->getPath($media) . 's/');
    }

    protected function getBasePath(Media $media): string
    {
        return '';
    }

    private function getBaseName(Media $media): string
    {
        return md5(sprintf('%s_%s', $media->model->id, $media->getKey()));
    }

    private function getDirectory(string $path): string
    {
        return Str::finish($path, '/');
    }
}
