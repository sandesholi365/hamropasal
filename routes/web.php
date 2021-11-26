<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register'=>false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Admin Dashboard
Route::group(['prefix'=>'admin','middleware'=>'auth'],  function(){
Route::get('/', [AdminController::class,'admin'])->name('admin');
});

//Banner Section
Route::resource('/banner', BannerController::class);
Route::post('banner_status', [App\Http\Controllers\BannerController::class, 'bannerStatus'])->name('banner.status');

//Categories Section
Route::resource('/category', CategoryController::class);
Route::post('category_status', [App\Http\Controllers\CategoryController::class, 'categoryStatus'])->name('category.status');

//Brand Section
Route::resource('/brand', BrandController::class);
Route::post('brand_status', [App\Http\Controllers\BrandController::class, 'brandStatus'])->name('brand.status');