{{-- PG03 会員登録登録画面 --}}
@extends('layouts.app')  {{--継承--}}
@section('title', '会員登録画面')  {{--タグタイトル--}}
@section('head')    {{--専用CSSを読み込む---}}
    <link rel="stylesheet" href="{{ asset('css/user-access.css') }}">
@endsection
@section('content')     {{--POSTメソッドでータ送信 データ登録に対応 --}}
<form action="{{ route('register.create') }}" method="post" novalidate>    
    @csrf
    <div class="table-wrapper">
        <table>
            <th><h2 class="h2">会員登録</h2></th>

                <tr><td class="td"><label>ユーザー名</label></td>
                    <td>
                        <span class="error">
                            @error('user_name') 
                                {{ $message }}
                            @enderror
                        </span>
                    </td>
                </tr>
                <tr><td colspan =4>
                        <input type ="text" name="user_name" placeholder="テスト太郎"  value="{{ old('user_name') }}"/>
                </td></tr>


            <tr><td class="td"><label>メールアドレス</label></td>
                <td>
                    <span class="error">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </span>
                </td>
            </tr>
            <tr><td colspan =4><input type ="email" name="email" placeholder="1234@gmail.com" value="{{ old('email') }}" /></td></tr>

            <tr><td class="td"><label>パスワード</label></td>
                <td>
                    <span class="error">
                        @error('password')
                            {{ $message }}
                        @enderror
                    </span>
                </td>
            </tr>
            <tr><td colspan =4><input type="password" name="password" placeholder="12345abcde" /></td></tr>

            <tr><td class="td"><label>確認用パスワード</label></td>
                <td>
                    <span class="error">
                        @error('password_confirmation')
                            {{ $message }}
                        @enderror
                    </span> 
                </td>   
            </tr>
            <tr><td><input type ="password" name="password_confirmation" placeholder="12345abcde" value="{{ old('password_confirmation') }}" /></td></tr>

            <tr><td colspan="2"><button type="submit">登録する</button></td></tr>

            <tr><td colspan=4 class="center-link" ><a href="{{ route('login') }}">ログインはこちら</a></td></tr>
        </table>
</div>
</form>
@endsection