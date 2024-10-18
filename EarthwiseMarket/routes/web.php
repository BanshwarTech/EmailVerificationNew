<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\Front\RegisterLoginController;
use App\Http\Middleware\AdminAuth;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontController::class, 'index'])->name('index');

Route::get('/register', [RegisterLoginController::class, 'Register'])->name('Register');

Route::post('/register', [RegisterLoginController::class, 'RegisterProcess'])->name('RegisterProcess');

Route::get('/verification/{id}', [RegisterLoginController::class, 'verification']);
Route::post('/verified', [RegisterLoginController::class, 'verifiedOtp'])->name('verifiedOtp');
Route::get('/resend-otp', [RegisterLoginController::class, 'resendOtp'])->name('resendOtp');

Route::get('/login', [RegisterLoginController::class, 'Login']);
Route::post('/login-process', [RegisterLoginController::class, 'LoginProcess'])->name('LoginProcess');

Route::get('/logout', [RegisterLoginController::class, "Logout"])->name('Logout');


Route::get('/my-account', [FrontController::class, 'myAccount'])->name('myAccount');

// admin 
Route::get('admin', [AdminController::class, 'index']);
Route::post('admin/auth', [AdminController::class, 'auth'])->name('admin.auth');
Route::get('admin/updatePassword', [AdminController::class, 'updatePassword']);
Route::middleware([AdminAuth::class])->group(function () {
    Route::get('admin/dashboard', [AdminController::class, 'Dashboard'])->name('Dashboard');



    Route::get('admin/logout', function () {
        session()->forget('ADMIN_LOGIN');
        session()->forget('ADMIN_ID');
        session()->flash('successMessage', 'Logout sucessfully');
        return redirect('admin');
    });
});
