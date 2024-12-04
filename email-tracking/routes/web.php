<?php

use App\Http\Controllers\EmailController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\EmailLog;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/send-email', [EmailController::class, 'sendEmail']);
Route::get('/email-tracking', function (Request $request) {
    $email = $request->query('email');

    if ($email) {
        EmailLog::create([
            'email' => $email,
            'viewed_at' => now(),
        ]);
    }

    // Return a 1x1 transparent GIF
    return response()->stream(function () {
        echo base64_decode("R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw==");
    }, 200, [
        'Content-Type' => 'image/gif',
        'Cache-Control' => 'no-store, no-cache, must-revalidate, max-age=0',
        'Pragma' => 'no-cache',
    ]);
})->name('email.tracking');
