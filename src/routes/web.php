<?php
// laravelのルーティング機能を使うための宣言(Route::get（）Route::post（）が使える)
use Illuminate\Support\Facades\Route;
// 会員登録処理を担当するRegisterControllerを読み込むshow()やstore()メソッドが使える
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

// PG01　商品一覧(トップ画面)-ログイン後*******************************************************************
Route::get('/', [HomeController::class, 'index'])->name('home'); //ログイン
Route::post('/',[HomeController::class, 'store'])->name('goods.store');

// PG03 会員登録画面**************************************************************************************
/**
 * Route::get():HTTP GETメソッドでアクセスされたときのルート定義
 * /register':ブラウザでアクセスするURL（例：http://localhost/register）
 * [RegisterController::class, 'show']:RegisterController の show() メソッドを呼び出す
 * ->name('register'):このルートに register という名前を付ける（Bladeなどで使える）
 */
Route::get('/register', [RegisterController::class, 'show'])->name('register'); 

/**
 * Route::post():HTTP POSTメソッドでアクセスされたときのルート定義
 * /register':フォーム送信先のURL（GETと同じURLでもメソッドが違う）
 * [RegisterController::class, 'store']:RegisterController の store() メソッドを呼び出す
 * ->name('register.store'):このルートに register.store という名前を付ける
 */
Route::post('/register', [RegisterController::class, 'store'])->name('register.create');

// pG04 ログイン画面***************************************************************************************
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');   // ログイン
Route::post('/login', [AuthenticatedSessionController::class, 'store']);// ログイン処理（POST）

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');     // ログアウト

// pG05 商品詳細画面***************************************************************************************
Route::get('/item/{id}', [ItemController::class, 'details'])->name('details');
Route::post('/item', [ItemController::class, 'store'])->name('item.store');

// PG10　プロフィール編集画面*******************************************************************************
/**
 * ユーザプロフィール編集するための画面を表示
 * /mypage/profileにアクセスすると
 * ProfileController の edit()メソッドが呼び出され
 * view('mypage.profile') などのBladeテンプレートが表示される
 */
Route::get('/mypage/profile', [ProfileController::class, 'edit'])->name('profile.edit');  //会員登録画面で登録後のリダイレクト先

Route::post('/mypage/profile', [ProfileController::class, 'profilestore'])->name('profile.store'); // プロフィール画面の登録するボタンを起動を押下したら実装

