<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ProfileController;

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

Route::get('/', [ItemController::class, 'index']);

Route::middleware(['auth'])->group(function () {
    Route::get('/mypage', [ProfileController::class, 'index']);
    Route::get('/mypage/profile', [ProfileController::class, 'edit']);
    Route::post('/profile/update', [ProfileController::class, 'update']);
});




Route::get('/address', [ItemController::class, 'address']);

Route::get('/profile', [ItemController::class, 'profile']);

Route::get('/item', [ItemController::class, 'detail']);

Route::get('/sell', [ItemController::class, 'sell']);
Route::post('/sell/register', [ItemController::class, 'create']);