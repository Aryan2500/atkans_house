<?php

use App\Http\Controllers\AuthControler;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HireRequestController;
use App\Http\Controllers\InfluencerController;
use App\Http\Controllers\MilestoneController;
use App\Http\Controllers\ModelController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PhotoShootBookingController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RampWalkApplicationController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\SponsorshipController;
use App\Http\Controllers\StoryContestController;
use App\Http\Controllers\SubscribeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VolunteerController;
use App\Http\Controllers\VoteImageController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\CheckPermission;
use App\Models\Sponsership;
use App\Models\Sponsorship;
use Illuminate\Support\Facades\Route;


Route::get('adminv2/dashboard', function () {
    $header = 'Dashboards';
    return view('adminV2.dashboard.dashboard', compact('header'));
});

Route::prefix('adminv2')->middleware(['auth', AdminMiddleware::class])->group(function () {
    // Route::prefix('admin')->middleware(['auth', CheckPermission::class])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    // Models
    Route::resource('models', ModelController::class);

    // Events (Ramp Walk Events)
    Route::resource('event', EventController::class);

    // Volunteers
    Route::resource('volunteers', VolunteerController::class);

    // Hire Requests
    Route::resource('hireRequests', HireRequestController::class);
    Route::patch('admin/hire-requests/{id}/{status}', [HireRequestController::class, 'updateStatus'])->name('hireRequests.updateStatus');

    // Ramp Walk Applications
    Route::resource('ramp-applications', RampWalkApplicationController::class);

    Route::post('/ramp-applications/{id}/approve', [RampwalkApplicationController::class, 'approve'])->name('ramp-applications.approve');
    Route::post('/ramp-applications/{id}/reject', [RampwalkApplicationController::class, 'reject'])->name('ramp-applications.reject');

    Route::resource('bookings', PhotoShootBookingController::class);

    Route::resource('orders', OrderController::class);

    Route::resource('influencers', InfluencerController::class);
    Route::resource('stories', StoryContestController::class);


    Route::resource('packages', PackageController::class);

    // Sponsership Management
    Route::resource('sponsership', SponsorshipController::class);

    // Role Management
    Route::resource('role', RoleController::class);

    // User  Management
    Route::resource('user', UserController::class);


    // Payments
    Route::resource('payments', PaymentController::class);

    Route::resource('gallery', GalleryController::class);


    Route::resource('subscribers', SubscribeController::class);

    Route::get('/admin/profile', [AuthControler::class, 'edit'])->name('admin.profile.edit');
    Route::put('/admin/profile', [AuthControler::class, 'update'])->name('admin.profile.update');

    Route::put('/admin/profile/password', [AuthControler::class, 'updatePassword'])->name('admin.profile.password.update');

    //Size
    Route::resource('sizes', SizeController::class);

    //Color
    Route::resource('colors', ColorController::class);
    // Products
    Route::resource('products', ProductController::class);

    Route::resource('milestone', MilestoneController::class);

    Route::get('/onboard-participants/{id}', [VoteImageController::class, 'onboardParticipantsImage'])->name('onboard-participants');
});
