{{-- PG03 会員登録登録画面 --}}

{{--共通レイアウトの継承--}}
@extends('layouts.app')

{{--タグタイトル--}}
@section('title', '会員登録画面')

{{--専用CSSを読み込む---}}
@section('head')
{{-- laravelが /public/css/auth.cssを探す--}}
<link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endsection

{{--以下会員登録フォーム--}}
@section('content')

<div class="auth-wrapper">
    <section class="auth-section">
        
        <h1>会員登録</h1>
            {{--
                登録処理開始地点
                fortifyルートへの送信
                (/registerへPOST　※データをサーバーへ送る
            --}}
            <form action="{{ route('register') }}" method="post">
                {{-- 
                    Laravel重要機能
                    <input type ="hidden">が自動生成
                    悪意あるサイトからの不正送信防止
                    POST時ほぼ必須
                --}}
                @csrf
                <div class="field-header ">
                    <label>ユーザー名</label>
                    {{--
                        エラーメッセージ
                        nameにバリデーションerrorがある際に表示
                    --}}
                        @error('name')
                            <span class="error-text">
                                {{ $message }} 
                            </span>
                        @enderror
                    </div>

                <div>
                    {{--old('name') で直前入力を保持。--}}
                    <input type="text" name="name" placeholder="ユーザー名を入力" value="{{ old('name') }}" />
                </div>

                <div class="field-header ">
                    <label>メールアドレス</label>
                    {{--
                        エラーメッセージ
                        emailにバリデーションerrorがある際に表示
                    --}}
                    @error('email')
                        <span class="error-text">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

            <div>
                {{--old('email') で直前入力を保持。--}}
                <input type="email" name="email" placeholder="メールアドレスを入力してください" value="{{ old('email') }}" />
            </div>

            <div class="field-header ">
                <label>パスワード</label>
                {{--
                    エラーメッセージ
                    passwordにバリデーションerrorがある際に表示
                --}}
                @error('password')
                <span class="error-text">
                    {{ $message }}
                </span>
                @enderror
            </div>

            <div>
                <input type="password" name="password" />
            </div>

            <div class="field-header ">
                <label>確認用パスワード</label>
                @error('password_confirmation')
                <span class="error-text">
                    {{ $message }}
                </span>
                @enderror
            </div>

            <div>
                {{-- Fortify/Laravelの約束で自動で確認用パスワードと比較する --}}
                <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" />
            </div>
    </section>

    <section>
        <div>
            {{-- 押すとform送信 --}}
            <button type="submit" class="btn-submit">登録する</button>
        </div>
            </form>

        <div>
            {{-- ログイン画面へ遷移 --}}
            <a class="login-button" href=" {{ route('login') }}">ログインはこちら</a>
        </div>
    </section>
</div>
@endsection