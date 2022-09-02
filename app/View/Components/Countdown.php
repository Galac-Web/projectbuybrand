<?php

namespace App\View\Components;

use Carbon\Carbon;
use Illuminate\View\Component;

class Countdown extends Component
{
    public $date;
    public $default;

    public function __construct(Carbon $date, ?string $default = null)
    {
        $this->date = $date->format('Y-m-d H:i:s P');
        $this->default = $default;
    }

    public function render(): string
    {
        return <<<'blade'
            <div {{ $attributes }} data-countdown-time="{{ $date }}">{{ $default }}</div>
        blade;
    }
}
