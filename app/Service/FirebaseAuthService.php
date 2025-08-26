<?php


namespace App\Service;

use Illuminate\Support\Facades\Log;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Auth;

class FirebaseAuthService
{
    protected Auth $auth;

    public function __construct()
    {
        $this->auth = (new Factory)
            ->withServiceAccount(config('firebase.credentials'))
            ->withProjectId('kabiran-d776d')
            ->createAuth();
    }

    public function verifyIdToken(string $idToken)
    {
        try {
            return $this->auth->verifyIdToken($idToken);
        } catch (\Throwable $e) {
            Log::error($e);
            return false;
        }
    }
}
