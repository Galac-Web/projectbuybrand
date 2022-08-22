<?php

namespace Database\Seeders;

use App\Models\Preset;
use Illuminate\Database\Seeder;

class PresetsTableSeeder extends Seeder
{
    public function run()
    {
        $presets = [
            \App\Models\Media::class => [
                'Купить франшизу', 'Продать франшизу', 'Рестораны', 'Магазины', 'Услуги', 'Технологии', 'Лайфхаки', 'Выставка', 'Бизнес',
            ],
            \App\Models\Franchise::class => [
                'Для начинающих', 'Для опытных', 'Минимум вложений', 'В тренде', 'Лидеры', 'Проверенные временем', 'Участники выставки', 'Быстрорастущие', 'Оценка экспертов',
            ],
        ];

        foreach ($presets as $model => $names) {
            foreach ($names as $name) {
                Preset::create([
                    'name' => $name,
                    'module' => $model::getModuleName(),
                ]);
            }
        }
    }
}
