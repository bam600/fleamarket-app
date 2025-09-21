@extends('layouts.app')

@section('title', '会員登録画面')

@section('content')
    
    <!--form送信時にweb.php内の/registerにPOSTリクエストが送られる -->
    <!--RegisterControllerクラスのstoreメソッドが呼び出さる-->
    <form action="{{ route('register.store') }}" method="post">
        @csrf
        <table>
            <!-- フォームの見出し -->
            <th colspan=4><h2>会員登録</h2></th>
            <!-- 入力欄のラベル -->
            <tr>
                <td colspan =4><label>ユーザー名</label></td>
            </tr>
            <!-- バリデーション名:"username" -->
            <!-- - ユーザー名の入力欄。old() によりバリデーションエラー時に再表示。 -->
            <tr>
                <td colspan =4>       
                    <input type ="text" name="user_name" placeholder="テスト太郎"  value="{{ old('user_name') }}"/>
                </td>
            </tr>
                    <!-- エラーメッセージ -->
                    @error('user_name')
                    {{ $message }}
                    @enderror
            <tr>
                <td colspan =4><label>メールアドレス</label></td>
            </tr>
            <tr>
                <!-- バリデーション名：email -->
                <td colspan =4><input type ="email" name="email" placeholder="1234@gmail.com" value="{{ old('email') }}" /></td>
            </tr>
                    @error('email')
                    {{ $message }}
                    @enderror
            <tr>
                 <td colspan =4><label>パスワード</label></td>
            </tr>
            <tr>
                <!-- バリデーション名：password -->
                <td colspan =4><input type="password" name="password" placeholder="12345abcde" /></td>
            </tr>    
                @error('password')
                    {{ $message }}
                    @enderror
            <tr> 
                <td><label>確認用パスワード</label></td>
            </tr>
                <!-- バリデーション名：password_confirmation（confirmedルールと連携）--> 
                <td><input type ="password" name="password_confirmation" placeholder="12345abcde" value="{{ old('password_confirmation') }}" /></td>
                    <!-- エラーメッセージ -->
                    @error('password_confirmation')
                    {{ $message }}
                    @enderror 
            <tr>
                <!-- フォーム送信ボタン　押下したら登録処理を開始 -->
                <td><button type="submit">登録する</button></td>
            </tr>
            <tr>
                <!-- ログイン画面へリンク　既存ユーザー向けの動線 -->
                <td><a href="{{ route('login') }}">ログインはこちら</a></td>
            </tr>
        </form>
@endsection