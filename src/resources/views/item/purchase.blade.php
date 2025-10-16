{{-- PG06:商品購入画面:purchase.blade.php--}}


{{--layouts.appをベースレイアウトとして継承--}}
@extends('layouts.app') 

{{--タイトルタグの設定--}}
@section('title', '商品購入')

{{--商品詳細用のCSSを読み込む---}}
@section('head')
    <link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')
    <div class="centered">
        <div class="product-detail">
            <div class="product-image">
                {{-- セッションから取得した画像を表示 --}}
                <p><img class="product_img" src="{{ $img }}" alt="商品画像" /></p>
            </div>
            <div class="product-text">
                 {{-- セッションから取得した価格を表示 --}}
                <p><span class="contents4">{{ $exhibition->product_name }}</span></p>
                {{-- セッションから取得した価格を表示 --}}
                <p><span class="contents4">￥{{ number_format($price) }} (税込み)</span></p>

                {{-- メッセージ表示 --}}
                <p>{{ $message }}</p>
            </div>
        </div>
    </div>
@endsection