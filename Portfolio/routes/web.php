<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Front\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

// admin routes

Route::get('/admin/update', [DashboardController::class, 'updatePassword'])->name('admin.updatePassword');

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.login');
    Route::post('/login-process', [DashboardController::class, 'login_process'])->name('admin.login.process');
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');
});
// Route::get('/admin', function () {