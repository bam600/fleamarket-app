<!-- PG01　商品一覧画面-->
@extends('layouts.app')

@section('title', '商品一覧')

@section('header_flex')

<div class ="flex">
<input type="text" name="search" placeholder="コーポ〇〇 101号室" />
<div><a class="header-link" href="{{ route('login') }}">ログアウト</a></div>
<div><a class="header-link" href="{{ route('login') }}">マイメニュー</a></div>
<div><a class="header-link header-button" href="{{ route('login') }}">出品する</a></div>
</div>
@endsection

@section('content')

<a href="{{ route('login') }}">おすすめ</a>
<a href="{{ route('login') }}">マイリスト</a>
       
        <form action="{{ route('details', ['id' => 1]) }}" method="get">
            <!-- laravelのセキュリティ上必須 (クロスサイトスクリプティング攻撃の保護-->
            @csrf
 
        </form>
@endsection
