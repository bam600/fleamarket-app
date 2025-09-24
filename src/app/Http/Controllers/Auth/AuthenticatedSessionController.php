<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;

//ログアウト後の遷移画面設定(オーバーライド)用
// コントローラ 
class AuthenticatedSessionController extends Controller
{
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login'); // ← ログアウト後にログイン画面へ
    }

        public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        // ログイン後のリダイレクト先を自由に設定
        return redirect()->intended('/'); // 商品一覧など
    }

}
