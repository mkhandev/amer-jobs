<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobListingController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [HomeController::class, 'index'])->name('home');
//Route::resource('jobs', JobListingController::class);

Route::resource('jobs', JobListingController::class)->middleware('auth')->only(['create', 'edit', 'store', 'update', 'destroy']);
Route::resource('jobs', JobListingController::class)->except(['create', 'edit', 'store', 'update', 'destroy']);

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'login'])->name('login');
    Route::get('/register', [RegisterController::class, 'register'])->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
    Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');
});


Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
