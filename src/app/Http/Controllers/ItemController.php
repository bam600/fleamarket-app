<?php

/**PG05　商品詳細画面専用コントローラー */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exhibition;
use App\Models\Condition;

class ItemController extends Controller
{
    // 商品詳細画面
    public function show($id)
    {
        $exhibition = Exhibition::with(['categories', 'condition'])
                         ->withCount('likes')
                         ->findOrFail($id);

        $categories = $exhibition->categories;

      return view('item.show', compact('exhibition', 'categories')); //  ここが 'item.show' であること
}


    // 商品一覧・検索
    public function index(Request $request)
    {
        $keyword = $request->input('search');
        $tab = $request->input('tab');

        if ($tab === 'recommend') {
            $exhibitions = Exhibition::all();
            $keyword = '';
        } elseif ($tab === 'mylist') {
            $keyword = session('last_search') ?? '';
            $exhibitions = !empty($keyword)
                ? Exhibition::where('product_name', 'like', "%{$keyword}%")->get()
                : collect();
        } elseif (!empty($keyword)) {
            session(['last_search' => $keyword]);
            $exhibitions = Exhibition::where('product_name', 'like', "%{$keyword}%")->get();
        } else {
            $exhibitions = Exhibition::all();
        }

        return view('home', compact('exhibitions', 'keyword', 'tab'));
    }

    public function preparePurchase($id)
    {
    $exhibition = Exhibition::findOrFail($id);

    // 購入に必要な情報だけセッションに保存
    session([
        'selected_exhibition' => [
            'id' => $exhibition->id,
            'product_name' => $exhibition->product_name,
            'price' => $exhibition->price,
        ]
    ]);

    session()->save(); // セッション保存を明示

    return redirect()->route('item.purchase.confirm');
    }
}
