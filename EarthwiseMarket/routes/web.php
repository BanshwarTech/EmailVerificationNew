<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\Front\RegisterLoginController;
use App\Http\Middleware\AdminAuth;
use Illuminate\Support\Facades\Route;

Route::get('/register', [RegisterLoginController::class, 'Register'])->name('Register');
Route::post('/register', [RegisterLoginController::class, 'RegisterProcess'])->name('RegisterProcess');

Route::get('/verification/{id}', [RegisterLoginController::class, 'verification']);
Route::post('/verified', [RegisterLoginController::class, 'verifiedOtp'])->name('verifiedOtp');
Route::get('/resend-otp', [RegisterLoginController::class, 'resendOtp'])->name('resendOtp');

Route::get('/login', [RegisterLoginController::class, 'Login']);
Route::post('/login-process', [RegisterLoginController::class, 'LoginProcess'])->name('LoginProcess');

Route::get('/logout', [RegisterLoginController::class, "Logout"])->name('Logout');

Route::get('/', [FrontController::class, 'index'])->name('index');
Route::get('/my-account', [FrontController::class, 'myAccount'])->name('myAccount');

// admin 
Route::get('admin', [AdminController::class, 'index']);
Route::post('admin/auth', [AdminController::class, 'auth'])->name('admin.auth');
Route::get('admin/updatePassword', [AdminController::class, 'updatePassword']);

Route::middleware([AdminAuth::class])->group(function () {
    Route::get('admin/dashboard', [AdminController::class, 'Dashboard'])->name('Dashboard');
    // categories section
    Route::get('admin/category', [CategoryController::class, 'index']);
    Route::get('admin/category/manage_category', [CategoryController::class, 'manage_category']);
    Route::get('admin/category/manage_category/{id}', [CategoryController::class, 'manage_category']);
    Route::post('admin/category/manage_category_process', [CategoryController::class, 'manage_category_process'])->name('category.manage_category_process');
    Route::get('admin/category/delete/{id}', [CategoryController::class, 'delete']);
    Route::get('admin/category/status/{status}/{id}', [CategoryController::class, 'status']);
    // coupons section
    Route::get('admin/coupon', [CouponController::class, 'index']);
    Route::get('admin/coupon/manage_coupon', [CouponController::class, 'manage_coupon']);
    Route::get('admin/coupon/manage_coupon/{id}', [CouponController::class, 'manage_coupon']);
    Route::post('admin/coupon/manage_coupon_process', [CouponController::class, 'manage_coupon_process'])->name('coupon.manage_coupon_process');
    Route::get('admin/coupon/delete/{id}', [CouponController::class, 'delete']);
    Route::get('admin/coupon/status/{status}/{id}', [CouponController::class, 'status']);

    Route::get('admin/logout', function () {
        session()->forget('ADMIN_LOGIN');
        session()->forget('ADMIN_ID');
        session()->flash('successMessage', 'Logout sucessfully');
        return redirect('admin');
    });
});
