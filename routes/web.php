<?php

use App\Http\Controllers\Admin\CalendarController as AdminCalendar;
use App\Http\Controllers\Admin\CRUDUserController as CrudUser;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\QrcodeController as CrudQrcode;
use App\Http\Controllers\Admin\TimekeepController;
use App\Http\Controllers\User\TimekeepController as UserTimekeep;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\User\Calendars\SearchController as SearchCalendar;
use App\Http\Controllers\User\Calendars\RegisterController as RegisterCalendar;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\ProfileController;
use Illuminate\Support\Facades\Route;

//User routes
//Login user
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login-post', [LoginController::class, 'loginPost'])->name('login.post')->middleware('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

//User home

Route::middleware('user-auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/calendar', [SearchCalendar::class, 'index'])->name('calendar');
    Route::post('/calendar', [SearchCalendar::class, 'index'])->name('calendar.search');
    Route::get('/register-calendar', [RegisterCalendar::class, 'create'])->name('register.calendar');
    Route::post('/register-calendar', [RegisterCalendar::class, 'store'])->name('register.calendar.store');
});



// Admin routes
Route::prefix('admin')->middleware('admin-auth')->group(function () {

    // Home admin
    Route::get('/home', [AdminHomeController::class, 'index'])->name('admin.home');

    // Control use
    Route::prefix('user')->group(function () {
        Route::get('/', [CrudUser::class, 'create'])->name('admin.user.create');
        Route::get('/search', [CrudUser::class, 'search'])->name('admin.user.search');
        Route::post('/create', [CrudUser::class, 'store'])->name('admin.user.store');
        Route::get("/update/{id}", [CrudUser::class, 'edit'])->name('admin.user.edit');
        Route::put('/update/{id}', [CrudUser::class, 'update'])->name('admin.user.update');
        Route::get("/delete/{id}", [CrudUser::class, 'delete'])->name('admin.user.delete');
        Route::get("/delete-all", [CrudUser::class, 'deleteAll'])->name('admin.user.delete.all');
    });

    Route::prefix('qrcode')->group(function () {
        Route::get('', [CrudQrcode::class, 'index'])->name('admin.qrcode.create');
        Route::get('/{id}', [CrudQrcode::class, 'generateQrCode'])->name('admin.qrcode.generate');
        Route::post('/create', [CrudQrcode::class, 'store'])->name('admin.qrcode.store');
        Route::get("/update/{id}", [CrudQrcode::class, 'edit'])->name('admin.qrcode.edit');
        Route::put('/update/{id}', [CrudQrcode::class, 'update'])->name('admin.qrcode.update');
        Route::get("/delete/{id}", [CrudQrcode::class, 'delete'])->name('admin.qrcode.delete');
    });

    Route::prefix('calendar')->group(function () {
        Route::get('', [AdminCalendar::class, 'index'])->name('admin.calendar');
        Route::post('/create', [AdminCalendar::class, 'store'])->name('admin.calendar.store');
        Route::get("/update/{id}", [AdminCalendar::class, 'edit'])->name('admin.calendar.edit');
        Route::put('/update/{id}', [AdminCalendar::class, 'update'])->name('admin.calendar.update');
        Route::get("/delete/{id}", [AdminCalendar::class, 'delete'])->name('admin.calendar.delete');
    });

    Route::get('timekeep', [TimekeepController::class, 'index'])->name('admin.timekeep');
});
Route::redirect('/', '/login');
Route::redirect('/admin', '/login');


Route::get('test', function () {
    return view('test.index');
});
