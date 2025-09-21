<?php
// laravelのルーティング機能を使うための宣言(Route::get（）Route::post（）が使える)
use Illuminate\Support\Facades\Route;
// 会員登録処理を担当するRegisterControllerを読み込むshow()やstore()メソッドが使える
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GoodsController;
use App\Http\Controllers\ItemController;

// PG03 会員登録画面**************************************************************************************
// ブラウザに『localhost/register』と入力してアクセスしたら↓が実装され
// RegisterControllerクラスのshowメソッドが呼び出される。
Route::get('/register', [RegisterController::class, 'show'])->name('register');

// 会員登録画面で入力後、『登録する』ボタンを押下するとフォームが送信される
// postメソッドで/registerにアクセスされたらRegisterControllerクラスの
// store()メソッドを呼び出す
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');


// PG10　プロフィール編集画面*******************************************************************************

//会員登録画面登録OK→プロフィール画面(設定＆編集)に
// 遷移する(表示のみ)
Route::get('/mypage/profile', [ProfileController::class, 'Show'])->name('profile');

// プロフィール画面の登録するボタンを起動を押下したら実装
Route::post('/mypage/profile', [ProfileController::class, 'profileStore'])->name('profile.store');

// PG01 商品一覧画面(トップ画面)****************************************************************************

Route::get('/', [GoodsController::class, 'goods'])->name('show');
Route::post('/', [GoodsController::class, 'store'])->name('goods.store');

// pG05 商品詳細画面***************************************************************************************

Route::get('/item/{id}', [ItemController::class, 'show'])->name('item.show');
Route::post('/item', [ItemController::class, 'store'])->name('item.store');

// // プロフィール設定画面からプロフィール画面へ遷移
// Route::get('/login', [LoginController::class, 'loginshow'])->name('login');

// Route::post('/login', [LoginController::class, 'loginstore'])->name('login.store');
