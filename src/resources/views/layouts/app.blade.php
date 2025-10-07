
<!-- HTML5文書であることを宣言 -->
<!DOCTYPE html> 
<!-- ページ言語日本語に指定(ja=日本語) -->
<html lang="ja">
<!-- HTMLの表示設定などを定義するセクション(head) -->
<head>
    <!-- 文字コードをUTF-8に設定 -->
    <meta charset="UTF-8">
    <!-- モバイル対応のレスポンシブ設定 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- ブラウザタブに表示されるページタイトル -->
    <title>@yield('title', 'デフォルトタイトル')</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/contents.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/product_img.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gorditas:wght@400;700&family=Noto+Sans+JP:wght@810&display=swap" rel="stylesheet">
    @yield('head')
</head>
    <!-- ページの表示内容(本文の開始=>bodyタグ) -->
<body>
    <header class="header">
        <div class="header__logo-fixed">

            <a href="/" class="header__logo">
                <img src="{{ asset('images/logo.svg') }}" alt="ロゴ" class="logo-image">
            </a>

            @if(Auth::check() && !Request::is('register') && !Request::is('login'))
                <div class="header__inner">
                    <div class="flex">
                        <div class="search-box">
                            <!--Laravelのルート名 item.index に送信 -->
                            <form method="GET" action="{{ route('item.index') }}">
                                <!-- 検索キーワードを保持（再表示時に便利） -->
                                <input type="text" name="search" value="{{ $keyword ?? '' }}" />
                            </form>
                        </div>

                        <div class="header-actions">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button class="header_logout" type="submit">ログアウト</button>
                            </form>

                            <a class="header-link" href="{{ route('login') }}">マイページ</a>
                            <a class="header-link header-button" href="{{ route('login') }}">出品する</a>
                        </div>
                    </div>
                </div>
            @endif


  
    </header>

    <main>
        @yield('content')
    </main>
</body>
</html>