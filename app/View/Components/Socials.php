<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Socials extends Component
{
    public $horizontal;

    public $route;

    public $socials = [
        'vk'
    ];

    public function __construct(bool $horizontal = true, ?string $route = null)
    {
        $this->horizontal = $horizontal;

        if (is_null($route)) {
            $this->route = 'auth.social';
        }
    }

    public function render()
    {
        return view('components.socials');
    }
}
