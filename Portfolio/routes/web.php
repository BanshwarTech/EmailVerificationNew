<?php

use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Middleware\AdminAuth;
use Illuminate\Support\Facades\Route;

Route::prefix('/')->controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/about', 'about')->name('more.about');
});


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

        Route::get('/account/{id?}', 'account')->name('admin.account');
        Route::post('/account/add', 'addAccount')->name('admin.account.add');
        Route::get('/del-account/{id}', 'delAccount')->name('admin.account.delete');
    });

    Route::prefix('admin/about')->controller(AboutUsController::class)->group(function () {
        Route::get('/', 'about')->name('admin.about');
        Route::post('/manage-about', 'manage_about')->name('admin.about.manage');

        Route::get('/experience/{id?}', 'experience')->name('admin.about.experience');
        Route::post('/manage-experience', 'manage_experience')->name('admin.about.manage.experience');
        Route::get('/delete-experience/{id}', 'delExp')->name('admin.about.exp.delete');

        Route::get('/tech-skill/{id?}', 'tech_skill')->name('admin.about.tech.skill');
        Route::post('/manage-tech-skill', 'manage_tech_skill')->name('admin.about.manage.tech.skill');
        Route::get('/delete-tech-skill/{id}', 'delTechSkill')->name('admin.about.tech.skill.del');

        Route::get('/offer/{id?}', 'offer')->name('admin.about.offer');
        Route::post('/manage-offer', 'manage_offer')->name('admin.about.manage.offer');
        Route::get('/delete-offer/{id}', 'delOffer')->name('admin.about.offer.delete');

        Route::get('/interests/{id?}', 'interests')->name('admin.about.interests');
        Route::post('/manage-interests', 'manage_interests')->name('admin.about.manage.interests');
        Route::get('/delete-interests/{id}', 'delInterests')->name('admin.about.interests.delete');

        Route::get('/education/{id?}', 'education')->name('admin.about.education');
        Route::post('/manage-education', 'manage_education')->name('admin.about.manage.education');
    });

    Route::prefix('admin/contact')->name('admin.contact.')->controller(ContactController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/update-contact-details/{id}', 'updateContactDetails')->name('manage');

        Route::get('/contact-message', 'message')->name('message');

        Route::get('/read-message/{id}', 'readMessage')->name('read.message');
    });

    Route::prefix('admin/project')->name('admin.project.')->controller(ProjectController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/manage-project/{id?}', 'manage_project')->name('manage');
        ROute::post('/process-manage-project', 'process_manage_projects')->name('process.manage');
    });
});
