<?php

use App\Http\Controllers\AuthControler;
use App\Http\Controllers\ModelProfileController;
use App\Http\Controllers\OtpController;
use App\Http\Controllers\ParticipationController;
use App\Http\Controllers\VoteController;
use App\Http\Middleware\UserMiddleware;
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
});


Route::prefix('user')->middleware([  UserMiddleware::class])->group(function () {
    Route::get('/dashboard', function () {
        $upcomingEventsCount = 323;
        $myBookingsCount = 333;
        $notificationsCount = 399;
        $profileCompletion = 333;
        $recentActivities =    collect();
        $notifications =    collect();
        return view('user.dashboard.index', compact('upcomingEventsCount', 'myBookingsCount', 'notificationsCount', 'profileCompletion', 'recentActivities', 'notifications'));
    })->name('user.dashboard');

    Route::get('/profile', function () {
        return 'Profile';
    })->name('user.profile');

    Route::get('/events', function () {
        return 'Event';
    })->name('user.events');

    Route::get('/bookings', function () {
        return 'Booking';
    })->name('user.bookings');

    Route::get('/notification', function () {
        return 'Notification';
    })->name('user.notifications');
    Route::get('/settings', function () {
        return 'Settings';
    })->name('user.settings');


    Route::resource('/modelprofile', ModelProfileController::class)->only(['store', 'update']);

    Route::get('/logout', [AuthControler::class, 'logout'])->name('user.logout');

    Route::resource('participate', ParticipationController::class);

    Route::resource('vote', VoteController::class);
});
