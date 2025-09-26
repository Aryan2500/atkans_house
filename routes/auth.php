<?php

use App\Http\Controllers\AuthControler;
use App\Http\Middleware\CheckPermission;
use Illuminate\Support\Facades\Route;

Route::prefix('admin/auth')->middleware('guest')->group(function () {
    Route::get('/login', [AuthControler::class, 'index'])->name('login.page');
    Route::post('/login', [AuthControler::class, 'login'])->name('login');

    Route::get('forgot-password', [AuthControler::class, 'showForgotPasswordForm'])->name('password.request');
    Route::post('forgot-password', [AuthControler::class, 'sendResetLink'])->name('password.email');
    Route::get('reset-password/{token}', [AuthControler::class, 'showResetPasswordForm'])->name('password.reset');
    Route::post('reset-password', [AuthControler::class, 'resetPassword'])->name('password.update');
});


Route::prefix('auth')->middleware('auth', CheckPermission::class)->group(function () {
    Route::get('/logout', [AuthControler::class, 'logout'])->name('logout');
});
