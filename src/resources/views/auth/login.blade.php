@extends('layouts.app')

@section('title', 'ログイン画面')

@section('content')


    <!-- /loginがフォーム送信先でPOSTメソッドで/loginに送信 -->
    <form action="{{ route('login') }}" method="POST">
        @csrf
    <table>
        <th colspan=4><h2>ログイン</h2></th>
    <tr>
        <td colspan=4  class="td"><label>メールアドレス</label></td>
    </tr>
    <tr>    
        <!-- バリデーション名：email -->
        <td colpspan = 4><input type ="email" name="email" placeholder="1234@gmail.com" value="{{ old('email') }}" /></td>
    </tr>
            <!-- エラーメッセージ -->
            @error('email')
            {{ $message }}
            @enderror
    <tr>
    <td colspan=4  class="td"><label>パスワード</label></td>
    </tr>

    <tr>
        <!-- バリデーション名：password -->
        <td colspan=4><input type ="password" name="password" placeholder="12345abcde" value="{{ old('password') }}"/></td>
    </tr>
            <!-- エラーメッセージ -->
            @error('password')
            {{ $message }}
            @enderror
    <tr>
        <!-- button：フォーム送信ボタン ログインするボタンを押下するとform実装-->
        <td colspan=4 ><button type="submit">ログインする</button></td>
    </tr>

    <tr>
        <!-- route('register')：名前付きルートを使って会員登録画面へリンク-->
        <td colspan=4 class="center-link" ><a href="{{ route('register') }}">会員登録はこちら</a></td>
    </tr>
</table>
    </form>
@endsection