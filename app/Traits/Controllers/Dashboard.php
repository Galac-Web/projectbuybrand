<?php

namespace App\Traits\Controllers;

use App\Helpers\Dashboard as Helper;
use App\Helpers\Media;
use App\Helpers\Pivot;
use App\Services\Video\Service;

/** @mixin \App\Http\Controllers\Controller */
trait Dashboard
{
    /** @var \App\Helpers\Pivot */
    protected $pivot;

    /** @var \App\Services\Video\Service */
    protected $video;

    /** @var \App\Helpers\Dashboard */
    protected $dashboard;

    /** @var \App\Helpers\Media */
    protected $medialibrary;

    public function __construct(
        Helper $dashboard,
        Media $medialibrary,
        Pivot $pivot,
        Service $video
    )
    {
        $this->pivot = $pivot;
        $this->video = $video;
        $this->dashboard = $dashboard;
        $this->medialibrary = $medialibrary;
    }
}
