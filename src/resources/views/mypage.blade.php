<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>プロフィール設定画面(初回)</title>
</head>
<body>
    {{-- ログイン済みかを判定 --}}

    <!-- プロフィール画像ダウンロード -->
     <label for="photo"></label>

<style>
    .circle {
      width: 200px;
      height: 200px;
      background: red;
      border-radius: 50%;
    }
  </style>
  <div class="circle"></div>

    <input type="file" name="photo" accept="image/*">

        {{-- ログアウトフォーム --}}
        <form class="form" action="{{ route('logout') }}" method="post">
            @csrf     
            <button class="header-nav__button">ログアウト</button>
        </form>

        {{-- プロフィール設定フォーム --}}
        <form action="{{ route('profile.store') }}" method="post">
            @csrf 
            <h2>プロフィール設定</h2>

            <label>ユーザー名</label>
            <input type="text" name="user_name" placeholder="テスト太郎" />

            <label>郵便番号</label>
            <input type="text" name="postal_code" placeholder="123-4567" />

            <label>住所</label>
            <input type="text" name="address" placeholder="東京都新宿区..." />

            <label>建物名</label>
            <input type="text" name="building" placeholder="コーポ〇〇 101号室" />

            <button type="submit">登録する</button>
        </form>

        <a href="{{ route('login') }}">ログインはこちら</a>

</body>
</html>