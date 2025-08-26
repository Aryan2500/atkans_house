<?php

namespace App\Mail;

use App\Models\Sponsorship;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SponsorshipStatusChanged extends Mailable
{
    use Queueable, SerializesModels;

    public $sponsor;
    public $status;

    /**
     * Create a new message instance.
     */
    public function __construct(Sponsorship $sponsor)
    {
        $this->sponsor = $sponsor;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('📢 Sponsorship Status Updated')
            ->markdown('emails.sponsorship.sponsorship-status-change');
    }
}
