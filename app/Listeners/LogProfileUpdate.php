<?php

namespace App\Listeners;

use App\Models\UserActionLog;
use App\Events\ProfileUpdated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class LogProfileUpdate
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
    public function handle(ProfileUpdated $event)
    {
        UserActionLog::create([
            'user_id' => $event->user->id,
            'action' => 'profile_update',
            'details' => json_encode($event->changes)
        ]);
    }
}
