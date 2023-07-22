<?php

use App\Http\Controllers\dashboard\ProductController;
use App\Http\Controllers\dashboard\UserController;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/',function(){
    return view('home');
});

Route::get('/home',[HomeController::class,'index'])->name('home');

Route::get('/register',[RegisterController::class,'index'])->name('register');
Route::post('/register',[RegisterController::class,'save'])->name('registration');


Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/login',[LoginController::class,'save'])->name('loging');

Route::get('/logout',[LoginController::class,'logout'])->name('logout');

Route::get('/dashboard',[DashBoardController::class,'index'])->name('dashboard');

Route::get('/dashboard/users/display',[UserController::class,'display'])->name('user.display');
Route::get('/dashboard/users/create',[UserController::class,'create'])->name('user.create');
Route::post('/dashboard/users/store',[UserController::class,'store'])->name('user.store');

Route::resource('/product',ProductController::class);