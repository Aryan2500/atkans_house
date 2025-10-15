<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Event;
use App\Models\User;

class MilestoneMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $event;
    public $subject;
    public $message;

    public $user;


    public function __construct(Event $event, User $user, $subject, $message)
    {
        $this->event = $event;
        $this->subject = $subject;
        $this->message = $message;

        $this->user = $user;
    }

    public function build()
    {
        return $this->subject('Milestone update: ' . $this->subject)
            ->markdown('emails.milestone.milestone')
            ->with(['event' => $this->event, 'user' => $this->user, 'messageBody' => $this->message]);
    }
}
