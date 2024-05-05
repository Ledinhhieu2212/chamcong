<?php

use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\CalendarController;
use App\Http\Controllers\Admin\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController as AdminAuth;
use App\Http\Controllers\Admin\HomeController as AdminHome;
use App\Http\Controllers\Admin\PositionController;
use App\Http\Controllers\Admin\QrcodeController;
use App\Http\Controllers\Admin\TimekeepController;
use App\Http\Controllers\Admin\UserController;

Route::get('login', [AdminAuth::class, 'index'])->name('admin.login');
Route::post('login', [AdminAuth::class, 'login'])->name('admin.login');
Route::get('logout', [AdminAuth::class, 'logout'])->name('admin.logout');
Route::middleware('login.admin')->group(function () {
    Route::get('home', [AdminHome::class, 'index'])->name('admin.home');
    Route::get('account', [AccountController::class, 'index'])->name('admin.account');
    Route::put('account', [AccountController::class, 'update'])->name('admin.account.update');

    Route::get('position', [PositionController::class, 'index'])->name('admin.position.index');
    Route::post('position/search', [PositionController::class, 'index'])->name('admin.position.search');
    Route::get('position/create', [PositionController::class, 'create'])->name('admin.position.create');
    Route::post('position', [PositionController::class, 'store'])->name('admin.position.store');
    Route::get('position/{id}', [PositionController::class, 'show'])->name('admin.position.show');
    Route::put('position/{id}', [PositionController::class, 'update'])->name('admin.position.update');
    Route::delete('position/{id}', [PositionController::class, 'destroy'])->name('admin.position.destroy');

    Route::get('user', [UserController::class, 'index'])->name('admin.user.index');
    Route::post('user/search', [UserController::class, 'index'])->name('admin.user.search');
    Route::get('user/create', [UserController::class, 'create'])->name('admin.user.create');
    Route::post('user', [UserController::class, 'store'])->name('admin.user.store');
    Route::get('user/{id}', [UserController::class, 'show'])->name('admin.user.show');
    Route::put('user/{id}', [UserController::class, 'update'])->name('admin.user.update');
    Route::delete('user/{id}', [UserController::class, 'destroy'])->name('admin.user.destroy');

    Route::get('qrcode', [QrcodeController::class, 'index'])->name('admin.qrcode.index');
    Route::get('qrcode/create', [QrcodeController::class, 'create'])->name('admin.qrcode.create');
    Route::post('qrcode', [QrcodeController::class, 'store'])->name('admin.qrcode.store');
    Route::delete('qrcode/{id}', [QrcodeController::class, 'destroy'])->name('admin.qrcode.destroy');
    Route::get('qrcode/{id}', [QrcodeController::class, 'show'])->name('admin.qrcode.show');
    Route::put('qrcode/{id}', [QrcodeController::class, 'update'])->name('admin.qrcode.update');



    Route::get('calendar', [CalendarController::class, 'index'])->name('admin.calendar.index');
    Route::get('calendar/create', [CalendarController::class, 'create'])->name('admin.calendar.create');
    Route::post('calendar', [CalendarController::class, 'store'])->name('admin.calendar.store');
    Route::delete('calendar/{id}', [CalendarController::class, 'destroy'])->name('admin.calendar.destroy');

    Route::get('timekeep', [TimekeepController::class, 'index'])->name('admin.timekeep.index');
});

Route::redirect('/admin', '/admin/login');
