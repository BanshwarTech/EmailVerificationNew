<?php

use App\Http\Controllers\Admin\AboutUsController;
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
    });

    Route::prefix('admin/about')->controller(AboutUsController::class)->group(function () {
        Route::get('/', 'about')->name('admin.about');
        Route::post('/manage-about', 'manage_about')->name('admin.about.manage.about');
        Route::get('/experience', 'experience')->name('admin.about.experience');
        Route::post('/manage-experience', 'manage_experience')->name('admin.about.manage.experience');
        Route::get('/tech-skill', 'tech_skill')->name('admin.about.tech.skill');
        Route::post('/manage-tech-skill', 'manage_tech_skill')->name('admin.about.manage.tech.skill');
        Route::get('/offer', 'offer')->name('admin.about.offer');
        Route::post('/manage-offer', 'manage_offer')->name('admin.about.manage.offer');
        Route::get('/interests', 'interests')->name('admin.about.interests');
        Route::post('/manage-interests', 'manage_interests')->name('admin.about.manage.interests');
    });
});
