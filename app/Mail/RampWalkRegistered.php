<?php

namespace App\Mail;

use App\Models\Event;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RampWalkRegistered extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $event;


    /**
     * Create a new message instance.
     */
    public function __construct(User $user, Event $event)
    {
        $this->user = $user;
        $this->event = $event;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('🎉 Welcome to Atkan Ramp Walk!')
            ->markdown('emails.rampwalk.registered');
    }
}
