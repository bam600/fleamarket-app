<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;


class RegisterController extends Controller
{

   // プロフィール初回登録画面用
    public function show()
   {
       return view('register');
   }


    // 新規会員登録画面用
   //  RegisterRequestでバリデーション設定していたら
   // 引数で渡すのでこちらでは設定不要
    public function store(RegisterRequest $request)
   {
      // (ユーザー名、アドレス、パスワード確認用パスワード)
      User::create([
         'user_name' => $request->user_name,
         'email' => $request->email,
         'password' => Hash::make($request->password),

      ]);

      return redirect()->route('mypage.profile');

   }



    // プロフィール初回登録画面用
    public function mypage()
   {
     return view('mypage');
   }

}
