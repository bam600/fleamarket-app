<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemController extends Controller
{
        public function show($id){
        
       return view('item.show', ['id' => $id]);
    }
}
