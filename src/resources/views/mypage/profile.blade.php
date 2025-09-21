<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>プロフィール設定画面(初回)</title>
    <style>
        .circle {
        width: 120px;
        height: 120px;
        background: red;
        border-radius: 50%;
        }   
    </style>
</head>

<body>
    {{-- ログアウトフォーム --}}
    <!-- 画像をダウンロードする場合- enctype="multipart/form-data" が必須 -->
   <form action="{{ route('logout') }}" method="POST">
        @csrf     
        <button class="header-nav__button">ログアウト</button>
    </form>

    {{-- プロフィール設定フォーム --}}
    <form action="{{ route('profile.store') }}" method="post" enctype="multipart/form-data">
         @csrf 
        <h2>プロフィール設定</h2>

        <!-- {{-- プロフィール画像アップロード --}}
        <label>プロフィール画像</label>
        <input type="file" name="image" accept="image/*" required>
        @error('image')
            {{ $message }}
        @enderror -->

        <label>ユーザー名</label>
        <input type="text" name="user_name" placeholder="テスト太郎" value="{{ old('user_name') }}" />
        @error('user_name')
            {{ $message }}
        @enderror

        <label>郵便番号</label>
        <input type="text" name="postal_code" placeholder="123-4567" value="{{ old('postal_code') }}" />
        @error('postal_code')
            {{ $message }}
        @enderror

        <label>住所</label>
        <input type="text" name="address" placeholder="東京都新宿区..." value="{{ old('address') }}" />
        @error('address')
            {{ $message }}
        @enderror

        <label>建物名</label>
        <input type="text" name="building" placeholder="コーポ〇〇 101号室" value="{{ old('building') }}" />
        @error('building')
            {{ $message }}
        @enderror

            <button type="submit">登録する</button>
        </form>

        <a href="{{ route('login') }}">ログインはこちら</a>

</body>
</html>