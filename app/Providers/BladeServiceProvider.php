<?php

namespace App\Providers;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BladeServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        self::form();
        self::route();
        self::phone();
        self::price();
        self::setting();
    }

    private static function route(): void
    {
        Blade::directive('route', fn ($arguments) => "<?php echo route_relative({$arguments}); ?>");
    }

    private static function phone(): void
    {
        Blade::directive('phone', fn ($phone) => "<?php echo phone($phone)->mask()->get(); ?>");
    }

    private static function price(): void
    {
        $symbol = env('RUB_SYMBOL', '<span class="currency">&#8381;</span>');

        Blade::directive('price', function ($price) use ($symbol) {
            $data = explode(', ', $price);
            $price = $data[0];

            if (isset($data[1])) {
                $symbol = (string) Str::of($data[1])->trim()->trim('\'')->trim('"')->prepend(' ');
            }

            return "<?php echo money($price) . '{$symbol}'; ?>";
        });
    }

    private static function setting(): void
    {
        Blade::directive('setting', fn ($arguments) => "<?php echo \$setting->get($arguments) ?>");
    }

    private static function form(): void
    {
        foreach (['checked', 'selected'] as $type) {
            Blade::directive($type, fn ($arguments) => "<?php echo {$arguments} ? '{$type}' : ''; ?>");
        }
    }
}
