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
    <title>新規登録画面</title>
</head>
    <!-- ページの表示内容(本文の開始=>bodyタグ) -->
    <body>
        <!-- 登録処理を行うルートにPOST送信するフォーム
        ルートは『register.store』 -->
        <form action="{{ route('register.store') }}" method="post">
            <!-- laravelのセキュリティ上必須 (クロスサイトスクリプティング攻撃の保護-->
            @csrf
            <!-- フォームの見出し -->
            <h2>会員登録</h2>
            <!-- 入力欄のラベル -->
            <label>ユーザー名</label>
            <!-- バリデーション名:"username" -->
            <!-- - ユーザー名の入力欄。old() によりバリデーションエラー時に再表示。 -->
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
            <!-- フォーム送信ボタン　押下したら登録処理を開始 -->
            <button type="submit">登録する</button>
            <!-- ログイン画面へリンク　既存ユーザー向けの動線 -->
            <a href="{{ route('login') }}">ログインはこちら</a>
        </form>
    </body>
</html>