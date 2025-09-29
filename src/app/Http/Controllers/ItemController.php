<?php

/**PG05　商品詳細画面専用コントローラー */
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemController extends Controller
{
        public function details($id){
        
       return view('details', ['id' => $id]);
    }
}
