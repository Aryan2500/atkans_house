<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Event;

class EventNotificationMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $event;

    public function __construct(Event $event)
    {
        $this->event = $event;
    }

    public function build()
    {
        return $this->subject('New Event: ' . $this->event->title)
            ->markdown('emails.events.notification')
            ->with(['event' => $this->event]);
    }
}
