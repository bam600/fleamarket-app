<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exhibition;

class HomeController extends Controller
{
    //PG01　商品一覧画面(トップ画面)**********************************************************************************************
    
   public function index()
{
        // Exhibitionテーブルから出品情報と関連画像を取得(リレーション)
        $exhibitions = Exhibition::get();

        // home.blade.php に $exhibitions を渡して表示
        return view('home', compact('exhibitions'));
    }
}