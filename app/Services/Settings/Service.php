<?php

namespace App\Services\Settings;

use App\Models\Setting;

class Service extends SettingService
{
    public function phone(Setting $setting): \App\Helpers\Phone
    {
        return new \App\Helpers\Phone($setting->value);
    }
}
