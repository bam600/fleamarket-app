{{-- PG01:商品一覧画面（おすすめ／マイリストタブ切り替え付き）--}}

{{-- レイアウトの共通ファイルを継承（layouts/app.blade.phpを使う） --}}
@extends('layouts.app')

{{--タイトルタブの設定--}}
@section('title', '商品一覧')

{{--専用CSSを読み込む---}}
@section('head')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection

{{-- メインコンテンツ部分 --}}
@section('content')

{{-- タブ切り替えボタン部分--}}
<section class="tab-buttons">
    <ul class="list-button">
    {{-- おすすめボタンをおしたらitem.indexへGet送信 --}}
        <form method="GET" action="{{ route('item.index') }}">
            {{--おすすめボタンをおしたらhttp://localhost/?tab=recommendのURLにアクセス--}}
            <input type="hidden" name="tab" value="recommend">
            <li>
                {{-- URLのパラメータ(value)が "recommend"(おすすめ) ならボタンを強調表示 --}}
                <button type="submit" class="@if(request('tab') === 'recommend') active-button @else normal-button @endif">
                    おすすめ
                </button>
            </li>
        </form>

        {{-- マイリストボタンをおしたらitem.indexへGet送信 --}}
        <form method="GET" action="{{ route('item.index') }}">
            {{-- マイリストボタンを押したらGETメソッドで http://localhost/?tab=mylistにアクセスする --}}
            <input type="hidden" name="tab" value="mylist">
            <li>
                {{-- 現在のタブの値(value)が "mylist"(マイリスト) ならボタンを強調表示 --}}
                <button type="submit" class="@if(request('tab') === 'mylist') active-button @else normal-button @endif">
                    マイリスト
                </button>
            </li>
        </form>
    </ul>
</section>

{{--商品一覧の表示エリア--}}
<section>
    <div class="product-grid">
        {{--今のURLが/?tab=mylistなら--}}
        @if(request('tab') === 'mylist')

        {{--マイリストの表示--}}
        {{-- @auth:Laravel brade特有：ログインしている場合のみ表示 --}}
        @auth

        {{--$likedProductsはController側から渡された変数 
        ログインユーザーがいいねした商品一覧がはいっている
        $likedProducts の中のデータを1件ずつ $product に入れて使う --}}
        @forelse ($likedProducts as $product)
        {{-- ログイン中ユーザーIDと商品の出品者IDが違うなら表示--}}
        @if (Auth::id() !== $product->user_id)

        <div class="product-card">
            {{-- 商品詳細ページへのリンク --}}
            <a href="{{ route('item.show', ['id' => $product->id]) }}">
                {{-- 商品画像を表示 --}}
                <ul>
                    <li>
                        {{-- 商品画像クリック時の移動先URL --}}
                        <img src="{{ asset($product->img) }}" alt="{{ $product->product_name }}" class="item_img">
                        {{-- 売り切れなら SOLD 表示 --}}
                        @if ($product->status === 'sold')
                        <h3>SOLD</h3>
                    </li>
                    @endif

                    
                    <li>
                        {{-- 商品名を表示 --}}
                        <h3 class="product-name">{{ $product->product_name }}</h3>
                    </li>
                </ul>
            </a>
        </div>
        @endif
        {{-- いいねした商品がない場合の表示 --}}
        @empty
        <p>まだいいねした商品はありません。</p>
        @endforelse
        {{-- 未ログイン時の表示 --}}
        @else
        <p>ログインするとマイリストが表示されます。</p>
        @endauth
        
        @else
        {{--おすすめ商品一覧表示（すべての出品を表示--}}
        @forelse ($exhibitions as $exhibition)
        <div class="product-card">
            {{-- 商品詳細ページへのリンク --}}
            <a href="{{ route('item.show', ['id' => $exhibition->id]) }}">
                {{-- 商品画像を表示 --}}
                <ul>
                    <li>
                        {{-- 商品画像クリック時の移動先URL --}}
                        <img src="{{ asset($exhibition->img) }}" alt="{{ $exhibition->product_name }}" class="item_img">

                        {{-- 売り切れなら SOLD 表示 --}}
                        @if ($exhibition->status === 'sold')

                        <h3>SOLD</h3>
                    </li>
                    @endif

                    <li>
                        {{-- 商品名を表示 --}}
                        <h3 class="product-name">{{$exhibition->product_name }}</h3>
                    </li>
                </ul>
            </a>
        </div>
        
        @empty
        <p>現在、出品中の商品はありません。</p>
        @endforelse
        @endif
    </div>
</section>
@endsection