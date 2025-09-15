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

   /**
    * プロフィール初回登録画面用
    *GET/registerにアクセスされたときに呼び出されるメソッド
  **/
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

   //商品画面(トップ)用
    public function productList()
   {
     return view('productList');
   }

}