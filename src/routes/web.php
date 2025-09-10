<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// laravelトップページ用
Route::get('/', function () {
    return view('welcome');
});

// 新規会員登録画面用 (get/post両方必要)
Route::get('/register', [RegisterController::class, 'show']);
Route::post('/register', [RegisterController::class, 'store']);

// プロフィール初回登録画面用
Route::post('/mypage', function () {
    return view('mypage');
});