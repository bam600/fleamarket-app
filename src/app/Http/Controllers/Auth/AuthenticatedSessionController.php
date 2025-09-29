<?php
/**
 * ログイン・ログアウト認証-----------------------------------
 * このコントローラは App\Http\Controllers\Auth 名前空間に属する
 * Laravel Fortify の認証関連コントローラーと同じ構造にすることで
 * Fortifyのルート定義と自然に連携できる
*/
namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;    //Request：HTTPリクエストを受け取るため。
use Illuminate\Support\Facades\Auth;    //Auth：Laravelの認証ファサード。ログイン・ログアウト処理に使用
use App\Http\Controllers\Controller;    //Laravelの基本コントローラークラス。これを継承して機能を拡張


class AuthenticatedSessionController extends Controller
{   
    /**
     * ユーザがログアウト処理を
     * 行ったときに呼ばれるメソッド
     */
    public function destroy(Request $request)  
    {   
        /**Laravelの認証機能で、現在ログインしている
         * ユーザーをログアウトさせる
         * 'webは通常のユーザー認証を指す
         */
        Auth::guard('web')->logout();  //ログアウト　Auth::check（）はfalse,Auth::user()はnullになる

        $request->session()->invalidate();  //セッション無効化　現在のセッション破棄
        $request->session()->regenerateToken(); // CSRFトークン再生成

        return redirect('/login'); // ← ログアウト後にログイン画面へ
    }

    /**
     * ユーザが/loginにアクセスしたときに呼び出される
     * Laravel Fortify の Fortify::loginView() をオーバーライドして、
     * 自分仕様のログイン画面を表示
     */
    public function create(){
    return view('auth.login'); // ログイン画面のBladeテンプレート
    }

    public function store(Request $request)
    {
        // バリデーション　emaillとpasswordが空でないか正しいかチェック
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        /**認証
         * Auth::attempt() でログイン試行。
         * 成功すればセッションを再生成]
         * リダイレクト→redirect()->intended('/') により
         * 元々アクセスしようとしていたページ or / に遷移。
         * Fortifyの 'home' => '/' 設定と連携。
         */
        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }
        // ログイン失敗したらログイン画面に戻りメッセージ表示
        return back()->withErrors([
            'email' => 'ログイン情報が登録されていません',
        ]);
    }    


}
