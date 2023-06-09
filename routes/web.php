<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Site\SiteController;
use Illuminate\Support\Facades\Route;

Route::prefix('/')->name('site.')->group(function(){
    Route::get('/',[SiteController::class,'index'])->name('index');
    Route::get('/shop',[SiteController::class,'shop'])->name('shop');
    Route::get('/shop/{id}',[SiteController::class,'category'])->name('category');
    Route::get('/product/{id}',[SiteController::class,'product'])->name('product');

   

});


require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
