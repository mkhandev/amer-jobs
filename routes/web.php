<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobListingController;
use Illuminate\Support\Facades\Route;
use PHPUnit\Util\PHP\Job;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::resource('jobs', JobListingController::class);
