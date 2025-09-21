<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; 

// 新規登録及びプロフィール登録画面用
// User.phpはusersテーブルと自動的に紐づくEloquentモデル
class User extends Authenticatable
{
    // モデルファクトリを使用するためのトレイト。
    use HasFactory;
    // $fillableで安全に代入可能なカラムを明示。無い場合create()は使えない
    protected $fillable = ['user_name', 'email', 'password'];
}
