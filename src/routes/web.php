<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SellController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AdminController;

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
Route::get('/search', [ItemController::class, 'search']);

// 商品詳細ページ
Route::get('/item/{item_id}', [ItemController::class, 'detail']);

// 購入ページ
Route::get('/purchase/{item_id}', [PurchaseController::class, 'index']);

// コメント一覧ページ
Route::get('/comment', [CommentController::class, 'index']);

Route::middleware(['auth'])->group(function () {
    // マイページ、プロフィールページ
    Route::get('/mypage', [ProfileController::class, 'index']);
    Route::get('/mypage/profile', [ProfileController::class, 'edit']);
    Route::post('/profile/update', [ProfileController::class, 'update']);

    // 出品ページ
    Route::get('/sell', [SellController::class, 'index']);
    Route::post('/sell/register', [SellController::class, 'create']);

    // 決済処理
    Route::post('/purchase', [PurchaseController::class, 'create']);

    // 支払先変更ページ
    Route::get('/purchase/pay/{item_id}', [PurchaseController::class, 'revise']);
    Route::patch('/purchase/{item_id}/pay', [PurchaseController::class, 'store']);

    // 住所変更ページ
    Route::get('/purchase/address/{item_id}', [PurchaseController::class, 'edit']);
    Route::patch('/purchase/{item_id}/address', [PurchaseController::class, 'update']);

    // お気に入り追加と削除
    Route::post('/favorite/store', [FavoriteController::class, 'store']);
    Route::delete('/favorite/destroy', [FavoriteController::class, 'destroy']);

    // コメント追加
    Route::post('/comment/create', [CommentController::class, 'create']);

    // 出品者用コメント一覧ページとコメント削除
    Route::get('/comment/edit', [CommentController::class, 'edit']);
    Route::delete('/comment/destroy', [CommentController::class, 'destroy']);

    // 管理者専用ページ
    Route::middleware(['role:admin'])->group(function () {
        // 管理者マイページ
        Route::get('/admin', [AdminController::class, 'index']);

        // ユーザー一覧ページ、ユーザー削除処理
        Route::get('/admin/user', [AdminController::class, 'edit']);
        Route::get('/admin/user/search', [AdminController::class, 'search']);
        Route::delete('/admin/user/destroy', [AdminController::class, 'destroy']);

        // コメント一覧ページ、コメント削除処理
        Route::get('/admin/comment', [AdminController::class, 'show']);
        Route::get('/admin/comment/search', [AdminController::class, 'look']);
        Route::delete('admin/comment/destroy', [AdminController::class, 'remove']);

        // メール作成ページ
        Route::get('/admin/email', [AdminController::class, 'mail']);
        Route::post('/admin/send-email', [AdminController::class, 'send']);
    });
});