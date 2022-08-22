<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Stringable;
use Illuminate\Support\Facades\Route;

if (!function_exists('route_relative') && function_exists('route')) {
    /**
     * Route generation relative URL
     *
     * @param array|string $name
     * @param mixed $parameters
     * @param boolean $absolute
     * @return string
     */
    function route_relative($name, $parameters = [], bool $absolute = false): string {
        return route($name, $parameters, $absolute);
    };
}

if (!function_exists('route_current')) {
    function route_current(?callable $callback = null) {
        return is_null($callback)
            ? Route::current()
            : $callback(Route::current());
    }
}

if (!function_exists('has_controller')) {
    function has_controller(string $controller): bool {
        $current = basename(get_class(\Illuminate\Support\Facades\Route::current()->getController()));

        return $current === $controller;
    }
}

if (!function_exists('get_relation_table')) {
    function get_relation_table(string $model, string $relationship) {
        return (new $model())->$relationship()->getRelated()->getTable();
    }
}

if (!function_exists('directory')) {
    /**
     * Directory path with separator on operating system
     * 
     * @param string $directory
     * @return string
     */
    function directory(string $directory): string {
        return str_replace(['\\', '/'], DIRECTORY_SEPARATOR, $directory);
    }
}

if (!function_exists('media')) {
    /**
     * Get blank image
     * 
     * @return string
     */
    function media(): string {
        return sprintf(
            'data:image/svg+xml;base64,%s',
            'PHN2ZyB2ZXJzaW9uPSIxLjEiIGlkPSJMYXllcl8xIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB4PSIwcHgiIHk9IjBweCINCgkgd2lkdGg9IjYyMS4xMjdweCIgaGVpZ2h0PSI2MjEuMTI3cHgiIHZpZXdCb3g9Ijg5LjQzNyAtMTAuNTYzIDYyMS4xMjcgNjIxLjEyNyINCgkgZW5hYmxlLWJhY2tncm91bmQ9Im5ldyA4OS40MzcgLTEwLjU2MyA2MjEuMTI3IDYyMS4xMjciIHhtbDpzcGFjZT0icHJlc2VydmUiPg0KCTxyZWN0IHg9IjEwOS40MzciIHk9IjEwIiBmaWxsPSIjREFEQkRDIiB3aWR0aD0iNTgxLjEyNyIgaGVpZ2h0PSI1ODAuNTYyIi8+DQoJPGcgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoLTUuMDAwMDAwLCAtNS4wMDAwMDApIj4NCgkJPHBhdGggZmlsbD0iI0YzRjRGNCIgZD0iTTk0LjQzNy01LjU2M2g2MjEuMTI3djYyMS4xMjdIOTQuNDM3Vi01LjU2M0w5NC40MzctNS41NjN6IE00NzUuMzQ2LDI1NC4wNTdsLTguMTg1LTQ3LjgzMUwyOTkuNjMsMjM1LjY0MQ0KCQkJbDI0LjU1MywxMzkuOTA4bDE2LjYyNy0yLjgxM3YxMi4wMjFoMTcwLjA4N1YyNTQuMDU3SDQ3NS4zNDZMNDc1LjM0NiwyNTQuMDU3eiBNMzQwLjgxMSwzNTguNjY2bC01LjM3MSwxLjAyMWwtMTkuOTUtMTEyLjc5NA0KCQkJbDE0MC40MTktMjQuODEybDUuNjI4LDMxLjk3NEgzNDAuODExVjM1OC42NjZMMzQwLjgxMSwzNTguNjY2TDM0MC44MTEsMzU4LjY2NnogTTQ5Ny4wODcsMzcwLjk0M0gzNTQuNjIxVjI2Ny44NjhoMTQyLjQ2NlYzNzAuOTQzDQoJCQlMNDk3LjA4NywzNzAuOTQzeiBNMzYzLjgyOCwyNzcuMDc1djc2LjQ3NGwyOC45MDMtMTkuMTgxbDE3LjkwMywxMS4yNTJsNDMuNDgtNDcuODI5bDUuNjI5LDIuMzAxbDI4LjEzNCwzMi40ODV2LTU1LjUwMkgzNjMuODI4DQoJCQlMMzYzLjgyOCwyNzcuMDc1TDM2My44MjgsMjc3LjA3NXogTTM5MS40NTEsMzEwLjA2OGMtNi42NDgsMC0xMi4yNzYtNS42MjYtMTIuMjc2LTEyLjI3N2MwLTYuNjUsNS42MjgtMTIuMjc5LDEyLjI3Ni0xMi4yNzkNCgkJCWM2LjY1MSwwLDEyLjI3Niw1LjYyNiwxMi4yNzYsMTIuMjc5QzQwMy43MjksMzA0LjQ0MiwzOTguMTAyLDMxMC4wNjgsMzkxLjQ1MSwzMTAuMDY4TDM5MS40NTEsMzEwLjA2OEwzOTEuNDUxLDMxMC4wNjh6Ii8+DQoJPC9nPg0KPC9zdmc+DQo='
        );
    }
}

if (!function_exists('carbon')) {
    /**
     * Helper for returning Carbon
     * 
     * @return \Carbon\Carbon
     */
    function carbon($time = null, $tz = null): \Carbon\Carbon {
        return new \Carbon\Carbon($time, $tz);
    }
}

if (!function_exists('checkbox')) {
    /**
     * Converting checkbox value to boolean
     * 
     * @param string|null $value
     * @return bool
     */
    function checkbox(?string $value = null): bool {
        return $value ? true : false;
    }
}

if (!function_exists('phone')) {
    /**
     * Helper for returning Phone class
     * 
     * @param  string $phone
     * @return \App\Helpers\Phone
     */
    function phone(string $phone): \App\Helpers\Phone {
        return new \App\Helpers\Phone($phone);
    }
}

if (!function_exists('lang')) {
    /**
     * Returning short language name
     * 
     * @return string
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    function lang(): string {
        return \App\Services\Multilanguage::current();
    }
}

if (!function_exists('multilanguage')) {
    function multilanguage(): \App\Services\Multilanguage {
        return new \App\Services\Multilanguage;
    }
}

if (!function_exists('ip')) {
    /**
     * Helper for returning IP class
     * 
     * @return \App\Helpers\IP
     */
    function ip(): \App\Helpers\IP {
        return new \App\Helpers\IP();
    }
}

if (!function_exists('str')) {
    /**
     * @param  null|string $str
     * @return \Illuminate\Support\Str|\Illuminate\Support\Stringable
     */
    function str(?string $str = null) {
        return is_null($str)
            ? new Str
            : new Stringable($str);
    }
}

if (!function_exists('can')) {
    /**
     * @param  string $permissions
     * @return string
     */
    function can(...$permissions): string {
        return sprintf('permission:%s', implode('|', $permissions));
    }
}

if (!function_exists('storage_url')) {
    /**
     * Generate URL to Storage File
     * 
     * @param  string $path
     * @param  string $storage
     * @return string
     */
    function storage_url(string $path, string $storage = 'public'): string {
        $url = (string) Str::of(config("filesystems.disks.$storage.url"))->start('/')->finish('/');
        $path = (string) Str::of($path)->start('/');

        return $url . $path;
    }
}

if (!function_exists('get_models_uses_trait')) {
    function get_models_uses_trait(string $trait, string $directory = 'Models', string $namespace = 'App\\Models\\'): array {
        $output = [];
        $models = scandir(app_path($directory));

        foreach ($models as $model) {
            if (in_array($model, ['.', '..'])) continue;

            if (is_file(app_path(directory("$directory/$model")))) {
                $class = (string) str($model)->prepend($namespace)->trim('.php');

                if (array_key_exists($trait, trait_uses_recursive($class))) {
                    $output[] = $class;
                }
            }
        }

        return $output;
    }
}

if (!function_exists('col')) {
    function col(int $a, int $b, string $col = 'col-md-') {
        return $col . (request()->ajax() ? $b : $a);
    }
}

if (!function_exists('money')) {
    function money(
        ?float $num = 0,
        int $decimals = 0,
        ?string $decimal_separator = '.',
        ?string $thousands_separator = ' '
    ): string {
        return number_format($num, $decimals, $decimal_separator, $thousands_separator);
    }
}

if (!function_exists('thousands')) {
    function thousands(float $number, ?string $thousands_separator = ' ') {
        return money($number, 0, '.', $thousands_separator);
    }
}

if (!function_exists('has_pagination')) {
    function has_pagination($class): bool {
        return $class instanceof \Illuminate\Pagination\LengthAwarePaginator;
    }
}

if (!function_exists('number_shorten')) {
    /**
     * Number shorten
     * 
     * @param  float $number
     * @param  array|null $divisors 
     * @return string
     */
    function number_shorten(?float $number = null, ?array $divisors = null) {
        if (is_null($number)) {
            $number = 0;
        }

        $default = trans('number_shorten.values');

        $divisors = !is_null($divisors) ? array_replace($default, $divisors) : $default;

        foreach ($divisors as $index => $shorthand) {
            $divisor = pow(1000, $index);

            if (abs($number) < ($divisor * 1000)) {
                break;
            }
        }

        $shorthand = Str::of($shorthand)->whenNotEmpty(fn (Stringable $str) => $str->prepend(trans('number_shorten.prepend')));

        return abs(money($number / $divisor, 0)) . $shorthand;
    }
}

if (!function_exists('status')) {
    function status(?array $statuses = null) {
        if (is_null($statuses)) {
            $statuses = ['Yes', 'No'];
        }

        return [
            $statuses[0] => true,
            $statuses[1] => false,
        ];
    }
}

if (!function_exists('array_key_search')) {
    function array_key_search(string $needle, array $haystack) {
        $array = new \RecursiveArrayIterator($haystack);
        $recursive = new \RecursiveIteratorIterator($array, \RecursiveIteratorIterator::SELF_FIRST);

        foreach ($recursive as $key => $value) {
            if ($needle === $key) {
                return $value;
            }
        }

        return null;
    }
}