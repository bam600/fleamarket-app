<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('category_exhibition', function (Blueprint $table) {
            // 例：新しいカラムを追加
            $table->string('note')->nullable();

            // 例：外部キーを追加（すでに存在しない場合）
            // $table->foreignId('new_foreign_id')->constrained('other_table')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('category_exhibition', function (Blueprint $table) {
            $table->dropColumn('note');

            // 外部キーを削除する場合
            // $table->dropForeign(['new_foreign_id']);
            // $table->dropColumn('new_foreign_id');
        });
    }
};

