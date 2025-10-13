<?php

// PG09　プロフィール画面のコントローラ
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use App\Models\Exhibition;           

class MypageController extends Controller
{
    public function index(Request $request)
    {
        // 自分が出品した商品一覧を取得
        $exhibitions = Exhibition::where('user_id', Auth::id())->get();

        return view('mypage', compact('exhibitions'));
    }
}

    // // GET /mypage：マイページ表示（プロフィール or 出品商品）
    // public function index(Request $request)
    // {
    //     $page = $request->query('page');
    //     $user = Auth::user();

    //     if ($page === 'sell') {
    //         // 出品商品一覧表示
    //         $exhibitions = Exhibition::with('images')
    //             ->where('user_id', $user->id)
    //             ->get();

    //         return view('mypage.sell', compact('exhibitions', 'user'));
    //     }

    //     // デフォルトはプロフィール編集画面
    //     return view('mypage.profile', compact('user'));
    // }

    // // POST /mypage：プロフィール保存
    // public function profilestore(Request $request)
    // {
    //     $user = Auth::user();

    //     // バリデーション（例）
    //     $validated = $request->validate([
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|email',
    //         // 他の項目も必要に応じて
    //     ]);

    //     // ユーザー情報更新
    //     $user->update($validated);

    //     return redirect()->route('mypage', ['page' => 'profile'])
    //                      ->with('success', 'プロフィールを更新しました。');
    // }
