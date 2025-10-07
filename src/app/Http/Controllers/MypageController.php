<?php

// PG09　プロフィール画面のコントローラ
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MypageController extends Controller
{
     public function mypage(){ 
      // resources/views/mypage.blade.phpを表示
        return view('mypage'); 
    }
}
