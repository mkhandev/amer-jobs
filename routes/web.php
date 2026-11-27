<?php


use App\Http\Controllers\Admin\JobController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GeocodeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobListingController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
//Route::resource('jobs', JobListingController::class);
Route::get('/jobs/search', [JobListingController::class, 'search'])->name('jobs.search');

Route::resource('jobs', JobListingController::class)->middleware('auth')->only(['create', 'edit', 'store', 'update', 'destroy']);
Route::resource('jobs', JobListingController::class)->except(['create', 'edit', 'store', 'update', 'destroy']);

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'login'])->name('login');
    Route::get('/register', [RegisterController::class, 'register'])->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
    Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');
});

Route::middleware('auth')->group(function () {
    Route::get('/bookmarks', [BookmarkController::class, 'index'])->name('bookmarks.index');
    Route::post('/bookmarks/{jobListing}', [BookmarkController::class, 'store'])->name('bookmarks.store');
    Route::delete('/bookmarks/{jobListing}', [BookmarkController::class, 'destroy'])->name('bookmarks.destroy');

    Route::post('/jobs/{jobListing}/apply', [ApplicantController::class, 'store'])->name('applicant.store');
    Route::delete('/applicant/{jobListing}', [ApplicantController::class, 'destroy'])->name('applicant.destroy');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update')->middleware('auth');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/geocode', [GeocodeController::class, 'geocode']);

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])
        ->name('dashboard.index');

    Route::resource('/jobs', JobController::class);
    Route::resource('/permissions', PermissionController::class)->only(['index', 'create', 'edit', 'store', 'update']);
    Route::resource('/roles', RoleController::class);

    Route::resource('/users', UserController::class)->only('index', 'create', 'store', 'edit', 'update');
});
