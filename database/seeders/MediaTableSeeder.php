<?php

namespace Database\Seeders;

use App\Helpers\Media as MediaLibrary;
use App\Models\Media;
use App\Models\Media\Type;
use Illuminate\Database\Seeder;

class MediaTableSeeder extends Seeder
{
    public function run()
    {
        $materials = [
            'news'  => [
                [
                    'title'       => 'К марту 2021 г. Fix Price открыл 453 франчайзинговых магазина',
                    'content'     => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.',
                    'image'       => '/assets/images/pub1.png',
                    'tags'        => [
                        'Обзор рынка',
                    ],
                ],
            ],
            'video' => [
                [
                    'title'       => 'BUYBRAND Franchise Market 2021. Итоги выставки',
                    'content'     => 'Крупнейшую международную выставку франшиз BUYBRAND Franchise Market за три дня посетили 6351 человек. На площадке выставлялись.',
                    'image'       => '/assets/images/pub1.png',
                    'tags'        => [
                        'Выставка',
                    ],
                ],
                [
                    'title'       => 'К марту 2021 года Fix Price открыл 453 франчайзинговых магазина',
                    'content'     => 'Крупнейшую международную выставку франшиз BUYBRAND Franchise Market за три дня посетили 6351 человек. На площадке выставлялись.',
                    'image'       => '/assets/images/material1.png',
                    'tags'        => [
                        'Выставка',
                    ],
                ],
            ],
            'lifehack' => [
                [
                    'title'       => 'Как выбрать франшизу, ч.1. Вопросы, которые надо задать франчайзеру',
                    'image'       => '/assets/images/img5.png',
                    'tags'        => [
                        'Купить франшизу',
                    ],
                ],
                [
                    'title'       => 'Как выбрать франшизу, ч.2. Вопросы, которые надо задать франчайзеру',
                    'image'       => '/assets/images/img5.png',
                    'tags'        => [
                        'Купить франшизу',
                    ],
                ],
                [
                    'title'       => 'Как выбрать франшизу, ч.3. Вопросы, которые надо задать франчайзеру',
                    'image'       => '/assets/images/img5.png',
                    'tags'        => [
                        'Продать франшизу',
                    ],
                ],
                [
                    'title'       => 'Как выбрать франшизу, ч.4. Вопросы, которые надо задать франчайзеру',
                    'image'       => '/assets/images/img5.png',
                    'tags'        => [
                        'Выбрать франшизу',
                    ],
                ],
            ],
        ];

        $types = Type::get();

        foreach ($materials as $type => $items) {
            if ($type !== 'lifehack') continue;

            foreach ($items as $item) {
                /** @var \App\Models\Media $media */
                $media = Media::create([
                    'type_id'   => $types->firstWhere('name', $type)->id,
                    'title'     => $item['title'],
                    'content'   => $item['content'] ?? null,
                    'is_active' => true,
                ]);

                $tags = collect($item['tags'])->map(fn (string $item) => Media::listTags()->where('name', $item)->firstOrCreate([
                    'name'  => $item,
                    'slug'  => (string) str($item)->slug(),
                    'model' => Media::class,
                ]));

                $media->tags()->sync(
                    $tags->pluck('id')->toArray()
                );

                MediaLibrary::toCollection($media, url($item['image']), 'media');
            }
        }
    }
}
