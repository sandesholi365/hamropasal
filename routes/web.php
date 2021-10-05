<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BannerController;
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
Route::resource('banner', BannerController::class);
Route::post('banner_status', [App\Http\Controllers\BannerController::class, 'bannerStatus'])->name('banner.status');
