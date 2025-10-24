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

        // 1️⃣ Expired events (end datetime passed)
        $expiredEvents = Event::where('end_date', '<', $now)
            ->where('event_stage', '!=', 'closed')
            ->get();

        // 2️⃣ Running events (current datetime between start and end)
        $runningEvents = Event::where('start_date', '<=', $now)
            ->where('end_date', '>=', $now)
            ->whereNotIn('event_stage', ['running', 'closed'])
            ->get();

        // 3️⃣ Update logic
        if ($expiredEvents->isNotEmpty()) {
            foreach ($expiredEvents as $event) {
                $event->event_stage = 'closed';
                $event->save();
            }
        }

        if ($runningEvents->isNotEmpty()) {
            foreach ($runningEvents as $event) {
                $event->event_stage = 'running';
                $event->save();
            }
        }
    }
}
