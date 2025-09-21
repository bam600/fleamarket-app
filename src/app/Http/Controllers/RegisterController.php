<?php

namespace App\Http\Controllers;

// laravelの認証機能を使う為のファザード
use Illuminate\Support\Facades\Auth;
// ユーザー情報を保存するためのEloquentモデル。User::create() で使用。
use App\Models\User;
// パスワードを安全にハッシュ化するためのファサード。Hash::make() で使用
use Illuminate\Support\Facades\Hash;
//バリデーションルールを定義したフォームリクエストクラス。store() メソッドの引数で使用。
use App\Http\Requests\RegisterRequest;
//ログイン用のバリデーションクラス。今回は未使用なので削除してもOK。
use App\Http\Requests\LoginRequest;

/**
 * RegisterController は Laravel のベースコントローラー Controller を継承し*ています。
 * 
 *このクラスは、ユーザー登録に関する画面表示と登録処理を担当します。
 **/
class RegisterController extends Controller
{
   // PG03　会員登録画面******************************************************************************************************
   // registerにアクセスしたときに呼び出されるメソッド(登録フォームの表示用)
    public function show()
   {
       return view('register');
   }

   //登録ボタンを押下したら呼び出されるstoreメソッド
   // RegisterRequestにて事前に定義されたバリデーションルールを適用
   // バリデーションチェックで問題なく通過した場合のみ変数$requestに渡される。
    public function store(RegisterRequest $request)
   {
      // バリデーション済にする
      $validated = $request->validated();

      // バリデーション通過積みのユーザー入力値
      // UserはEloquentモデル　create()は渡された配列を使って新しいレコードを作成
      User::create([
        'user_name' => $validated['user_name'],
        'email' => $validated['email'],
         // Hash::make() は Bcrypt を使って安全に暗号化する
        'password' => Hash::make($validated['password']),
      ]);
   
      //登録完了後route('profile')にリダイレクト
      // profileコントローラのshowメソッドに遷移
      return view('mypage.profile');
   }

}