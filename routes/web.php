<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/',[ProductController::class,"home"]);
Route::get('/shop/{category?}',[ProductController::class,"shop"]);
Route::get('login',[UserController::class,'login'])->name('login');
Route::post('login',[UserController::class,'userLogin'])->name('userLogin');
Route::get('register',[UserController::class,'register'])->name('register');
Route::post('logout',[UserController::class,'logout'])->name('logout');
Route::post('register',[UserController::class,'userRegister'])->name('userRegister');
Route::middleware('auth')->group(function(){
    Route::get('/add-to-cart/{id}',[CartController::class,"addToCart"]);
    // Route::get('/add-to-cart/{id}',[CartController::class,"addToCart"]);
    Route::post('/deleteFromCart',[CartController::class,"deleteFromCart"])->name('deleteFromCart');
    Route::post('/update_quantity',[CartController::class,"updateQuantity"])->name('quantityUpdate');
    
});
