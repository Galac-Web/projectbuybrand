<?php

namespace Database\Seeders;

use App\Models\Franchise;
use App\Models\Franchise\Support;
use App\Models\Franchise\Support\Group;
use Illuminate\Database\Seeder;

class FranchisesSupportsTableSeeder extends Seeder
{
    /** @var \Illuminate\Database\Eloquent\Collection */
    private $groups;

    public function run()
    {
        $supports = [
            'Постоянная Поддержка' => [
                'Бизнес-план', 'Готовый сайт', 'Обучение персонала', 'Соцсети. Ведение страниц',
                'Реклама в соцсетях', 'Встречи и конференции', 'CRM система', 'Выбор локации',
                'Список каналов продаж', 'Специалист по рекламе', 'Вебинары', 'Торжественное открытие',
                'Шаблоны объявлений', 'Планирование и поддержка', 'Реклама на ТВ', 'Договор аренды',
                'Подбор сотрудников', 'Публикации в СМИ', 'Реклама в регионе', 'Готовые баннеры',
            ],
            'Обучение без отрыва от работы' => [
                '47,5 часов',
            ],
            'Обучение в Классе' => [
                '47,5 часов',
            ],
            'Маркетинговая Поддержка' => [
                'Шаблоны объявлений', 'Социальные сети', 'Разработка Веб-сайта',
                'Национальные средства массовой информации', 'Оптимизация поисковых систем', 'Маркетинг по электронной почте',
            ],
        ];

        $this->groups(array_keys($supports));

        $supports = collect($supports)
            ->map(fn ($supports, $group) => array_map(fn ($support) => [
                    'name' => $support,
                    'group_id' => optional($this->groups->firstWhere('name', $group))->id
                ], $supports)
            )
            ->flatten(1)
            ->toArray();

        Support::insert($supports);

        $this->sync();
    }

    private function groups(array $groups): void
    {
        Group::insert(
            array_map(fn ($item) => ['name' => $item], $groups)
        );

        $this->groups = Group::get();
    }

    private function sync()
    {
        $count = Support::count();
        $franchises = Franchise::get();

        foreach ($franchises as $franchise) {
            $franchise->supports()->sync(
                Support::inRandomOrder()->limit(rand(5, $count - 5))->pluck('id')->toArray()
            );
        }
    }
}
