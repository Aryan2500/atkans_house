<?php

namespace App\Http\Controllers;

use App\Models\Otp;
use App\Service\EmailOtpService;
use Illuminate\Http\Request;

class OtpController extends Controller
{
    //
    public  $eos;
    public function __construct(EmailOtpService $eos)
    {
        $this->eos = $eos;
    }

    public function sendOtp(Request $request)
    {
        // dd($request);
        $contact = $request->contact;
        $otp = Otp::generate($contact);
        $this->eos->sendOtp($contact, $otp);
        return true;
    }
}
