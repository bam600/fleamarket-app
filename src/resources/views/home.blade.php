{{-- PG01:商品一覧画面(トップ画面)--}}

{{--layouts.appをベースレイアウトとして継承--}}
@extends('layouts.app')

{{--タイトルタブの設定--}}
@section('title', '商品一覧')

{{-- おすすめ/マイリストボタン --}}
@section('content') 
    <div class="tab-buttons">
        <form method="GET" action="{{ route('item.index') }}">
            <input type="hidden" name="tab" value="mylist">
            <button type="submit" class="@if(request('tab') === 'mylist') active-button @else normal-button @endif">
                おすすめ
            </button>
        </form>

        <!-- 修正 -->
        <form method="GET" action="{{ route('item.index') }}">
            <input type="hidden" name="tab" value="mylist">
            <button type="submit" class="@if(request('tab') === 'mylist') active-button @else normal-button @endif">
                マイリスト
            </button>
        </form>
    </div>

<!-- 商品画像の表示 -->
<div class="product-grid">
    @if($exhibitions->isEmpty())
        <p>該当する商品は見つかりませんでした</p>
    @else
        @foreach($exhibitions as $exhibition)
            <div class="product-card">
                <a href="{{ route('item.show', ['id' => $exhibition->id]) }}">
                    <img src="{{ asset($exhibition->img) }}" alt="{{ $exhibition->product_name }}" class="item_img">
                </a>
                <p>{{ $exhibition->product_name }}</p>
            </div>
        @endforeach
    @endif
</div>
@endsection
