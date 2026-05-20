<?php

/*おすすめ商品一覧と、
　ログイン中ユーザーのマイリスト商品を取得して
　home.blade.php に渡す処理
*/
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Exhibition;
// Likesテーブル
use App\Models\Like;

// Controllerクラスを継承したHomeControllerクラス
class HomeController extends Controller
{

//PG01　商品一覧画面(トップ画面)**********************************************************************************************/

/*
  商品一覧を表示するためのindexメソッド
  laravelで自動生成される(Request:型 $request:変数名)
*/
    public function index(Request $request)
{   
    // URLの tab の値を取得するなければ recommend(おすすめ表示) にする(初期表示はおすすめ表示)
    $tab = $request->input('tab', 'recommend');

    //exhibitionsテーブルから商品一覧を取得しいいねの情報といいねの件数をまとめて取得して$exhibitions に保存する。
    $exhibitions = Exhibition::with(['likes'])->withCount('likes')->get();

    // 未ログインの場合エラーになるため空箱を用意しエラー回避
    $likedProducts = collect();

    //ログインしていたら
    if (Auth::check()) {
        // Likesテーブルのuser_idとログインidの一致しているものだけ取得その中のexhibition_idを取り出し$likedIdsに保存
        $likedIds = Like::where('user_id', Auth::id())->pluck('exhibition_id');
        // Exhibitionテーブルからいいねの情報といいねの件数を取得　
        $likedProducts = Exhibition::with(['likes'])->withCount('likes')
            ->whereIn('id', $likedIds)
            ->get();
    }
    return view('home', compact('exhibitions', 'likedProducts', 'tab'));
    }
}