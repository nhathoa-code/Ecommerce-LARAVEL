<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\client_controller\IndexController;
use App\Http\Controllers\client_controller\ProductController;
use App\Http\Controllers\client_controller\CartController;
use App\Http\Controllers\client_controller\OrderController;
use App\Http\Controllers\client_controller\ReviewController;
use App\Mail\orderComplete;
use Illuminate\Support\Facades\Mail;
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

Route::get('/', [IndexController::class, 'index']);

Route::get('product/{product:slug}', [ProductController::class, 'index'])->where(['product' => '^(?!(list|searchAjax|search)$).*$']);

Route::get('/{field}', [ProductController::class, 'list'])->where(['field' => '^(?!(cart|order|admin|login|logout)$)\w+$']);

Route::get('product/list', [ProductController::class, 'getproductsAjax']);

Route::get('product/searchAjax', [ProductController::class, 'searchAjax']);

Route::get('product/search', [ProductController::class, 'search']);


/*------------- cart ----------------*/

Route::get('cart/{product}', [CartController::class, 'add_to_cart'])->where(['product' => '[0-9]+']);

Route::get('cart/delete/{product}', [CartController::class, 'delete_item']);

Route::get('cart/update/{product}', [CartController::class, 'update']);

Route::get('cart', [CartController::class, 'index']);

/*-------------- cart ----------------*/

/*------------- order ----------------*/

Route::get('order', [OrderController::class, 'show']);

Route::post('order', [OrderController::class, 'process']);

/*------------- order ----------------*/


/*------------- review ----------------*/

Route::get('review/add', [ReviewController::class, 'add']);

Route::post('review/reply/add', [ReviewController::class, 'addreply']);

Route::post('review/reply/addchild', [ReviewController::class, 'addchildreply']);

/*------------- review ----------------*/

Route::get('dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
