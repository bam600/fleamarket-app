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
            StatusSeeder::class,
            ConditionSeeder::class,
            CategorySeeder::class,
            ProductSeeder::class,
        // 他のSeederもここに追加
    ]);

    }
}
