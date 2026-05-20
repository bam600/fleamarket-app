<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

// fortifyという機能を使えるようにする
use Laravel\Fortify\Fortify;

// ユーザー登録時の処理クラスを読み込む
use App\Actions\Fortify\CreateNewUser;
// プロフィール更新に使用するクラス
use App\Actions\Fortify\UpdateUserProfileInformation;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\ResetUserPassword;


class FortifyServiceProvider extends ServiceProvider
{   
    // register()は準備
    public function register():void
    {

    }
    // boot()は設定開始
    public function boot():void
    {

        // アクションクラスの登録(laravelの自動生成)
        // ユーザー登録時にCreateNewUserアクションを使用
        Fortify::createUsersUsing(CreateNewUser::class);
        // プロフィール更新時のアクションを指定
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        // パスワード更新時のアクションを指定
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        // パスワードリセット時のアクションを指定
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        // ログイン試行回数の制限（ブルートフォース攻撃対策）
        RateLimiter::for('login', function (Request $request) {
            $throttleKey = Str::transliterate(Str::lower($request->input(Fortify::username())) . '|' . $request->ip());
            // 	1分間に5回までに制限
            return Limit::perMinute(5)->by($throttleKey);
        });

        // ユーザー登録フォームのビューを指定
        Fortify::registerView(function () {
            return view('auth.register');
        });

        // ログインフォームのビューを指定
        Fortify::loginView(function () {
            return view('auth.login');
        });

    }
}


