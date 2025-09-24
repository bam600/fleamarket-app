<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Profile;
use App\Http\Requests\ProfileRequest;

class ProfileController extends Controller
{

    // PG09　プロフィール画面(初回)************************************************************************************************************

    /**
     * プロフィール編集画面を表示するための処理
     * GETメソッドで　/mypage/profileにアクセスしたときに呼び出される
     * resources/views/mypage/profile.blade.php を表示。
    */
    public function edit(){ 
      // resources/views/mypage/profile.blade.phpを表示
        return view('mypage.profile'); 
    }

    /**
     * フォームのバリデーションルールを定義したクラス
     * バリデーション通以下したデータのみ$requestに渡される
     */
    public function profileStore(ProfileRequest $request) //プロフィール情報の保存（POST）
   {

    /**
     * User::App\Models\User モデルを使って、users テーブルにアクセス
     * ->first():条件に一致したレコードのうち、最初の1件を取得
     * 存在しなければnullを返す
     * if (!$user)～：$userがnullだったらエラーメッセージを表示する
     * redirect()->back()：元の画面に戻る。
     * withErrors()：フォームのエラーとしてメッセージを渡す。
     * 'user_name' => '...'：user_name フィールドに対してエラーを表示。
     */
    $user = User::where('user_name', $request->user_name)->first();

      if (!$user) {
        return redirect()->back()->withErrors(['user_name' => 'ユーザーが見つかりませんでした。']);
      }
      
      $userId = $user->id; //データが存在したらそのidを$userIdに代入

    /**登録するボタンを押下したときに実装
     * Profileモデル：新しいレコードを追加
     * create():渡されたデータを使って1件の新しいプロフィールを保存
     */
    Profile::create([
        // 'imagePath' => $imagePath,
        // $userId:プロフィールがどのユーザーのものか
        'user_id' => $userId, 
        // $request->postal_code:入力された郵便番号
        'postal_code' => $request->postal_code, 
        //$request->address:入力された住所
        'address' => $request->address,
        //$request->building:入力された建物名
        'building' => $request->building,
      ]);
    //登録が終わったらindexのルートに移動する
    return redirect()->route('home'); 
   }

}
