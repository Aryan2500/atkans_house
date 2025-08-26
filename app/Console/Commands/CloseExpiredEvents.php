<?php

namespace App\Console\Commands;

use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Console\Command;

class CloseExpiredEvents extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'events:close-expired';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Mark events as closed if their end_date has passed';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $now = Carbon::now();

        // Find all active events where end_date < now
        $expiredEvents = Event::where('end_date', '<', $now)
            ->where('event_stage', '!=', 'closed')
            ->get();

        if ($expiredEvents->isEmpty()) {
            return;
        }

        foreach ($expiredEvents as $event) {
            $event->event_stage = 'closed';
            $event->save();
        }
    }
}
