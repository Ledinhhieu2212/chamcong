<?php

use App\Http\Controllers\Admin\Auth\LoginController as AuthLoginController;
use App\Http\Controllers\Admin\ControlUserController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\User\Auth\LoginController;
use App\Http\Controllers\User\HomeController;
use Illuminate\Support\Facades\Route;

//User routes
//Login user
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login-post', [LoginController::class, 'loginPost'])->name('login.post')->middleware('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::redirect('/', '/login');

//User home
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('user-auth');


// Admin routes
Route::prefix('admin')->group(function () {
    // Login admin
    Route::get('/login', [AuthLoginController::class, 'login'])->name('admin.login');
    Route::post('/login', [AuthLoginController::class, 'loginPost'])->name('admin.login.post')->middleware('adminlogin');
    Route::get('/logout', [AuthLoginController::class, 'logout'])->name('admin.logout');

    // Home admin
    Route::get('/home', [AdminHomeController::class, 'index'])->name('admin.home')->middleware('admin-auth');

    // Control use
    Route::prefix('user')->group(function () {
        Route::get('', [ControlUserController::class, 'dashboard'])->name('admin.user')->middleware('admin-auth');
        Route::get('/create', [ControlUserController::class, 'create'])->name('admin.user.create');
        Route::post('/create', [ControlUserController::class, 'store'])->name('admin.user.store');
        Route::get("/update/{id}", [ControlUserController::class, 'edit'])->name('admin.user.edit');
        Route::put('/update/{id}', [ControlUserController::class, 'update'])->name('admin.user.update');
        Route::get("/delete/{id}", [ControlUserController::class, 'delete'])->name('admin.user.delete');
    });
});
Route::redirect('/admin', '/admin/login');
