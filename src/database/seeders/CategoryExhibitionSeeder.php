<?php

//出品商品カテゴリー管理テーブルのダミーデータ
namespace Database\Seeders; 

use App\Models\Category;
use App\Models\Exhibition;
use Illuminate\Database\Seeder;

class CategoryExhibitionSeeder extends Seeder
{
    public function run()
    {
        $categories = Category::all();
        $exhibitions = Exhibition::all();

        foreach ($exhibitions as $exhibition) {
            $exhibition->categories()->attach(
                $categories->random(rand(1, 3))->pluck('id')->toArray()
            );
        }
    }
}

