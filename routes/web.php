<?php

use App\Http\Controllers\Admin\Auth\LoginController as AuthLoginController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\User\Auth\LoginController;
use App\Http\Controllers\User\HomeController;
use Illuminate\Support\Facades\Route;

//User routes
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login-post', [LoginController::class, 'loginPost'])->name('login.post');
Route::redirect('/', '/login');
Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

Route::prefix('admin')->group(function () {
    Route::get('login', [AuthLoginController::class, 'login'])->name('admin.login');
    Route::post('login', [AuthLoginController::class, 'loginPost'])->name('admin.login.post');
    Route::middleware('auth')->group(function () {
        Route::get('/home', [AdminHomeController::class, 'index'])->name('admin.home');
    });
});


Route::redirect('/admin', '/admin/login');
