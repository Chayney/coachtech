<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SellController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\CommentController;

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

// 商品一覧ページ
Route::get('/', [ItemController::class, 'index']);

// 商品詳細ページ
Route::get('/item/{item_id}', [ItemController::class, 'detail']);
Route::get('/purchase/{item_id}', [PurchaseController::class, 'index']);

// コメント一覧ページ
Route::get('/comment', [CommentController::class, 'index']);

// 出品者用コメント一覧ページ(コメント削除専用)
Route::get('/comment/edit', [CommentController::class, 'edit']);

Route::middleware(['auth'])->group(function () {
    // マイページ、プロフィールページ
    Route::get('/mypage', [ProfileController::class, 'index']);
    Route::get('/mypage/profile', [ProfileController::class, 'edit']);
    Route::post('/profile/update', [ProfileController::class, 'update']);

    // 出品ページ
    Route::get('/sell', [SellController::class, 'index']);
    Route::post('/sell/register', [SellController::class, 'create']);

    // 購入ページ
    Route::post('/purchase', [PurchaseController::class, 'create']);

    // 住所登録ページ
    Route::get('/purchase/address/{item_id}', [PurchaseController::class, 'edit']);
    Route::patch('/purchase/{item_id}', [PurchaseController::class, 'update']);

    // お気に入り追加と削除
    Route::post('/favorite/store', [FavoriteController::class, 'store']);
    Route::delete('/favorite/destroy{shop}', [FavoriteController::class, 'destroy']);

    // コメント追加と削除
    Route::post('/comment/create', [CommentController::class, 'create']);
    Route::delete('/comment/destroy', [CommentController::class, 'destroy']);
});



