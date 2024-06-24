<?php

namespace App\Services;

use App\Models\UserActionLog;
use App\Models\SystemEventLog;

class AuditService
{
    public static function logUserAction($userId, $action, $details)
    {
        if (config('audit.log_user_actions')) {
            UserActionLog::create([
                'user_id' => $userId,
                'action' => $action,
                'details' => json_encode(self::maskDetails($details))
            ]);
        }
    }

    public static function logSystemEvent($event, $details)
    {
        if (config('audit.log_system_events')) {
            SystemEventLog::create([
                'event' => $event,
                'details' => json_encode(self::maskDetails($details))
            ]);
        }
    }

    private static function maskDetails($details)
    {
        $maskedDetails = $details;
        foreach (config('audit.mask_fields') as $field) {
            if (isset($maskedDetails[$field])) {
                $maskedDetails[$field] = '*****';
            }
        }
        return $maskedDetails;
    }
}
