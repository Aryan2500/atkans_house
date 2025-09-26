<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OtpMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $otp;
    public $recipientName;
    /**
     * Create a new message instance.
     */

    public function __construct($otp, $recipientName = null)
    {
        $this->otp = $otp;
        $this->recipientName = $recipientName;
    }

    

    public function build()
    {
        return $this->subject('Your OTP for Verification')
            ->view('emails.emailverificationotp.email-verfication-otp')
            ->with([
                'otp' => $this->otp,
                'recipientName' => $this->recipientName,
            ]);
    }
}
