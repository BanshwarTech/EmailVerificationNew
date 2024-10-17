<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/user-view', [App\Http\Controllers\UserController::class, 'userView'])->name('user-view');
Route::get('/add-user', [App\Http\Controllers\UserController::class, 'adduser'])->name('add-user');

Route::post('/user-store', [App\Http\Controllers\UserController::class, 'userStore'])->name('store.user');
