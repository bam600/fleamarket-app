<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            // Profilesテーブルのid
            $table->id();
            // id(usersテーブルのid)
            $table->unsignedBigInteger('user_id');
            // ユーザー名
            $table->string('user_name', 20);
            // 郵便番号
            $table->string('postal_code', 8);
            // 住所
            $table->string('address', 255);
            // 建物
            $table->string('building', 255)->nullable();
            // タイムスタンプ
            $table->timestamps();
            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
