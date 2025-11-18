<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Profile;

class ProfileSeeder extends Seeder
{
    public function run()
    {
        User::take(15)->get()->each(function ($user) {
            Profile::factory()->create([
                'user_id' => $user->id,
            ]);
        });
    }
}
