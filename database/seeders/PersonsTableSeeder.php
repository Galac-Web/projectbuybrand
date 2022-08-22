<?php

namespace Database\Seeders;

use App\Models\Person;
use Illuminate\Database\Seeder;

class PersonsTableSeeder extends Seeder
{
    public function run()
    {
        $persons = [
            'Илон Маск',
            'Билл Гейтс',
            'Джефф Безос',
            'Джек Ма',
        ];

        foreach ($persons as $person) {
            Person::create(['name' => $person]);
        }
    }
}
