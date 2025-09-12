<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新規登録画面</title>
</head>

<body>
    <!-- register.storeでバリデーション -->
    <form action="{{ route('register.store') }}" method="post">
    @csrf
    <h2>会員登録</h2>
    <label>ユーザー名</label>

    <!-- バリデーション名:"username" -->
    <input type ="text" name="user_name" placeholder="テスト太郎"  value="{{ old('user_name') }}"/>
    <!-- エラーメッセージ -->
    @error('user_name')
   {{ $message }}
   @enderror

    <label>メールアドレス</label>
    <!-- バリデーション名：email -->
    <input type ="email" name="email" placeholder="1234@gmail.com" value="{{ old('email') }}" />
    <!-- エラーメッセージ -->
    @error('email')
   {{ $message }}
   @enderror

    <label>パスワード</label>
    <!-- バリデーション名：password -->
    <input type ="password" name="password" placeholder="12345abcde" value="{{ old('password') }}"/>
    <!-- エラーメッセージ -->
    @error('password')
   {{ $message }}
   @enderror

    <label>確認用パスワード</label>
    <!-- バリデーション名： checkpassword-->
     <!-- 確認用パスワードの名前はpassword_confirmation！！ -->
    <input type ="password" name="password_confirmation" placeholder="12345abcde" value="{{ old('password_confirmation') }}" />
    <!-- エラーメッセージ -->
    @error('password_confirmation')
   {{ $message }}
   @enderror

    <button type="submit">登録する</button>
    ログインはこちら
</form>
</body>
</html>