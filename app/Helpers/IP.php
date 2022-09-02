<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;

class IP
{
    /** @var string */
    public $ip;

    public function __construct()
    {
        $this->get();
    }

    public function __toString(): string
    {
        return $this->ip;
    }

    public function get(): self
    {
        $this->ip = request()->ip();

        try {
            if ($this->ip === '127.0.0.1') {
                $this->ip = filter_var(Http::get('https://api.ipify.org')->body(), FILTER_VALIDATE_IP) ?? $this->ip;
            }
        } finally {
            return $this;
        }
    }

    public function getLocation(?string $ip = null): object
    {
        if (is_null($ip)) {
            $ip = $this->ip;
        }

        $query = http_build_query([
            'access_key' => env('IPSTACK_API_KEY'),
            'language'   => lang(),
        ]);

        $json = Http::get(sprintf('http://api.ipstack.com/%s?%s', $ip, $query))->body();
        $response = json_decode($json);

        if (!isset($response->city)) {
            /** @var \App\Services\DaData @dadata */
            $dadata = app(\App\Services\DaData::class);

            $response = json_decode(json_encode($dadata->iplocate($ip)['data']));
        }

        return $response;
    }
}