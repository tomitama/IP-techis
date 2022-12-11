<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('items')->group(function () {
    Route::get('/', [App\Http\Controllers\ItemController::class, 'index'])->name('index');
    Route::get('/add', [App\Http\Controllers\ItemController::class, 'add']);
    Route::post('/add', [App\Http\Controllers\ItemController::class, 'add']);
    // Route::get('/search',[App\Http\Controllers\ItemController::class,'showList'])->name('showList');
});

// Route::get('/item_update',function(){ return view('item_update'); }); 

Route::get('/item_update/{id}',[App\Http\Controllers\ItemUpdateController::class,'item_update']);
//編集画面表示

// 商品編集フォーム⇒UPDATE処理
Route::post('/item_update/{id}', [App\Http\Controllers\ItemUpdateController::class, 'update']);

// 商品編集フォーム⇒DELETE処理
Route::post('/item_delete/{id}', [App\Http\Controllers\ItemUpdateController::class, 'destroy']);
