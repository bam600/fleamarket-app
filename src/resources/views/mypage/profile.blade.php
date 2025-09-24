@extends('layouts.app')

@section('title', 'プロフィール登録(初回)')

@section('content')

<body>

    {{-- プロフィール設定フォーム --}}
    <form action="{{ route('profile.store') }}" method="post" enctype="multipart/form-data">
         @csrf 
        <table>
            <th colspan=4><h2>プロフィール設定</h2></th>

        <!-- {{-- プロフィール画像アップロード --}}
        <label>プロフィール画像</label>
        <input type="file" name="image" accept="image/*" required>
        @error('image')
            {{ $message }}
        @enderror -->
            <tr>
                 <td colspan =4><label>ユーザー名</label></th>
            </tr>
            <tr>
                <td colspan =4><input type="text" name="user_name" placeholder="テスト太郎" value="{{ old('user_name') }}" /></td>
            </tr>    
                @error('user_name')
                    {{ $message }}
                @enderror

            <tr>
                <td colspan =4><label>郵便番号</label></td>
            </tr> 
            <tr>   
                <td colspan =4><input type="text" name="postal_code" placeholder="123-4567" value="{{ old('postal_code') }}" /></td>
            </tr>
                @error('postal_code')
                    {{ $message }}
                @enderror
            <tr>
                <td colspan =4><label>住所</label></td>
            </tr>
            <tr>
                 <td colspan =4><input type="text" name="address" placeholder="東京都新宿区..." value="{{ old('address') }}" /></td>
            </tr>
                @error('address')
                    {{ $message }}
                @enderror
            <tr>
                <td colspan =4><label>建物名</label></td>
            </tr>
            <tr>
                <td colspan =4><input type="text" name="building" placeholder="コーポ〇〇 101号室" value="{{ old('building') }}" /></td>
                @error('building')
                    {{ $message }}
                @enderror
            <tr>
                <td colspan =4 class="center-link" ><button type="submit">登録する</button></td>
            </tr>
        </form>
</body>
</html>