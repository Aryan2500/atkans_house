<?php

namespace App\Console\Commands;

use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Console\Command;

class DeclareShowWinner extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'shows:declare-winner';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Declare show winner after show end date';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $now = Carbon::now();

        // Find all active events where end_date < now
        $expiredShows = Event::whereDate('end_date', '<=', $now)
            ->where('event_stage', '!=', 'closed')
            ->where('type', 'Show')
            ->get();

        if ($expiredShows->isEmpty()) {
            return;
        }

        foreach ($expiredShows as $event) {
            $event->event_stage = 'closed';
            $event->save();
        }
    }
}
