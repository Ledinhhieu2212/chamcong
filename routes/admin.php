<?php

use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController as AdminAuth;
use App\Http\Controllers\Admin\HomeController as AdminHome;
use App\Http\Controllers\Admin\UserController;

Route::get('/admin/login', [AdminAuth::class, 'index'])->name('admin.login');
Route::post('/admin/login', [AdminAuth::class, 'login'])->name('admin.login');
Route::get('/admin/logout', [AdminAuth::class, 'logout'])->name('admin.logout');
Route::middleware('login.admin')->group(function () {
    Route::get('/admin/home', [AdminHome::class, 'index'])->name('admin.home');
    Route::get('/admin/account', [AccountController::class, 'index'])->name('admin.account');
    Route::resource('/admin/user', UserController::class)->names('admin.user');
});

Route::redirect('/admin', '/admin/login');
