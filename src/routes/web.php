<?php
// laravelのルーティング機能を使うための宣言(Route::get（）Route::post（）が使える)
use Illuminate\Support\Facades\Route;
// 会員登録処理を担当するRegisterControllerを読み込むshow()やstore()メソッドが使える
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

// PG01　商品一覧(トップ画面)-ログイン後*******************************************************************
 //get:ログイン後の商品一覧を表示
Route::get('/', [ItemController::class, 'index'])->name('item.index');

// PG03 会員登録画面**************************************************************************************
// get:会員登録フォームを表示(showは表示という責務が明確)
Route::get('/register', [RegisterController::class, 'show'])->name('register'); 
// フォーム送信後ユーザー情報を保存(storeは保存という責務が明確)
Route::post('/register', [RegisterController::class, 'store'])->name('register.create');

// pG04 ログイン画面***************************************************************************************
// ログインフォーム表示
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
// ログイン処理(認証)
Route::post('/login', [LoginController::class, 'store'])->name('login.store'); 
// ログアウト処理
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');    

// pG05 商品詳細画面***************************************************************************************
// GET /item/{id}：商品詳細ページを表示。{id} は商品ID。
Route::get('/item/{id}', [ItemController::class, 'show'])->name('item.show');
// POST /item：商品登録や編集などの処理（出品機能など）
Route::post('/item', [ItemController::class, 'store'])->name('item.store');

// PG09　プロフィール画面*******************************************************************************
// GET /mypage：プロフィール編集画面を表示。(editは表示の責務)
Route::get('/mypage', [MypageController::class, 'mypage'])->name('mypage');  //会員登録画面で登録後のリダイレクト先

// POST /mypage：編集内容を保存。
Route::post('/mypage', [MypageController::class, 'profilestore'])->name('profile.store'); // プロフィール画面の登録するボタンを起動を押下したら実装

// PG10　プロフィール登録画面*******************************************************************************
// GET /mypage/profile：プロフィール編集画面を表示。(editは表示の責務)
Route::get('/mypage/profile', [ProfileController::class, 'edit'])->middleware('auth')->name('profile.edit');  //会員登録画面で登録後のリダイレクト先

// POST /mypage/profile：編集内容を保存。
Route::post('/mypage/profile', [ProfileController::class, 'profilestore'])->name('profile.store'); // プロフィール画面の登録するボタンを起動を押下したら実装