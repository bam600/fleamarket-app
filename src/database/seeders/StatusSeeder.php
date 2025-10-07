<?php
//販売ステータステーブル
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'status' => '販売中',
            'slug' => 'available',
            ];
        DB::table('statuses')->insert($param);

        $param = [
            'status' => '購入済',
            'slug' => 'sold',
            ];
        DB::table('statuses')->insert($param);
    }
}
