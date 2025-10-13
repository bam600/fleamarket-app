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
        $exhibition = Exhibition::with(['categories', 'condition', 'likes'])->findOrFail($id);
        $categories = $exhibition->categories;
            return view('item.show', compact('exhibition','categories'));

        
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

}
