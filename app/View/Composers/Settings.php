<?php

namespace App\View\Composers;

use App\Models\Setting;
use App\Services\Settings\Service;
use Illuminate\View\View;

class Settings
{
    /** @var \Illuminate\Database\Eloquent\Collection */
    protected $settings;

    public function __construct(Setting $setting)
    {
        $this->settings = Service::create($setting->all());
    }

    public function compose(View $view): void
    {
        $view->with('setting', $this->settings);
    }
}
