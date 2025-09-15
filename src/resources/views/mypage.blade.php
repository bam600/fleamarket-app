<!-- プロフィール設定画面(初回) -->
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>プロフィール設定画面</title>
</head>

    <body>
        <!-- ログアウト処理 -->
        <!--@if (Auth::check())： ログイン済みかを判定ログイン中のユーザーのみフォームを表示 -->
        @if (Auth::check())
        <!-- route('logout')をPOSTメソッドに送信しログアウト処理を実行 -->
        <form class="form" action="{{ route('logout') }}"method="post">
            @csrf     
        <button class="header-nav__button">ログアウト</button>
        </form>

        <!-- - route('profile.store')をPOSTメソッドに送信し実行 -->
        <form action="{{ route('profile.store') }}" method="post">
            @csrf 
        <h2>プロフィール設定</h2>
            <label>ユーザー名</label>
                <input type ="text" name="user_name" placeholder="テスト太郎" />
            <label>郵便番号</label>
                <input type ="text" name="postal_code" placeholder="1234@gmail.com" />
            <label>住所</label>
                <input type ="text" name="address" placeholder="1234@gmail.com" />
            <label>建物名</label>
                <input type ="text" name="building" placeholder="1234@gmail.com" />

        <button type="submit">登録する</button>
        </form>
        <a href="{{ route('login') }}">ログインはこちら</a>
    @endif
    </body>
</html>