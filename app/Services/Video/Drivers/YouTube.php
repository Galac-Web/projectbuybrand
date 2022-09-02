<?php

namespace App\Services\Video\Drivers;

use App\Services\Video\Video;

class YouTube extends Video
{
    public function getEmbed(): string
    {
        return sprintf('https://www.youtube.com/embed/%s', $this->getId());
    }

    public function getId(): string
    {
        preg_match('/(www\.youtube\.com\/watch\?v=([\w\d_-]+)|youtu.be\/([\w\d_-]+))/', $this->value, $value);

        return $value[array_key_last($value)];
    }
}
