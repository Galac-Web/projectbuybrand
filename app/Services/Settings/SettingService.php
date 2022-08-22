<?php

namespace App\Services\Settings;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Collection;

class SettingService
{
    /** @var \Illuminate\Database\Eloquent\Collection */
    protected $settings;

    public function __construct(Collection $settings)
    {
        $this->settings = $settings;
    }

    public static function create(Collection $settings): self
    {
        return new static($settings);
    }

    public function get(string $name, ?string $default = null)
    {
        /** @var \App\Models\Setting|null $setting */
        $setting = $this->settings->firstWhere('name', $name);
        $method  = Str::camel($name);

        if (!is_null($setting)) {
            $name = explode('_', $name);
            $methods = array_values(array_filter(get_class_methods($this), fn ($item) => in_array($item, $name)));

            if (count($methods) === 1 && method_exists($this, $methods[0])) {
                $method = $methods[0];
            }

            if (method_exists($this, $method)) {
                return $this->$method($setting);
            }
        }

        return optional($setting)->value ?? $default;
    }

    public function has(string $name): bool
    {
        $setting = $this->settings->firstWhere('name', $name);

        return !is_null(optional($setting)->value);
    }

    public function prefix(): string
    {
        return env('APP_SETTINGS_PREFIX', (string) str(config('app.name'))->lower());
    }
}
