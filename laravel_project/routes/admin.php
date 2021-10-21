<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FieldController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Brand;



Route::middleware(['isAdmin'])->group(function () {
});



Route::get('/', function () {
    return view('admin.index', ["Brand" => Brand::class, "Product" => Product::class, "DB" => DB::class]);
});

/*-----------------  field  ------------------*/

Route::prefix('field')->group(function () {
    Route::get('/', [FieldController::class, 'index']);
    Route::get('/add', [FieldController::class, 'create']);
    Route::post('/add', [FieldController::class, 'store']);
    Route::get('/edit/{field}', [FieldController::class, 'edit']);
    Route::post('/edit/{field}', [FieldController::class, 'update']);
    Route::get('/delete/{field}', [FieldController::class, 'destroy']);
});
/*-----------------  field  ------------------*/

/*-----------------  brand  ------------------*/

Route::prefix('brand')->group(function () {
    Route::get('/', [BrandController::class, 'index']);
    Route::get('/add', [BrandController::class, 'create']);
    Route::post('/add', [BrandController::class, 'store']);
    Route::get('/edit/{brand}', [BrandController::class, 'edit']);
    Route::get('/getbyfield/{field_id}', [BrandController::class, 'getBrandsbyField']);
    Route::post('/edit/{brand}', [BrandController::class, 'update']);
    Route::get('/delete/{brand}', [BrandController::class, 'destroy']);
});
/*-----------------  brand  ------------------*/

/*-----------------  product  ------------------*/

Route::prefix('product')->group(function () {
    Route::get('/', [ProductController::class, 'index']);
    Route::get('/add', [ProductController::class, 'create']);
    Route::post('/add', [ProductController::class, 'store']);
    Route::get('/edit/{product}', [ProductController::class, 'edit']);
    Route::post('/edit/{product}', [ProductController::class, 'update']);
    Route::get('/delete/{product}', [ProductController::class, 'destroy']);
});
/*-----------------  product  ------------------*/

/*---------------  user  --------------*/
Route::prefix('user')->group(function () {
    Route::get('/', [UserController::class, 'index']);
    Route::get('/add', [UserController::class, 'create']);
    Route::post('/add', [UserController::class, 'store']);
    Route::get('/edit/{user}', [UserController::class, 'edit']);
    Route::post('/edit/{user}', [UserController::class, 'update']);
    Route::get('/delete/{user}', [UserController::class, 'destroy']);
});
/*--------------  user  --------------*/

/*-----------------  order  ------------------*/

Route::prefix('order')->group(function () {
    Route::get('/', [OrderController::class, 'index']);
    Route::get('detail/{order}', [OrderController::class, 'order_detail']);
    Route::get('delete/{order}', [OrderController::class, 'destroy']);
    Route::get('statusUpdate/{order}', [OrderController::class, 'update']);
});

    /*-----------------  order  ------------------*/
