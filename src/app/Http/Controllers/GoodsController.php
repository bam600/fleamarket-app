<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GoodsController extends Controller
{
    //PG01　商品一覧画面(トップ画面)**********************************************************************************************
    
   public function goods()
{
    return view('goods'); // 必要に応じてBladeファイルも作成
}
    public function store(){
        
        return redirect()->route('item.show');
    }
}
