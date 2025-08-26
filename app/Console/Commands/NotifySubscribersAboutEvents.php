<?php

namespace App\Console\Commands;

use App\Mail\EventNotificationMail;
use App\Models\Event;
use App\Models\Subscriber;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class NotifySubscribersAboutEvents extends Command
{
    protected $signature = 'events:notify-subscribers';
    protected $description = 'Send notifications about new events to all subscribers';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $events = Event::where('has_notified', true)->get();

        if ($events->isEmpty()) {
            // $this->info('No new events to notify.');
            return 0;
        }

        $subscribers = Subscriber::all();

        foreach ($events as $event) {
            foreach ($subscribers as $subscriber) {
                Mail::to($subscriber->email)->queue(new EventNotificationMail($event));
            }

            $event->has_notified = false;
            $event->save();

            // $this->info('Notified all subscribers about event: ' . $event->title);
        }

        return 0;
    }
}
