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

    \App\Models\User::factory()->count(15)->create();
    \App\Models\Profile::factory()->count(15)->create();

    $this->call([
        CategoryExhibitionSeeder::class,
        CategorySeeder::class,
        ConditionSeeder::class,
        ExhibitionSeeder::class,
        PaymentSeeder::class,
        ProfileSeeder::class,

    ]);
}

    }

