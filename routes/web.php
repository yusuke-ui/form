<?php

// use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ContactsController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

//お問い合わせ入力ページ
Route::get('/', [ContactsController::class, 'index'])->name('contact');

//確認ページ
Route::post('/confirm', [ContactsController::class, 'confirm'])->name('confirm');

//DB挿入、メール送信
Route::post('/process', [ContactsController::class, 'process'])->name('process');

//完了ページ
Route::get('/complete', [ContactsController::class, 'complete'])->name('complete');


