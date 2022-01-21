<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AdminTableSeeder::class,
            OptionsTableSeeder::class,
            UsersTableSeeder::class,
            PagesTableSeeder::class,
            FeaturesTableSeeder::class,
            ServicesTableSeeder::class,
        ]);
    }
}