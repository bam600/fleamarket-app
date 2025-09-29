<!-- PG05　商品詳細画面-->
@extends('layouts.app')

@section('title', '商品詳細画面')

@section('content')

        
        <form action="{{ route('details', ['id' => 1]) }}" method="get">
            <!-- laravelのセキュリティ上必須 (クロスサイトスクリプティング攻撃の保護-->
            @csrf
            <input type ="text" name="item_name" placeholder="商品名を入力してください"  value="バッグ"/>
            <input type ="text" name="brand_name" placeholder="ブランド名を入力してください"  value="エルメス"/>
            <input type ="text" name="price" placeholder="商品金額"  value="￥45,000"/>
            <label>商品説明</label>
            <input type ="textarea" name="product_color" placeholder="商品説明"  value="カラー青 新品"/>
            <input type ="text" name="product_description" placeholder="商品説明"  value="エルメス"/>
            <input type ="text" name="product_description" placeholder="商品説明"  value="エルメス"/>
            <label>商品情報</label>
            <label>カテゴリー</label><input type ="text" name="category" placeholder="商品カテゴリー"  value="バッグ"/>
            <label>商品の状態</label>
 
            <button type="submit">購入手続きへ</button>
            <!-- ログイン画面へリンク　既存ユーザー向けの動線 -->
        </form>
@endsection
