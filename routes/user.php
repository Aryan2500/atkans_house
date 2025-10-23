<?php

use App\Http\Controllers\AuthControler;
use App\Http\Controllers\ModelProfileController;
use App\Http\Controllers\OtpController;
use App\Http\Controllers\ParticipationController;
use App\Http\Controllers\VoteController;
use App\Http\Middleware\UserMiddleware;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/user', function () {
    return "User Dashboard";
});


Route::prefix('auth')->middleware('guest')->group(function () {

    Route::get('/login', [AuthControler::class, 'userlogin'])->name("user.login");

    Route::post('/login', [AuthControler::class, 'login'])->name('user.doLogin');

    Route::get('/register', function () {

        return view('user.auth.register');
    })->name("user.register");

    Route::post('/send-email-verification-otp', [OtpController::class, 'sendOtp'])
        ->name('otp.email-verification');

    Route::post('/register', [AuthControler::class, 'doRegistration'])->name("user.doRegistration");

    Route::get('/forgot-password', function () {
        return view('user.auth.forgetpassword');
    })->name("user.fpassword");


    Route::post('/forgot-password', [AuthControler::class, 'sendNewPasswordToRegisteredEmail'])->name("user.sendNewPassword");
});


Route::prefix('user')->middleware([UserMiddleware::class])->group(function () {

    Route::get('/profile', function () {
        return view('user.profile.index');
    })->name('user.profile');

    Route::get('/events', function () {
        // $events = Event::all();
        return view('user.events.index');
    })->name('user.events');

    Route::get('/bookings', function () {
        $bookings = Auth::user()->orders;
        return view('user.bookings.index', compact('bookings'));
    })->name('user.bookings');

    Route::get('/notification', function () {
        return 'Notification';
    })->name('user.notifications');
    Route::get('/settings', function () {
        return 'Settings';
    })->name('user.settings');


    Route::resource('/modelprofile', ModelProfileController::class)->only(['store', 'update']);

    Route::post('/upload-image', [ModelProfileController::class, 'uploadImage'])->name('user.upload-image');

    Route::get('/logout', [AuthControler::class, 'logout'])->name('user.logout');

    Route::resource('participate', ParticipationController::class);

    Route::resource('vote', VoteController::class);

    Route::get('/change-password', function () {
        return view('user.change-password.index');
    });

    Route::post('/change-password',  [AuthControler::class, 'updatePassword'])->name('user.change-password');
});
