<?php

use App\Http\Controllers\CurrencyController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/exchange-rates', [CurrencyController::class, 'showRates']);
Route::get('/exchange-rates', [CurrencyController::class, 'showRates']);
Route::post('/convert', [CurrencyController::class, 'convert']);
