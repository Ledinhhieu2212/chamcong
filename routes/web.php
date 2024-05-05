<?php

use App\Http\Controllers\User\AccountController;
use App\Http\Controllers\User\CalendarController;
use App\Http\Controllers\User\GroupController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\HomeController as UserHome;
use App\Http\Controllers\User\LoginController as UserAuth;

Route::get('/login', [UserAuth::class, 'index'])->name('user.index');
Route::post('/login', [UserAuth::class, 'login'])->name('user.login');
Route::get('/logout', [UserAuth::class, 'logout'])->name('user.logout');

Route::middleware('login')->group(function () {
    Route::get('/home', [UserHome::class, 'index'])->name('user.home');
    Route::get('/account', [AccountController::class, 'index'])->name('user.account');
    Route::get('/group', [GroupController::class, 'index'])->name('user.group');
    Route::get('/calendar/show', [CalendarController::class, 'index'])->name('user.calendar.show');
    Route::get('/calendar/register', [CalendarController::class, 'create'])->name('user.calendar.register');
    Route::post('/calendar', [CalendarController::class, 'store'])->name('user.calendar.store');
});

Route::redirect('/', '/login');
Route::redirect('/admin', '/admin/login');
