<!-- PG01　商品一覧(トップ画面) -->
@extends('layouts.app')

@section('title', '商品一覧')

@section('content')

        <!-- 登録処理を行うルートにPOST送信するフォーム
        ルートは『register.store』 -->
        <form action="{{ route('goods.store') }}" method="post">
            <!-- laravelのセキュリティ上必須 (クロスサイトスクリプティング攻撃の保護-->
            @csrf
            <!-- フォームの見出し -->
            <h2>商品</h2>
 
            <button type="submit">登録する</button>
            <!-- ログイン画面へリンク　既存ユーザー向けの動線 -->
            <a href="{{ route('login') }}">ログインはこちら</a>
        </form>
@endsection
