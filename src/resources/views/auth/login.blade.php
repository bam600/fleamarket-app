{{-- PG04 ログイン画面 --}}

{{--共通レイアウトの--}}
@extends('layouts.app')

{{--タグタイトル--}}
@section('title', 'ログイン画面')

{{--専用CSSを読み込む---}}
@section('head')
<link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endsection

{{--以下ログインフォーム--}}
@section('content')

<div class="auth-wrapper">
    <section class="auth-section">

        <h1>ログイン</h1>

        {{-- フォーム送信先:loginという名前付きルートのURL取得 POSTはデータ送信--}}
        <form action="{{ route('login') }}" method="POST">
            {{-- 不正アクセス防止 --}}
            @csrf
            <div class="field-header ">
                <label>メールアドレス</label>
                {{--エラーメッセージ--}}
                @error('email')
                <span class="error-text">
                    {{-- アドレス未入力の場合メッセージ表示 --}}
                    {{ $message }}
                </span>
                @enderror
                
                {{-- ログイン情報が登録されないときのエラーメッセージ表示 --}}
                @error('auth')
                <span class="error-text">
                    {{ $message }}
                </span>
                @enderror

            </div>

            <div>
                {{-- メール形式checkあり　入力誤りがあったら直前の入力内容を表示 --}}
                <input type="text" name="email" placeholder="1234@gmail.com" value="{{ old('email') }}" />
            </div>

            <div class="field-header ">
                {{-- パスワード入力に誤りがあったときのエラー表示 --}}
                <label>パスワード</label>
                @error('password')
                <span class="error-text">
                    {{ $message }}
                </span>
                @enderror
            </div>

            <div>
                {{-- 入力が誤りがあったときに直前の入力内容を表示 --}}
                <input type="password" name="password" placeholder="12345abcde" />
            </div>
    </section>

    <section>
        <div>
            <!-- button：フォーム送信ボタン ログインするボタンを押下するとform実装-->
            <button type="submit" class="btn-submit">ログインする</button>
            </form>
        </div>

        <div>
            <!-- route('register')：名前付きルートを使って会員登録画面へリンク-->
            <a class="login-button" href="{{ route('register') }}">会員登録はこちら</a>
        </div>
    </section>
</div>
@endsection