<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    public function run()
    {
        $tags = [
            \App\Models\Media::class => [
                [
                    'slug' => 'buy_franchise',
                    'name' => 'Купить франшизу',
                ],
                [
                    'slug' => 'sell_franchise',
                    'name' => 'Продать франшизу',
                ],
                [
                    'slug' => 'restaurants',
                    'name' => 'Рестораны',
                ],
                [
                    'slug' => 'shops',
                    'name' => 'Магазины',
                ],
                [
                    'slug' => 'services',
                    'name' => 'Услуги',
                ],
            ],
        ];

        foreach ($tags as $model => $items) {
            foreach ($items as $item) {
                Tag::create(
                    array_merge($item, ['model' => $model])
                );
            }
        }
    }
}
