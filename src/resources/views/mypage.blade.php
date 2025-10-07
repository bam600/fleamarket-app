<!-- PG09　プロフィール画面-->
@extends('layouts.app') <!--layouts.appをベースレイアウトとして継承-->

@section('title', 'プロフィール')

@section('content') 
    <div class="tab-buttons">
        <div class="profile_link">
            <!-- プロフィール編集画面に遷移 -->
            <a class="profile_text"  header-button" href="{{ route('profile.edit') }}">プロフィール選択</a>
        </div>
        <form method="GET" action="{{ route('item.index') }}">
            <input type="hidden" name="tab" value="recommend">
            <button type="submit" class="@if(request('tab') === 'recommend') active-button @else normal-button @endif">
                出品した商品
            </button>
        </form>

        <form method="GET" action="{{ route('item.index') }}">
            <input type="hidden" name="tab" value="mylist">
            <button type="submit" class="@if(request('tab') === 'mylist') active-button @else normal-button @endif">
                購入した商品
            </button>
        </form>
    </div>
@endsection