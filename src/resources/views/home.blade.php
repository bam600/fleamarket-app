<!-- PG01　商品一覧画面(トップ画面)-->
@extends('layouts.app') <!--layouts.appをベースレイアウトとして継承-->

@section('title', '商品一覧') <!--HTML<title>タグに商品一覧と表示される--> 

<!-- おすすめ/マイリストボタン -->
@section('content') 
    <div class="tab-buttons">
        <form method="GET" action="{{ route('item.index') }}">
            <input type="hidden" name="tab" value="recommend">
            <button type="submit" class="@if(request('tab') === 'recommend') active-button @else normal-button @endif">
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
        <!-- $products はコントローラーから渡された商品一覧（Eloquentモデル）Productモデルからデータがある分取得して表示1件ずつループして表示-->
        @if($products->isEmpty())
            <p>該当する商品は見つかりませんでした</p>
        @else
            @foreach($products as $product)
                <div>
                <!--<a>タグで画像を囲みクリックで詳細ページへ遷移route('details', ['id' => $product->id]) は /item/{id} に対応-->
                    <a href="{{ route('item.show', ['id' => $product->id]) }}">
                    <!--image_path は画像ファイルのURL、product_name は商品名-->
                        <img src="{{ $product->image_path }}" alt="{{ $product->product_name }}" class="item_img">
                    </a>
                    <!-- 商品名 -->
                    <p>{{ $product->product_name}}</p>
                </div>
         @endforeach
        @endif
    </div> 
@endsection
