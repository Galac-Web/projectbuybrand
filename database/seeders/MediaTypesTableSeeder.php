<?php

namespace Database\Seeders;

use App\Models\Media\Type;
use Illuminate\Database\Seeder;

class MediaTypesTableSeeder extends Seeder
{
    public function run()
    {
        $types = [
            'article', 'video', 'news', 'podcast', 'lifehack',
        ];

        foreach ($types as $type) {
            Type::create(['name' => $type]);
        }
    }
}
