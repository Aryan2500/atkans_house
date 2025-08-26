<?php

use App\Http\Controllers\BooksController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\StandardController;
use App\Http\Controllers\SubjectController;
use App\Service\FirebaseAuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/auth/firebase', function (Request $request, FirebaseAuthService $firebaseService) {
    $idToken = $request->bearerToken(); // or $request->input('token')
    // dd($idToken);

    $verifiedToken = $firebaseService->verifyIdToken($idToken);

    // dd($verifiedToken);
    if (!$verifiedToken) {
        return response()->json(['error' => 'Invalid token'], 401);
    }

    $firebaseUid = $verifiedToken->claims()->get('sub');

    // Find or create user in your local DB
    Log:
    info($firebaseUid);
    $user = \App\Models\User::firstOrCreate(
        ['firebase_uid' => $firebaseUid],
        ['email' => $verifiedToken->claims()->get('email')]
    );

    // Generate Laravel Sanctum token
    $token = $user->createToken('firebase-token')->plainTextToken;

    return response()->json([
        'token' => $token,
        'user' => $user,
    ]);
});


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
