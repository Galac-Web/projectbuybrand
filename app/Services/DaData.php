<?php

namespace App\Services;

use Dadata\DadataClient;
use Dadata\Settings;

/**
 * @see \Dadata\DadataClient
 * @link https://github.com/hflabs/dadata-php
 */
class DaData extends DadataClient
{
    const SUGGESTION_COUNT = Settings::SUGGESTION_COUNT;

    public function __construct($token, $secret)
    {
        parent::__construct($token, $secret);
    }
}
