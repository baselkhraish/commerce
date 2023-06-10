<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware(['auth','isAdmin'])->name('admin.')->group(function()
{
    Route::get('/',[AdminController::class,'index'])->name('index');

    // User
    Route::get('/user',[UserController::class,'index'])->name('user');

    // Order
    Route::get('/order',[OrderController::class,'index'])->name('order');
    Route::get('/order/details/{id}',[OrderController::class,'order_details'])->name('order_details');


    // Category
    Route::resource('category',CategoryController::class);
    Route::get('/category-trash',[CategoryController::class,'trash'])->name('category.trash');
    Route::put('/{category}/category-restore',[CategoryController::class,'restore'])->name('category.restore');
    Route::delete('/{category}/category-forceDelete',[CategoryController::class,'forceDelete'])->name('category.forceDelete');


    // Product
    Route::resource('product',ProductController::class);
    Route::get('/product-trash',[ProductController::class,'trash'])->name('product.trash');
    Route::put('/{product}/product-restore',[ProductController::class,'restore'])->name('product.restore');
    Route::delete('/{product}/product-forceDelete',[ProductController::class,'forceDelete'])->name('product.forceDelete');

});



//
