<?php

use App\Http\Controllers\Admin\CalendarController;
use App\Http\Controllers\Admin\CRUDUserController as CrudUser;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\TimekeepController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\User\HomeController;
use Illuminate\Support\Facades\Route;

//User routes
//Login user
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login-post', [LoginController::class, 'loginPost'])->name('login.post')->middleware('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

//User home
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('user-auth');


// Admin routes
Route::prefix('admin')->middleware('admin-auth')->group(function () {

    // Home admin
    Route::get('/home', [AdminHomeController::class, 'index'])->name('admin.home');

    // Control use
    Route::prefix('user')->group(function () {
        Route::get('', [CrudUser::class, 'dashboard'])->name('admin.user');
        Route::get('/create', [CrudUser::class, 'create'])->name('admin.user.create');
        Route::post('/create', [CrudUser::class, 'store'])->name('admin.user.store');
        Route::get("/update/{id}", [CrudUser::class, 'edit'])->name('admin.user.edit');
        Route::put('/update/{id}', [CrudUser::class, 'update'])->name('admin.user.update');
        Route::get("/delete/{id}", [CrudUser::class, 'delete'])->name('admin.user.delete');
    });

    Route::get('calendar', [CalendarController::class,'index'])->name('admin.calendar');
    Route::get('timekeep', [TimekeepController::class,'index'])->name('admin.timekeep');
});
Route::redirect('/', '/login');
Route::redirect('/admin', '/login');
