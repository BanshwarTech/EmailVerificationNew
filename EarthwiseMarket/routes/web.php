<?php

use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\Front\RegisterLoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontController::class, 'index'])->name('index');

Route::get('/register', [RegisterLoginController::class, 'Register'])->name('Register');

Route::post('/register', [RegisterLoginController::class, 'RegisterProcess'])->name('RegisterProcess');

Route::get('/verification/{id}', [RegisterLoginController::class, 'verification']);
Route::post('/verified', [RegisterLoginController::class, 'verifiedOtp'])->name('verifiedOtp');
Route::get('/resend-otp', [RegisterLoginController::class, 'resendOtp'])->name('resendOtp');
Route::get('/login', [RegisterLoginController::class, 'Login'])->name('Login');
