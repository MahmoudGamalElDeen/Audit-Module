<?php

namespace App\Listeners;

use App\Models\SystemEventLog;
use App\Events\SystemEventOccurred;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class LogSystemEvent
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
    public function handle(SystemEventOccurred $event)
{
    SystemEventLog::create([
        'event_details' => $event->eventDetails,
        'created_at' => now(),
    ]);
}
}
