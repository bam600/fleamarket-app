<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;


// PG03(会員登録画面)------------------------------------------------------------------------------------

// (get/post両方必要)
Route::get('/register', [RegisterController::class, 'show']);

// register.storeでbladeファイルのf
// formボタンを押下した際にバリデーション確認
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

//-----------------------------------------------------------------------------------------------------



// PG10(プロフィール設定)--------------------------------------------------------------------------------

// 新規登録が問題なく完了したらmypageへ遷移する設定
Route::get('/mypage', [RegisterController::class, 'mypage'])->name('mypage');

// プロフィール設定画面からプロフィール画面へ遷移
Route::get('/mypage/profile', [RegisterController::class, 'mypage'])->name('mypage.profile');

//-----------------------------------------------------------------------------------------------------