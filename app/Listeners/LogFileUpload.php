<?php

namespace App\Listeners;

use App\Events\FileUploaded;
use App\Models\SystemEventLog;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class LogFileUpload
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
    public function handle(FileUploaded $event)
    {
        SystemEventLog::create([
            'event' => 'file_upload',
            'details' => json_encode($event->details)
        ]);
    }
}
