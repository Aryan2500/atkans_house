<?php

namespace App\Mail;

use App\Models\Sponsorship;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SponsorshipSubmitted extends Mailable
{
    use Queueable, SerializesModels;

    public $sponsor;

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
        return $this->subject('🎉 New Sponsorship Submission')
            ->markdown('emails.sponsorship.new-sponsorship-admin-side');
    }
}
