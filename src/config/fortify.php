<?php

// 「Laravel\Fortify の中にある Features クラスを、
// このファイルで使えるようにする」
use Laravel\Fortify\Features;

return [
    // 認証ガードの設定（デフォルトは'web'）
    'guard' => 'web',
    // パスワードに使用するブローカーの設定
    'passwords' => 'users',
    'username' => 'email',
    'email' => 'email',
    'views' => true,
    'home' => '/',
    // 有効かする機能の設定(登録、登録パスワードリセットなど)
    'features' => [
        // 登録
        Features::registration(),
        // パスワードリセット
        Features::resetPasswords(),
        // メール認証
        Features::emailVerification(),
    ],
];
