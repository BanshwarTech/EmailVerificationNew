<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Middleware\AdminAuth;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

// admin routes

Route::get('/admin/update', [DashboardController::class, 'updatePassword'])->name('admin.updatePassword');

Route::get('/admin', [DashboardController::class, 'index'])->name('admin.login');
Route::post('/login-process', [DashboardController::class, 'login_process'])->name('admin.login.process');
Route::middleware([AdminAuth::class])->group(function () {

    Route::prefix('admin/')->controller(DashboardController::class)->group(function () {
        Route::get('dashboard', 'dashboard')->name('admin.dashboard');
        Route::get('logout', 'logout')->name('admin.logout');
    });

    Route::prefix('admin/home')->controller(IndexController::class)->group(function () {
        Route::get('/', 'getHomeData')->name('admin.home.data');
        Route::post('/update', 'updateHomeData')->name('admin.home.update');
        Route::get('connection', 'getConnection')->name('admin.home.connection');
        Route::get('/account', 'account')->name('admin.account');
        Route::post('/account/add', 'addAccount')->name('admin.account.add');
        Route::get('about', 'about')->name('admin.about');
    });
});
