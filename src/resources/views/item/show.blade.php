{{-- PG05:商品詳細画面--}}

{{--layouts.appをベースレイアウトとして継承--}}
@extends('layouts.app') 

{{--タイトルタグの設定--}}
@section('title', '商品詳細')

{{--商品詳細用のCSSを読み込む---}}
@section('head')
    <link rel="stylesheet" href="{{ asset('css/details.css') }}">
@endsection

@section('content')
 <div class ="centered">
    <div class="product-detail">
    <div class="product-image">
        {{-- 商品画像を表示 --}}
        <p><img class = "product_img" src="{{ $exhibition->img }}" alt="{{ $exhibition->product_name }}"/></p>
    </div>
    
    <div class ="product-text">
        {{-- 商品名--}}
        <p><span class ="contents1">{{$exhibition->product_name}}</span></p>
        {{-- ブランド名--}}
        <p><span class ="contents3 ">{{$exhibition->brand}}</span></p>
        {{-- 価格(number_format:カンマ表記) --}}
        <p><span class ="contents4">￥{{ number_format($exhibition->price) }}(税込み)</span></p>

        {{-- いいねカウント--}}
        {{--ログイン済みのユーザのみ処理--}}
        @auth
            {{--もし、今ログインしているユーザがいいねしたら--}}
            @if($exhibition->isLikedBy(Auth::user()))
                {{--いいね削除用メソッドをidを渡し、like.destroy'にアクセス--}}
                <form method="POST" action="{{ route('like.destroy', $exhibition->id) }}">
                @csrf
                    {{--POSTメソッドをDELETEに変換--}}
                    @method('DELETE')
                    {{--★状態でいいねボタンをおすと解除--}}
                    <button type="submit">★ いいね</button>
                </form>
            @else
                {{--いいねしてない場合はlike.storeにアクセスしていいね登録--}}
                <form method="POST" action="{{ route('like.store', $exhibition->id) }}">
                @csrf
                    {{--☆の状態でボタンを押すといいね登録--}}
                    <button type="submit">☆ いいね</button>
                    {{--いいねカウント--}}
                    <p>{{ $exhibition->likes->count() }}</p>
                </form>
            @endif
        @endauth


        <p><button type="submit">購入手続きへ</button></P>
        <p><label class ="contents2">商品説明</label></p>
        <p><span class ="contents5">{{$exhibition->description}}</span></p> 
        <p><label class ="contents2">商品情報</label></p>
        <p><label class ="contents5">カテゴリー</label>
                @foreach($categories as $category)
                    <p>{{$category->name}}</p>
                @endforeach
        <span></span></p>
        <p><label class ="contents5">商品の状態</label></p>
        <p><span>{{ $exhibition->condition->label }}</span></P>

        {{-- ログイン画面へリン既存ユーザー向けの動線 --}}
    </div>
    </div>
    </div>
@endsection
 