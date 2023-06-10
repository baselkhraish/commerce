<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Site\SiteController;
use App\Models\Cart;
use Illuminate\Support\Facades\Route;

Route::prefix('/')->name('site.')->group(function(){
    Route::get('/',[SiteController::class,'index'])->name('index');
    Route::get('/shop',[SiteController::class,'shop'])->name('shop');
    Route::get('/shop/{id}',[SiteController::class,'category'])->name('category');
    Route::get('/product/{id}',[SiteController::class,'product'])->name('product');
});

 // Cart operation routes
 Route::middleware('auth')->group(function(){
 Route::post('add-to-cart',[CartController::class,'add_to_cart'])->name('add_to_cart');
 Route::get('remove-cart/{id}',[CartController::class,'remove_cart'])->name('remove_cart');
 Route::get('cart',[CartController::class,'cart'])->name('cart');
 Route::post('update-cart',[CartController::class,'update_cart'])->name('update_cart');

 Route::get('checkout',[CartController::class,'checkout'])->name('checkout');
 Route::get('checkout/thanks',[CartController::class,'checkout_thanks'])->name('checkout_thanks');

});

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
