<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PaymentQrMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */

    public $qrPath;
    public $upiUrl;
    public $amount;
    public $customerName;

    public function __construct($qrPath, $upiUrl, $amount, $customerName = '')
    {
        $this->qrPath = $qrPath;
        $this->upiUrl = $upiUrl;
        $this->amount = $amount;
        $this->customerName = $customerName;
    }

    public function build()
    {
        return $this
            ->subject("Payment Request - ₹{$this->amount}")
            ->view('emails.payment_qr')
            ->attach($this->qrPath, [
                'as' => 'qrcode.png',
                'mime' => 'image/png',
            ]);
    }
}
