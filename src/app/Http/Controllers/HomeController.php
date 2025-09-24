<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HOmeController extends Controller
{
    //PG01　商品一覧画面(トップ画面)**********************************************************************************************
    
   public function index()
{
    return view('home'); // 必要に応じてBladeファイルも作成
}
    public function store(){
        
        return redirect()->route('item.show');
    }
}