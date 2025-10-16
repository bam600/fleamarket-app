{{-- PG01:商品一覧画面(トップ画面)--}}

{{--layouts.appをベースレイアウトとして継承--}}
@extends('layouts.app')

{{--タイトルタブの設定--}}
@section('title', '商品一覧')

{{-- おすすめ/マイリストボタン --}}
@section('content') 
    <div class="tab-buttons">
        <form method="GET" action="{{ route('item.index') }}">
            <input type="hidden" name="tab" value="recommend">
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

<div class="product-grid">
    @if(request('tab') === 'mylist')
        {{-- マイリスト表示（ログインユーザーがいいねした商品） --}}
        @auth
            @forelse ($likedProducts as $product)
                @if (Auth::id() !== $product->user_id)
                    <div class="product-card">
                        <a href="{{ route('item.show', ['id' => $product->id]) }}">
                            <img src="{{ asset($product->img) }}" alt="{{ $product->product_name }}" class="item_img">
                        </a>
                        <p>{{ $product->product_name }}</p>
                    </div>
                @endif
            @empty
                <p>まだいいねした商品はありません。</p>
            @endforelse
        @else
            <p>ログインするとマイリストが表示されます。</p>
        @endauth
    @else
        {{-- おすすめ商品一覧表示（自分の出品は除外） --}}
        @forelse ($exhibitions as $exhibition)
            @if (Auth::id() !== $exhibition->user_id)
                <div class="product-card">
                    <a href="{{ route('item.show', ['id' => $exhibition->id]) }}">
                        <img src="{{ asset($exhibition->img) }}" alt="{{ $exhibition->product_name }}" class="item_img">
                    </a>
                    <p>{{ $exhibition->product_name }}</p>
                </div>
            @endif
        @empty
            <p>現在、出品中の商品はありません。</p>
        @endforelse
    @endif
</div>
@endsection