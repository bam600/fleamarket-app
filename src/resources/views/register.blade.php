<!-- PG03 会員登録登録画面 -->
 
@extends('layouts.app')  <!--共通のレイアウトを継承(resources/views/layouts/app.blade.php がベース)-->

@section('title', '会員登録画面')   <!--HTMLの <title> タグに表示されるページタイトル。-->

@section('content') <!--レイアウトの @yield('content') に差し込まれるメインコンテンツ。-->
    
    <form action="{{ route('register.create') }}" method="post" novalidate>    <!--web.php に定義された register.store ルートへPOST送信。通常は RegisterController@store() に対応。POSTメソッドはデータ登録に対応 -->
        @csrf
        <table>
            <th colspan=4><h2>会員登録</h2></th>
            <tr>
                <td colspan =4 class="td"><label>ユーザー名</label></td>
            </tr>
            <tr>
                <td colspan =4>
                    <input type ="text" name="user_name" placeholder="テスト太郎"  value="{{ old('user_name') }}"/>    <!--name="user_name"はバリデーション対象-->
                </td>
            </tr>
                    <!-- エラーメッセージ -->
                    @error('user_name')
                    {{ $message }}
                    @enderror
            <tr>
                <td colspan =4  class="td"><label>メールアドレス</label></td>
            </tr>
            <tr>
                <!-- バリデーション名：email -->
                <td colspan =4><input type ="email" name="email" placeholder="1234@gmail.com" value="{{ old('email') }}" /></td>    <!--name="email"はバリデーション対象-->
            </tr>
                    @error('email')
                    {{ $message }}
                    @enderror
            <tr>
                 <td colspan =4  class="td"><label>パスワード</label></td>
            </tr>
            <tr>
                <!-- バリデーション名：password -->
                <td colspan =4><input type="password" name="password" placeholder="12345abcde" /></td>  <!--name="password"はバリデーション対象-->
            </tr>    
                @error('password')
                    {{ $message }}
                    @enderror
            <tr> 
                <td colspan =4 class="td"><label>確認用パスワード</label></td>
            </tr>
                <!-- バリデーション名：password_confirmation（confirmedルールと連携）--> 
                <td><input type ="password" name="password_confirmation" placeholder="12345abcde" value="{{ old('password_confirmation') }}" /></td>    <!--name="password_confirmation" → confirmed ルールと連携し、password と一致するかチェック。-->
                    @error('password_confirmation')
                    {{ $message }}
                    @enderror 
            <tr>
                
                <td><button type="submit">登録する</button></td>    <!--押下すると、フォームが register.store にPOST送信され、RegisterController@store() が実行されます。-->
            </tr>
            <tr>
                <td colspan=4 class="center-link" ><a href="{{ route('login') }}">ログインはこちら</a></td> <!--既存ユーザー向けの動線。login ルートに遷移し、ログイン画面を表示します。 -->            
            </tr>
        </table>
    </form>
@endsection