<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(PermissionsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(LanguagesTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
        $this->call(PresetsTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(MediaTypesTableSeeder::class);
        $this->call(MediaTableSeeder::class);

        // GEO
        $this->call(CountriesTableSeeder::class);

        // Franchises
        $this->call(FranchisesCategoriesTableSeeder::class);
        $this->call(FranchisesAdvantagesTableSeeder::class);
        $this->call(FranchisesBadgesTableSeeder::class);
        $this->call(FranchisesTypesTableSeeder::class);
        $this->call(FranchiseTableSeeder::class);
        $this->call(FranchisesSupportsTableSeeder::class);

        if (config('app.env') !== 'production') {
            $this->dev();
        }
    }

    public function dev()
    {
        
    }
}
