<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\UserProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QueueController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/queue', QueueController::class)->name('queue.store');

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {

    Route::middleware('guest')->group(function () {
        Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
        Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login.store');
    });

    Route::middleware('auth')->group(function () {
        Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
        Route::get('/change-password', [UserProfileController::class, 'showChangePasswordForm'])->name('change-password');
        Route::put('/change-password', [UserProfileController::class, 'changePassword'])->name('change-password.update');
        Route::get('/profile', [UserProfileController::class, 'edit'])->name('profile');
        Route::put('/profile', [UserProfileController::class, 'update'])->name('profile.update');
        Route::view('/', 'admin.index')->name('index');
        Route::resource('users', UserController::class)->except(['show'])->middleware('admin');
    });
});
