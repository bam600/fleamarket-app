<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryExhibitionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //商品出品テーブルとカテゴリーテーブルの中間テーブルを作成
        Schema::create('category_exhibition', function (Blueprint $table) {
            $table->unsignedBigInteger('exhibition_id')->comment('出品ID（責務連携）');
            $table->unsignedBigInteger('category_id')->comment('カテゴリーID（責務連携）');

            // 外部キー制約（整合性責務）
            $table->foreign('exhibition_id')->references('id')->on('exhibitions')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

            // 複合主キー（識別責務）
            $table->primary(['exhibition_id', 'category_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_exhibition');
    }
}
