<?php

namespace App\View\Components\Dashboard;

use Illuminate\Support\Str;
use Illuminate\View\Component;

class Menu extends Component
{
    public $items;

    public function __construct()
    {
        $this->items = [
            [
                'text' => trans('Dashboard'),
                'icon' => 'fas fa-fw fa-tachometer-alt',
                'route' => 'dashboard.main',
            ],
            [],
            [
                'text' => trans('Users'),
                'icon' => 'fas fa-fw fa-users',
                'items' => [
                    [
                        'text' => trans('Users'),
                        'route' => 'dashboard.users.index',
                    ],
                ],
            ],
            [
                'text' => trans('Franchises'),
                'icon' => 'fas fa-fw fa-file-contract',
                'items' => [
                    [
                        'text' => trans('Franchises'),
                        'route' => 'dashboard.franchises.index',
                    ],
                    [
                        'text' => trans('Categories'),
                        'route' => 'dashboard.franchises.categories.index',
                    ],
                    // [
                    //     'text' => trans('Advantages'),
                    //     'route' => 'dashboard.franchises.advantages.index',
                    // ],
                    [
                        'text' => trans('Partner support'),
                        'route' => 'dashboard.franchises.supports.index',
                    ],
                    [
                        'text' => trans('Franchises Types'),
                        'route' => 'dashboard.franchises.types.index',
                    ],
                    [
                        'text' => trans('Badges'),
                        'route' => 'dashboard.franchises.badges.index',
                    ],
                ],
            ],
            [
                'text' => trans('Media'),
                'icon' => 'fas fa-fw fa-photo-video',
                'route' => 'dashboard.media.index',
            ],
            [
                'text' => trans('Presets'),
                'icon' => 'fas fa-fw fa-stream',
                'route' => 'dashboard.presets.index',
            ],
            [
                'text' => trans('Persons'),
                'icon' => 'fas fa-fw fa-user-tie',
                'route' => 'dashboard.persons.index',
            ],
        ];
    }

    public function render()
    {
        return view('components.dashboard.menu', [
            'items' => $this->items,
        ]);
    }
}
