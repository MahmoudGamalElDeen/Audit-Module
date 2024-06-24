<?php

namespace App\Listeners;

use App\Models\SystemEventLog;
use App\Events\DatabaseUpdated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class LogDatabaseUpdate
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(DatabaseUpdated $event)
    {
        SystemEventLog::create([
            'event' => 'database_update',
            'details' => json_encode($event->details)
        ]);
    }
}
