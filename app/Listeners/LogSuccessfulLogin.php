<?php

namespace App\Listeners;

use App\Models\UserActionLog;
use Illuminate\Auth\Events\Login;

class LogSuccessfulLogin
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
    public function handle(Login $event)
    {
        UserActionLog::create([
            'user_id' => $event->user->id,
            'action' => 'login',
            'details' => json_encode(['ip' => request()->ip()])
        ]);
    }
}
