<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Seeder;

class LanguagesTableSeeder extends Seeder
{
    public function run()
    {
        $languages = [
            'ru' => 'Русский',
            'en' => 'English',
        ];

        foreach ($languages as $slug => $name) {
            Language::create([
                'name' => $name,
                'slug' => $slug,
                'is_active' => true,
            ]);
        }
    }
}
