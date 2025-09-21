@extends('layouts.app')

@section('title', 'ログイン画面')

@section('content')

<body>
    <!-- /loginがフォーム送信先でPOSTメソッドで/loginに送信 -->
    <form class="form" action="/login" method="post">
        @csrf
    <h2>ログイン</h2>

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
    <!-- button：フォーム送信ボタン ログインするボタンを押下するとform実装-->
    <button type="submit">ログインする</button>
        <!-- route('register')：名前付きルートを使って会員登録画面へリンク-->
        <a href="{{ route('register') }}">会員登録はこちら</a>
    </form>
@endsection