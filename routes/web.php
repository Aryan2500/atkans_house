<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HireRequestController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfluencerController;
use App\Http\Controllers\ModelController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PhotoShootBookingController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RampWalkApplicationController;
use App\Http\Controllers\RampwalkController;
use App\Http\Controllers\SponsorshipController;
use App\Http\Controllers\StoryContestController;
use App\Http\Controllers\SubscribeController;
use App\Models\Payment;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/about', function () {
    return view('public.about');
})->name('about');

Route::get('/photoshoot', [PhotoShootBookingController::class, 'public_index'])->name('photoshoot');
Route::post('/photoshoot-booking', [PhotoShootBookingController::class, 'store'])->name('photoshoot.booking');

Route::post('/hireRequest', [HireRequestController::class, 'store'])->name('hireRequest.store');

Route::get('/models', [ModelController::class, 'public_index'])->name('models');

Route::get('/profile/{id}', [ModelController::class, 'public_show'])->name('profile');

Route::get('/rampwalk', [RampWalkApplicationController::class, 'public_index'])->name('rampwalk');

Route::post('/rampwalk-register', [RampWalkApplicationController::class, 'store'])->name('rampwalk.store');

Route::get('/events', [EventController::class, 'public_index'])->name('events');

Route::get('/event-details/{id}', [EventController::class, 'public_show'])->name('event.details');

Route::get('/gallery', [GalleryController::class, 'public_index'])->name('gallery');

Route::get('/sponsorship', [SponsorshipController::class, 'public_index'])->name('sponsorship');

Route::post('/sponsorship', [SponsorshipController::class, 'store'])->name('sponsorship.store');

Route::resource('contact', ContactController::class);

Route::get('/products', [ProductController::class, 'public_index'])->name('products');

Route::get('/product-details/{product}', [ProductController::class, 'public_show'])->name('product.details');

Route::resource('subscriber', SubscribeController::class);

Route::middleware('auth')->group(function () {
    Route::get('/checkout', [OrderController::class, 'create'])->name('checkout');
    Route::post('/checkout', [OrderController::class, 'store'])->name('checkout.store');
    Route::post('/order/create', [OrderController::class, 'store'])->name('order.store');
});

// Route::get('/order/update/payment-status/{order}', [PaymentController::class, 'updatePaymentStatus'])->name('order.update.payment-status');


Route::get('/create-order/{order}', [PaymentController::class, 'createOrder'])->name('razorpay.create');
Route::post('/payment-verify', [PaymentController::class, 'verify'])->name('razorpay.verify');



Route::get('/story-contest', [StoryContestController::class, 'create'])->name('story.contest');
Route::post('/story-contest', [StoryContestController::class, 'store'])->name('story.store');

Route::get('/thank-you', function () {
    return view('public.thankyou');
})->name('thankyou');

Route::get('/sponsor-thank-you', function () {
    return view('public.sponsor-thankyou');
})->name('sponsor.thankyou');

// Public user form
Route::get('/become-sponsor', [InfluencerController::class, 'create'])->name('become.sponsor');
Route::post('/become-sponsor', [InfluencerController::class, 'store'])->name('become.sponsor.store');

Route::get('/order-confirm', function () {
    return view('public.order-confirm');
})->name('order.confirm');
