<?php

namespace App\Helpers;

use Illuminate\Support\Str;

class Phone
{
    /** @var string */
    public $phone;

    public function __construct(string $phone)
    {
        $this->phone = $phone;
    }

    public function clear(): self
    {
        $this->phone = preg_replace('/\D+/', '', $this->phone);

        return $this;
    }

    public function mask(string $mask = '+X XXX XXX XX XX', string $symbol = 'X'): self
    {
        for ($i = 0; $i < strlen($this->phone); $i++) {
            $mask = Str::replaceFirst($symbol, $this->phone[$i], $mask);
        }

        $this->phone = $mask;

        return $this;
    }

    public function tel(): string
    {
        return sprintf('tel:+%s', $this->clear()->get());
    }

    public function get(): string
    {
        return $this->phone;
    }
}
