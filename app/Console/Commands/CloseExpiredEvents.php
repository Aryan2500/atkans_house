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
        $expiredEvents = Event::whereDate('end_date', '<=', $now)
            ->where('event_stage', '!=', 'closed')
            ->get();

        $runningEvents = Event::whereDate('start_date', '<=', $now)
            ->whereDate('end_date', '>=', $now)
            ->where('event_stage', '!=', 'running')
            ->orWhere('event_stage', '==', 'published')
            ->get();

        if ($expiredEvents->isEmpty() && $runningEvents->isEmpty()) {
            return;
        }

        foreach ($expiredEvents as $event) {
            $event->event_stage = 'closed';
            $event->save();
        }

        foreach ($runningEvents as $event) {
            $event->event_stage = 'running';
            $event->save();
        }
    }
}
