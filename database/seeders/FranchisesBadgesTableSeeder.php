<?php

namespace Database\Seeders;

use App\Models\Franchise\Badge;
use Illuminate\Database\Seeder;

class FranchisesBadgesTableSeeder extends Seeder
{
    public function run()
    {
        $badges = [
            [
                'name' => 'Проверенная франшиза',
                'icon' => '/assets/images/icons/checked-out.svg',
            ]
        ];

        Badge::insert($badges);
    }
}
