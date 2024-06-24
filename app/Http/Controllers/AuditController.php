<?php

namespace App\Http\Controllers;

use App\Models\UserActionLog;
use App\Models\SystemEventLog;
use Illuminate\Http\Request;

class AuditController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function getUserLogs()
    {
        $userLogs = UserActionLog::latest()->paginate(10);
        return response()->json($userLogs);
    }

    public function getSystemLogs()
    {
        $systemLogs = SystemEventLog::latest()->paginate(10);
        return response()->json($systemLogs);
    }
}
