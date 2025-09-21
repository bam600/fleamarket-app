<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use App\Http\Requests\ProfileRequest;

class ProfileController extends Controller
{

    // PG10　プロフィール編集画面*******************************************************************************
    // /mypage/profileにアクセスしたときに呼び出されるメソッド(プロフィール編集画面表示用)
    public function show(){
        return view('mypage.profile'); 
    }

    //登録ボタンを押下したら呼び出されるprofileStoreメソッド
    //ProfileRequestにて事前に定義されたバリデーションルールを適用
    // バリデーションチェックで問題なく通過した場合のみ変数$requestに渡される。
    public function profileStore(ProfileRequest $request)
   {

    $user = User::where('user_name', $request->user_name)->first();
        if ($user) {
            $userId = $user->id;
        }
    
      // 画像ファイルを保存（storage/app/public/profile_images）
    // $imagePath = null;
    //     if ($request->hasFile('image')) {
    //         $filename = uniqid() . '.' . $request->file('image')->extension();
    //         $request->file('image')->move(base_path('src/storage/profile_images'), $filename);
    //         $imagePath = 'src/storage/profile_images/' . $filename;
    //     }


    // バリデーション通過積みのユーザー入力値
    // ProfileはEloquentモデル　create()は渡された配列を使って新しいレコードを作成
    Profile::create([
        // 'imagePath' => $imagePath,
        'user_id' => $userId,
        'postal_code' => $request->postal_code,
        'address' => $request->address,
        'building' => $request->building,
      ]);

     return redirect()->route('goods.show');
   }

}
