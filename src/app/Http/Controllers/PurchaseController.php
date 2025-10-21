<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exhibition;
use App\Models\Payment;

class PurchaseController extends Controller
{
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

        return redirect()->route('item.confirm');
    }

    public function confirm()
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', '購入にはログインが必要です');
        }

        $exhibition_id = session('selected_exhibition_id');
        $name          = session('selected_exhibition_name');
        $price         = session('selected_price');
        $img           = session('selected_img');

        $payments = Payment::all();
        $profile  = auth()->user()->profile;

        $postal_code = session('purchase_postal_code', $profile->postal_code ?? '');
        $address     = session('purchase_address', $profile->address ?? '');
        $building    = session('purchase_building', $profile->building ?? '');

        $exhibition = Exhibition::where('id', $exhibition_id)
            ->where('product_name', $name)
            ->with('condition')
            ->first();

        if (!$exhibition) {
            abort(404, '商品情報が見つかりません');
        }

        return view('item.purchase', [
            'exhibition_id' => $exhibition_id,
            'payments'      => $payments,
            'exhibition'    => $exhibition,
            'price'         => $price,
            'img'           => $img,
            'postal_code'   => $postal_code,
            'address'       => $address,
            'building'      => $building,
            'message'       => '購入内容をご確認ください',
        ]);
    }

    public function store(Request $request, $id)
    {
        // 購入処理（例：DB保存など）

        return redirect()->route('item.confirm')
            ->with('success', '購入処理が完了しました');
    }
}
