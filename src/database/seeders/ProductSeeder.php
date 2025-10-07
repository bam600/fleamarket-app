<?php
//商品テーブル
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'product_name' => '腕時計',
            'price' => 15000,
            'brand' => 'Rolax',
            'description' => 'スタイリッシュなデザインのメンズ腕時計',
            'image_path' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/Armani+Mens+Clock.jpg',
            'condition_id' =>1,
            'user_id' => 1,
            'item_sold' => true,
        ];
    DB::table('products')->insert($param);
    
        $param = [
            'product_name' => 'HDD',
            'price' => 5000,
            'brand' => '西芝',
            'description' => '高速で信頼性の高いハードディスク',
            'image_path' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/HDD+Hard+Disk.jpg',
            'condition_id' =>2,
             'user_id' => 1,
             'item_sold' => false,
        ];
    DB::table('products')->insert($param);

        $param = [
            'product_name' => '玉ねぎ3束',
            'price' => 300,
            'brand' => 'なし',
            'description' => '新鮮な玉ねぎ3束のセット',
            'image_path' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/iLoveIMG+d.jpg',
            'condition_id' =>3,
            'user_id' => 1,
            'item_sold' => true,
        ];
    DB::table('products')->insert($param);

        $param = [
            'product_name' => '革靴',
            'price' => 4000,
            'brand' => '',
            'description' => 'クラシックなデザインの革靴',
            'image_path' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/Leather+Shoes+Product+Photo.jpg',
            'condition_id' =>4,
            'user_id' => 1,
            'item_sold' => true,
        ];
    DB::table('products')->insert($param);
    
            $param = [
            'product_name' => 'ノートPC',
            'price' => 45000,
            'brand' => '',
            'description' => '高性能なノートパソコン',
            'image_path' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/Living+Room+Laptop.jpg',
            'condition_id' =>1,
            'user_id' => 2,
            'item_sold' => false,
        ];
    DB::table('products')->insert($param);

         $param = [
            'product_name' => 'マイク',
            'price' => 8000,
            'brand' => 'なし',
            'description' => '高音質のレコーディング用マイク',
            'image_path' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/Music+Mic+4632231.jpg',
            'condition_id' =>2,
            'user_id' => 2,
            'item_sold' => false,
        ];
    DB::table('products')->insert($param);

        $param = [
            'product_name' => 'ショルダーバッグ',
            'price' => 3500,
            'brand' => '',
            'description' => 'おしゃれなショルダーバッグ',
            'image_path' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/Purse+fashion+pocket.jpg',
            'condition_id' =>3,
            'user_id' => 2,
            'item_sold' => true,
        ];
    DB::table('products')->insert($param);

        $param = [
            'product_name' => 'タンブラー',
            'price' => 500,
            'brand' => 'なし',
            'description' => '使いやすいタンブラー',
            'image_path' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/Tumbler+souvenir.jpg',
            'condition_id' =>4,
            'user_id' => 2,
            'item_sold' => true,
        ];
    DB::table('products')->insert($param);

        $param = [
            'product_name' => 'コーヒーミル',
            'price' => 4000,
            'brand' => 'Starbacks',
            'description' => '手動のコーヒーミル',
            'image_path' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/Waitress+with+Coffee+Grinder.jpg',
            'condition_id' =>1,
            'user_id' => 3,
            'item_sold' => false,
        ];
    DB::table('products')->insert($param);

        $param = [
            'product_name' => 'メイクセット',
            'price' => 2500,
            'brand' => '',
            'description' => '便利なメイクアップセット',
            'image_path' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/%E5%A4%96%E5%87%BA%E3%83%A1%E3%82%A4%E3%82%AF%E3%82%A2%E3%83%83%E3%83%95%E3%82%9A%E3%82%BB%E3%83%83%E3%83%88.jpg',
            'condition_id' =>2,
            'user_id' => 3,
            'item_sold' => true,
        ];
    DB::table('products')->insert($param);

    }
}
