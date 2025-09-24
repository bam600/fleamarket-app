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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gorditas:wght@400;700&family=Noto+Sans+JP:wght@810&display=swap" rel="stylesheet">
</head>
    <!-- ページの表示内容(本文の開始=>bodyタグ) -->
    <body>
        <header class="header">
            <div class="header__inner">
                <a class="header__logo" href="/">
                    <!-- ヘッダーにロゴを挿入 -->
                    <img src="{{ asset('images/logo.svg') }}" alt="ロゴ" class="logo-image">

                    @if (Auth::check())
                    <!-- ログアウトボタン -->
                    <form method="POST" action="{{ route('logout') }}" class="header__logout-form">
                        @csrf
                        <button type="submit" class="header__logout-button">ログアウト</button>
                        </form>
                    @endif
                </a>
            </div>
        </header>
        <main>
            @yield('content')
        </main>
    </body>
</html>