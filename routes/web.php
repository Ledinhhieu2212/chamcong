<?php

use App\Http\Controllers\User\AccountController;
use App\Http\Controllers\User\CalendarController;
use App\Http\Controllers\User\GroupController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\HomeController as UserHome;
use App\Http\Controllers\User\LoginController as UserAuth;
use App\Http\Controllers\User\SalaryController;
use App\Http\Controllers\User\TimekeepController;

Route::get('/login', [UserAuth::class, 'index'])->name('user.index');
Route::post('/login', [UserAuth::class, 'login'])->name('user.login');
Route::get('/logout', [UserAuth::class, 'logout'])->name('user.logout');

Route::middleware('login')->group(function () {
    Route::get('/home', [UserHome::class, 'index'])->name('user.home');
    Route::get('/account', [AccountController::class, 'index'])->name('user.account');
    Route::get('/group', [GroupController::class, 'index'])->name('user.group');
    Route::get('/calendar/show', [CalendarController::class, 'index'])->name('user.calendar.show');
    Route::post('calendar/search', [CalendarController::class, 'index'])->name('user.calendar.search');
    Route::get('/calendar/register', [CalendarController::class, 'create'])->name('user.calendar.register');
    Route::post('/calendar/register', [CalendarController::class, 'create'])->name('user.calendar.register.search');
    Route::post('/calendar/caledar', [CalendarController::class, 'store'])->name('user.calendar.store');

    Route::get('timekeep', [TimekeepController::class, 'index'])->name('user.timekeep.index');
    Route::post('timekeep', [TimekeepController::class, 'index'])->name('user.timekeep.search');
    Route::get('timekeep/scanner', [TimekeepController::class, 'scanner'])->name('user.timekeep.scanner');
    Route::post('timekeep/scanner', [TimekeepController::class, 'confirm'])->name('user.timekeep.confirm');

    Route::get('salary', [SalaryController::class, 'index'])->name('user.salary.index');
    Route::post('salary', [SalaryController::class, 'index'])->name('user.salary.search');
});


Route::redirect('/', '/login');
Route::redirect('/admin', '/admin/login');

Route::get('error/', function () {
    abort(404);
});
