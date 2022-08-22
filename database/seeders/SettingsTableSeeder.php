<?php

namespace Database\Seeders;

use App\Models\Language;
use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    public function run()
    {
        $settings = [
            'buybrand_phone' => '74952491109',
            'buybrand_address' => [
                'languages' => [
                    'ru' => 'Рябиновая ул., 26 стр.10, Москва, Россия, 121471',
                    'en' => 'Moscow, Russia, 121471',
                ]
            ],
            'buybrand_app_store' => 'https://www.apple.com/ru/app-store/',
            'buybrand_google_play' => 'https://play.google.com/',
            'buybrand_vk' => 'https://vk.com/buybrandru',
            'buybrand_twitter' => null,
            'buybrand_facebook' => 'https://www.facebook.com/buybrand.ru/',
            'buybrand_instagram' => 'https://www.instagram.com/buybrand_expo/?hl=ru',
            'buybrand_youtube' => 'https://www.youtube.com/channel/UCaWpkxeoiw3V6HIpATWUT7w',
        ];

        $languages = Language::all();

        foreach ($settings as $name => $value) {
            if (is_array($value)) {
                if (array_key_exists('languages', $value)) {
                    foreach ($value['languages'] as $language => $v) {
                        Setting::create([
                            'language_id' => $languages->firstWhere('slug', $language)->id,
                            'name' => $name,
                            'value' => $v,
                        ]);
                    }
                }
            } else {
                Setting::create([
                    'name' => $name,
                    'value' => $value,
                ]);
            }
        }
    }
}
