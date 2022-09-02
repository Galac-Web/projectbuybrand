<?php

namespace App\Services;

use Spatie\Image\Image;
use Illuminate\Support\Facades\Route;

class Manifest
{
    public static function routes(): void
    {
        Route::get('manifest.json', function () {
            $data = [
                'name' => config('app.name'),
                'description' => config('app.description'),
                'lang' => config('app.locale'),
                'start_url' => route('index'),
                'theme_color' => config('app.manifest.theme_color'),
                'background_color' => config('app.manifest.background_color'),
                'display' => config('app.manifest.display'),
                'orientation' => config('app.manifest.orientation'),
                'icons' => self::getIcons()
            ];

            return response()->json($data, 200, [], JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES);
        })->name('manifest-json');

        Route::prefix('favicon')->group(function () {
            Route::get('manifest/icon-{size}.{ext}', function (int $size, string $ext) {
                $image = public_path('favicon/512.png');
                $output = public_path(sprintf('favicon/%s.%s', $size, $ext));

                if (!file_exists($output)) {
                    $img = Image::load($image)->width($size)->height($size);

                    if ($size < 100) {
                        $img->sharpen(10);
                    }

                    $img->save($output);
                }

                return response()->file($output);
            })->whereNumber('size')->whereAlpha('ext')->name('manifest-icon');
        });

        Route::get('/favicon.ico', function () {
            return response()->file(directory(public_path() . '/favicon/favicon.ico'), ['Content-Type' => 'image/x-icon']);
        })->name('favicon');
    }

    public static function getIcons(string $ext = 'png'): array
    {
        $icons = [];
        $sizes = [512, 256, 192, 180, 152, 144, 120, 114, 96, 76, 72, 60, 57, 32, 16];

        foreach ($sizes as $size) {
            $icons[] = [
                'src' => route_relative('manifest-icon', ['size' => $size, 'ext' => $ext]),
                'type' => 'image/' . $ext,
                'sizes' => $size . 'x' . $size,
            ];
        }

        return $icons;
    }
}
