<?php

namespace App\Services\Video;

abstract class Video
{
    /** @var string */
    public $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    abstract public function getId(): string;
    abstract public function getEmbed(): string;
}
