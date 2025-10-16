<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exhibition;

class PurchaseController extends Controller
{
    // データ引き渡しの中間メソッド
    public function preparePurchase(Request $request)
    {
        $id = $request->input('id');
        $exhibition = Exhibition::find($id);

    if (!$exhibition) {
        abort(404, '商品が見つかりません');
    }

    session()->put('selected_exhibition_id', $exhibition->id);
    session()->put('selected_exhibition_name', $exhibition->product_name);
    session()->put('selected_price', $exhibition->price);
    session()->put('selected_img', $exhibition->img);

    return redirect()->route('item.confirm', ['id' => $exhibition->id]);
}



public function confirm()
{
    $id = session('selected_exhibition_id');
    $name = session('selected_exhibition_name');
    $price = session('selected_price');
    $img = session('selected_img');

    $exhibition = Exhibition::where('id', $id)
        ->where('product_name', $name)
        ->with('condition')
        ->first();

    if (!$exhibition) {
        abort(404, '商品情報が見つかりません');
    }

    return view('item.purchase', [
        'exhibition' => $exhibition,
        'price' => $price,
        'img' => $img,
        'message' => '購入内容をご確認ください'
    ]);
}
}