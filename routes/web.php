<?php

use App\Http\Controllers\Auth\LoginController as AuthLoginController;
use App\Http\Controllers\Admin\CRUDUserController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Auth\LoginController;
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
Route::prefix('admin')->middleware('admin-auth')->group(function () {

    // Home admin
    Route::get('/home', [AdminHomeController::class, 'index'])->name('admin.home');

    // Control use
    Route::prefix('user')->group(function () {
        Route::get('', [CRUDUserController::class, 'dashboard'])->name('admin.user');
        Route::get('/create', [CRUDUserController::class, 'create'])->name('admin.user.create');
        Route::post('/create', [CRUDUserController::class, 'store'])->name('admin.user.store');
        Route::get("/update/{id}", [CRUDUserController::class, 'edit'])->name('admin.user.edit');
        Route::put('/update/{id}', [CRUDUserController::class, 'update'])->name('admin.user.update');
        Route::get("/delete/{id}", [CRUDUserController::class, 'delete'])->name('admin.user.delete');
    });
});
Route::redirect('/admin', '/login');
