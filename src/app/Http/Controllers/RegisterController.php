<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
    // 新規会員登録画面用
    public function store(RegisterRequest $request)
   {
      // バリデーション後変数registerに格納
      // (ユーザー名、アドレス、パスワード確認用パスワード)
      $register = $request->only(['username', 'email', 'password', 'checkpassword']);
      // ブレードファイルに値を戻す用(変数:data)
      return view('register');
   }

    // プロフィール初回登録画面用
    public function show()
   {
     return view('register');
   }

    // プロフィール初回登録画面用
    public function mypage()
   {
     return view('mypage');
   }

}
