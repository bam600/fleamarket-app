<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //顧客情報新規登録及びプロフィール登録用テーブル(user_profiles)
        Schema::create('users', function (Blueprint $table) {
            // id
            $table->id();
            // ユーザー名
            $table->string('user_name', 255);
            // メールアドレス
            $table->string('email', 255)->unique();
            // パスワード
            $table->string('password', 255);
            // タイムスタンプ
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
