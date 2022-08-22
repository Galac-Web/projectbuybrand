<?php

namespace Database\Seeders;

use App\Models\Franchise\Type;
use Illuminate\Database\Seeder;

class FranchisesTypesTableSeeder extends Seeder
{
    public function run()
    {
        $types = [
            'Франшиза', 'Мастер франшиза',
        ];

        foreach ($types as $type) {
            Type::create(['name' => $type]);
        }
    }
}
