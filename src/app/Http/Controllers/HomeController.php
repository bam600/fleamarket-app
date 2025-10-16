<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Exhibition;
use App\Models\Like;


class HomeController extends Controller
{
    //PG01　商品一覧画面(トップ画面)**********************************************************************************************
    
public function index()
{
    // おすすめ商品一覧（いいね数付き + likesリレーション付き）
    $exhibitions = Exhibition::with(['likes'])->withCount('likes')->get();

    // ログインユーザーがいいねした商品一覧（マイリスト）
    $likedProducts = collect();
    if (Auth::check()) {
        $likedIds = Like::where('user_id', Auth::id())->pluck('exhibition_id');
        $likedProducts = Exhibition::with(['likes'])->withCount('likes')
            ->whereIn('id', $likedIds)
            ->get();
    }

    return view('home', compact('exhibitions', 'likedProducts'));
}
}