<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\UserActionLog;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class LogUserAction
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        if (Auth::check()) {
            $user = Auth::user();
            UserActionLog::create([
                'user_id' => $user->id,
                'action' => $request->path(),
                'details' => json_encode($request->all())
            ]);
        }

        return $response;
    }
}
