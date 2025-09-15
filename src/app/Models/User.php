<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; 

// 新規登録及びプロフィール登録画面用
// テーブルのmodelファイル(user_profileテーブルと紐づける)
class User extends Authenticatable
{
    // モデルファクトリを使用するためのトレイト。
    use HasFactory;
    // 安全に代入できる変数：fillable
    protected $fillable = ['user_name', 'email', 'password'];
}
