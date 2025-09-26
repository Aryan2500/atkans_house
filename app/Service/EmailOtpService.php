<?php

namespace App\Service;

use App\Mail\OtpMail;
use Illuminate\Support\Facades\Mail;

class EmailOtpService
{

    public function sendOtp($email, $otp)
    {
        try {
            Mail::to($email)->send(new OtpMail($otp));
            return true;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
