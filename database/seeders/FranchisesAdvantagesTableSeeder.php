<?php

namespace Database\Seeders;

use App\Models\Franchise\Advantage;
use Illuminate\Database\Seeder;

class FranchisesAdvantagesTableSeeder extends Seeder
{
    public function run()
    {
        $advantages = [
            'ТЗ зарегистрирован', 'Формат развития', 'Корпоративная CRM',
            'Сотрудничество по регистрируемой форме договора', 'Предоставляет фин. модель развития',
            'Рентабельность компании', 'Средняя приб. 800 тыс. в мес.',
            'Высокий средний чек', 'Работа в онлайне',
        ];

        Advantage::insert(
            array_map(fn ($name) => ['name' => $name], $advantages)
        );
    }
}
