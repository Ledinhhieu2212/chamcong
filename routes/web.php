<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\HomeController as UserHome;
use App\Http\Controllers\User\LoginController as UserAuth;






Route::get('/login', [UserAuth::class, 'index'])->name('user.index');
Route::post('/login', [UserAuth::class, 'login'])->name('user.login');
Route::get('/logout', [UserAuth::class, 'logout'])->name('user.logout');

Route::middleware('login')->group(function () {
    Route::get('/home', [UserHome::class, 'index'])->name('user.home');
});




// Route::group(['prefix' => 'admin'], function () {
//     require __DIR__ . '/admin.php';
// });

Route::redirect('/', '/login');
