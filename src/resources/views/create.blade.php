<!-- PG05　商品詳細画面-->
@extends('layouts.app') <!--layouts.appをベースレイアウトとして継承-->

@section('title', '商品詳細') <!--HTML<title>タグに商品一覧と表示される--> 

@section('head') <!--セクション：商品詳細用のCSSを読み込む-->
    <link rel="stylesheet" href="{{ asset('css/details.css') }}">
@endsection

@section('header_flex') <!--header：レイアウト部分-->

<div class="flex">
    <div class="search-box">
        <!--Laravelのルート名 item.index に送信 -->
        <form method="GET" action="{{ route('item.index') }}">
            <!-- 検索キーワードを保持（再表示時に便利） -->
            <input type="text" name="search" value="{{ $keyword ?? '' }}" />
        </form>
    </div>
    <div class="header-actions">
        
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="header_logout" type="submit">ログアウト</button>
        </form>
        <a class="header-link" href="{{ route('login') }}">マイページ</a>
        <a class="header-link header-button" href="{{ route('login') }}">出品する</a>
    </div>
</div>
@endsection

@section('content')
 <div class ="centered">
    <div class="product-detail">
    <div class="product-image">
        <!-- 商品画像 -->
        <p><img class = "product_img" src="{{ $product->image_path }}" alt="{{ $product->product_name }}"/></p>
    </div>
    
   
    <div class ="product-text">
        <!-- 商品名 -->
        <p><span class ="contents1">{{$product->product_name}}</span></p>
        <!-- ブランド名 -->
        <p><span class ="contents3 ">{{$product->brand}}</span></p>
        <!-- 価格(カンマ表記) -->
        <p><span class ="contents4">￥{{ number_format($product->price) }}(税込み)</span></p>
        <p><button type="submit">購入手続きへ</button></P>
        <p><label class ="contents2">商品説明</label></p>
        <p><span class ="contents5">{{$product->description}}</span></p> 
        <p><label class ="contents2">商品情報</label></p>
        <p><label class ="contents5">カテゴリー</label><span>ファッション</span></p>
        <p><label class ="contents5">商品の状態</label></p>
        <span>{{ $product->condition_label }}</span>

        <!-- ログイン画面へリンク　既存ユーザー向けの動線 -->
    </div>
    </div>
    </div>
@endsection
 