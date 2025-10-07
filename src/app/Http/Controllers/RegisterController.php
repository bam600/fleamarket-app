<?php
// PG03　会員登録画面(register)*******************************************************************************************************

/**
 * ユーザー会員登録画面の表示
 * GET　/registerにアクセスされたときに呼び出される
 * resources/views/register.blade.php を返す
 */

namespace App\Http\Controllers;  //クラスの(名前空間)を定義する宣言

use Illuminate\Support\Facades\Auth;   //laravelの認証機能(ログイン・ログアウト)を操作するためのファザード(ファザード→便利な窓口でクラスを簡単につかえるようにしてくれる)
use Illuminate\Support\Facades\Hash;   //パスワードなどを安全に暗号化（ハッシュ化）するためのファサード

use App\Models\User; //テーブルを連携するEloquentモデル。ユーザー情報の保存・取得に使う
use App\Http\Requests\RegisterRequest; //フォーム入力のバリデーションルールを定義したクラス。store() メソッドの引数として使用。
use App\Http\Requests\LoginRequest; //ログインフォーム用のバリデーションルールを定義したクラス

/**
 * RegisterController は Laravel のベースコントローラー Controller を継承
 * このクラスは、ユーザー登録に関する『画面表示』と『登録処理』２つを担当
 **/
class RegisterController extends Controller
{
   /** 
    *  showメソッド:登録画面の表示
    */
    public function show() //GET /registerにアクセスしたときに呼び出されるメソッド
   {
       return view('register'); //resources/views/register.blade.php を表示します。
   }
      /** 
    *  storeメソッド:登録処理
    */
    public function store(RegisterRequest $request) //POST /registerにアクセスしたときに呼び出されるメソッド バリデーションチェックで問題なく通過した場合のみ変数$requestに渡される
   {
      $validated = $request->validated();  //users テーブルに新しいレコードを追加

      // バリデーション通過積みのユーザー入力値
      $user = User::create([ // UserはEloquentモデル　create()は渡された配列を使って新しいレコードを作成
        'user_name' => $validated['user_name'],
        'email' => $validated['email'], 
        'password' => Hash::make($validated['password']), // Hash::make() は Bcrypt を使って安全に暗号化する
      ]);
      // ※モデル側で $fillable に user_name, email, password が設定されている必要有
   
      Auth::login($user); //作成したユーザがログイン状態になる(セッション開始)
      return redirect()->route('profile.edit'); //route('profile.edit') で /mypage/profile にリダイレクト
   }
}