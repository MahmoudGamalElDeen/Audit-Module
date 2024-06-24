<?php

namespace App\Listeners;

use App\Models\SystemEventLog;
use App\Events\ApplicationError;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class LogApplicationError
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
    public function handle(ApplicationError $event)
    {
        SystemEventLog::create([
            'event' => 'application_error',
            'details' => json_encode($event->details)
        ]);
    }
}
