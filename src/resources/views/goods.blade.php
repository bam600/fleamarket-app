@extends('layouts.app')

@section('title', '商品一覧')

@section('content')

</head>
    <!-- ページの表示内容(本文の開始=>bodyタグ) -->
    <body>
        <header class="header">
            <div class="header__inner">
                <a class="header__logo" href="/">
<img src="{{ asset('images/logo.svg') }}" alt="ロゴ" class="class="logo-image">
                </a>
            </div>
        </header>
        <!-- 登録処理を行うルートにPOST送信するフォーム
        ルートは『register.store』 -->
        <form action="{{ route('goods.store') }}" method="get">
            <!-- laravelのセキュリティ上必須 (クロスサイトスクリプティング攻撃の保護-->
            @csrf
            <!-- フォームの見出し -->
            <h2>商品</h2>
 
            <button type="submit">登録する</button>
            <!-- ログイン画面へリンク　既存ユーザー向けの動線 -->
            <a href="{{ route('login') }}">ログインはこちら</a>
        </form>
@endsection
