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
                @php
                    $product_price = number_format($price);
                @endphp
                {{-- メッセージ表示 --}}
                <p>{{ $message }}</p>

            <h3 class="category-title">支払い方法</h3>
            <select name="payment_id" required><option value="">選択してください</option>
                @foreach($payments as $payment)
                    <option value="{{ $payment->id }}"
                        {{ old('payment_id') == $payment->id ? 'selected' : '' }}>
                        {{ $payment->name }}
                    </option>
                @endforeach
            </select>
                @php
                    $payment_name =  $payment->name;
                @endphp
            <div>
            <p>配送先</p>
            <a href="{{ route('address', ['id' => $exhibition->id]) }}">変更する</a>
                <p>{{$postal_code}}</p>
                <p>{{$address}}</p>
                <p>{{$building}}</p>
            </div>
        <div>
            <p>商品代金</p>
            <p>¥{{$product_price}}</p>
            <p>支払い方法</p>
            <p>{{$payment_name}}</p>
        </div>
        <p><button type="submit">購入する</button></p>
    </div>
    </div>
@endsection