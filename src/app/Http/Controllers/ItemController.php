<?php

/**PG05　商品詳細画面専用コントローラー */
namespace App\Http\Controllers;

 use Illuminate\Http\Request;   //HTTPリクエストを扱うクラスをインポート
 use App\Models\Product; //Productクラス(モデル)を使用するために必要なインポート

class ItemController extends Controller
{   
    /**
     * ルート定義 /item/{id} に対応するアクション
     * $id はURLから渡される商品ID。
     * この関数の責務は「指定されたIDの商品詳細画面を表示すること
     */
    public function details($id){       

    /**
     * $product = Product::findOrFail($id);
     * 指定されたIDの商品レコードを1件まるごと取得し
     * 全カラムの情報を含んだEloquentモデルインスタンス
     * テーブルに定義されているすべてのカラムの値が 
     * $product に含まれる。
     */
    $product = Product::findOrFail($id); // IDで商品を取得（存在しない場合は404）
    return view('details', compact('product')); //商品詳細画面でProductテーブルが使用できる

    }

    // app/Http/Controllers/ItemController.php
    public function show($id){
        $product = Product::with('condition')->findOrFail($id);
        return view('item.show', compact('product'));
    }

        /**
         * 商品名で検索した結果を返すメソッド
         */
        public function index(Request $request)
    {   
        //フォームから送信されたname="search"とタブ(recommendかmylistか)を取得
        $keyword = $request->input('search');
        $tab = $request->input('tab');

        // タブがおすすめの場合
        if ($tab === 'recommend') {
            $products = Product::all(); // 全商品を取得
            $keyword = '';  // 検索キーワードは空にする
        // タブがマイリストだったら
        } elseif ($tab === 'mylist') {
            $keyword = session('last_search') ?? '' ; 
        if (!empty($keyword)) {
            $products = Product::where('product_name', 'like', "%{$keyword}%")->get();
        } else {
            $products = collect(); // 空のコレクション
        }
        } elseif (!empty($keyword)) {
            session(['last_search' => $keyword]); // 検索キーワードを保存
            $products = Product::where('product_name', 'like', "%{$keyword}%")->get();
        } else {
            $products = Product::all(); //キーワード、タブなしは全商品
        }

        //home.blade.php に商品一覧、検索キーワード、タブの種類を渡して表示します。
        return view('home', compact('products', 'keyword', 'tab'));
    }

}