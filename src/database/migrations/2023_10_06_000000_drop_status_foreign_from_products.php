<?php
// 商品テーブル
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropStatusForeignFromProducts extends Migration

{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
        $table->dropForeign(['status_id']); // 外部キー制約を削除
        });

    }
}
