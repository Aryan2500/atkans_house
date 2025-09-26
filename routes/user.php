<?php

use App\Http\Controllers\AuthControler;
use App\Http\Controllers\OtpController;
use App\Http\Middleware\UserMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/user', function () {
    return "User Dashboard";
});


Route::prefix('auth')->middleware('guest')->group(function () {
    Route::get('/login', function () {
        return view('user.auth.login');
    })->name("user.login");

    Route::post('/login', [AuthControler::class, 'login'])->name('user.doLogin');

    Route::get('/register', function () {

        return view('user.auth.register');
    })->name("user.register");

    Route::post('/send-email-verification-top', [OtpController::class, 'sendOtp'])
        ->name('otp.email-verification');

    Route::post('/register', [AuthControler::class, 'doRegistration'])->name("user.doRegistration");
});


Route::prefix('user')->middleware(['auth', UserMiddleware::class])->group(function () {
    Route::get('/dashboard', function () {
        return 'User Dashboard';
    })->name('user.dashboard');


    Route::get('/logout', [AuthControler::class, 'logout'])->name('user.logout');
});
