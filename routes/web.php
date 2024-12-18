<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Author\PostController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;


Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);


Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);


Route::middleware('auth')->group(function () {

    Route::get('/admin/dashboard', [DashboardController::class, 'adminDashboard'])
    ->middleware('role:admin')
    ->name('admin.dashboard');


Route::get('/author/dashboard', [DashboardController::class, 'authorDashboard'])
    ->middleware('role:author')
    ->name('author.dashboard');
});


Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('categories', CategoryController::class);
});


Route::middleware(['auth', 'role:author'])->prefix('author')->name('author.')->group(function () {
    Route::resource('posts', PostController::class);
});
