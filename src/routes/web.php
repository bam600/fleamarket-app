<?php
// laravelのルーティング機能を使うための宣言(Route::get（）Route::post（）が使える)
use Illuminate\Support\Facades\Route;
// 会員登録処理を担当するRegisterControllerを読み込むshow()やstore()メソッドが使える
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;

// PG03:会員登録画面------------------------------------------------------------------------------------
// (get/post両方必要)
// Route::get()がURL(/register)にアクセスしたときの処理
// getはregister.bladeの画面をただ見せるだけ
// [RegisterController::class, 'show']→RegisterController の 
// show() メソッドを呼び出す。
// name('register')：このルートに register という名前を付ける。Blade側で route('register') として使える。
Route::get('/register', [RegisterController::class, 'show'])->name('register');

//ユーザーがフォームに入力して『登録する』ボタンを押したときに呼ばれる
//storeメソッドはRegisterRequestを使用しバリデーションを行いデータベースに保存する。(エラーがあったら元の画面に戻しエラーメッセージ)
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

// PG10:プロフィール設定-----------------------------------------------------------------------------------------

//会員登録画面が問題なく進んだらプロフィール画面に遷移する(表示のみ)
Route::get('/mypage/profile', [RegisterController::class, 'mypage'])->name('mypage');


//PG01：商品一覧(トップ)画面--------------------------------------------------------------------------------------------
// プロフィール設定画面からプロフィール画面へ遷移
Route::get('/login', [LoginController::class, 'loginshow'])->name('login');
// Route::get('/login', [RegisterController::class, 'mypage'])->name('mypage.profile');

Route::post('/login', [LoginController::class, 'loginstore'])->name('login.store');
