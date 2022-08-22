<?php

namespace App\Helpers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Spatie\MediaLibrary\MediaCollections\Models\Media as MediaModel;

class Media
{
    /**
     * @param  \Spatie\MediaLibrary\MediaCollections\Models\Media $media
     * @return null|array
     */
    public static function getThumbs(MediaModel $media): ?array
    {
        $sizes = [];

        foreach ($media->getGeneratedConversions() as $size => $value) {
            $sizes[$size] = $media->model->getFirstMediaUrl($media->collection_name, $size);
        }

        return $sizes;
    }

    /**
     * @param  \Illuminate\Database\Eloquent\Model $model
     * @param  \Illuminate\Http\UploadedFile|string $file 
     * @param  string $collection
     * @param  bool $clearCollection
     * @return void
     */
    public static function toCollection(Model $model, $file, string $collection, bool $clearCollection = true)
    {
        if ($file instanceof UploadedFile) {
            $method = 'addMedia';
        } else if (is_string($file)) {
            $method = 'addMediaFromUrl';
        }

        if ($clearCollection) {
            $model->clearMediaCollection($collection);
        }

        $model->{$method}($file)->toMediaCollection($collection);
    }
}
