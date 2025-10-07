<?php
// 商品テーブル
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('product_name');
            $table->integer('price');
            $table->string('brand')->nullable();
            $table->text('description')->nullable();
            $table->string('image_path')->nullable();
            $table->boolean('item_sold')->nullable();
            $table->unsignedBigInteger('condition_id');
            $table->unsignedBigInteger('user_id'); 
            $table->timestamps();

            $table->foreign('condition_id')->references('id')->on('conditions')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // ← 追加
        });
    }
}
