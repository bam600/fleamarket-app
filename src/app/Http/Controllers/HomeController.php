<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    //PG01　商品一覧画面(トップ画面)**********************************************************************************************
    
   public function index()
{
        //Productsテーブルからデータを取得
        $products = Product::all(); //登録されてるすべてのデータを取得
        return view('home', compact('products')); // home.blade.phpを表示、変数$productsをビューに渡す(連想配列)
    }
}