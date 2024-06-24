<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuditController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->group(function () {
    route::get('user', function () {
        return User::all();
    });
    Route::post('logout', [AuthController::class, 'logout']);
});
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);



Route::middleware('auth:sanctum')->group(function () {
    Route::get('audit/user-logs', [AuditController::class, 'getUserLogs'])->name('api.audit.user_logs');
    Route::get('audit/system-logs', [AuditController::class, 'getSystemLogs'])->name('api.audit.system_logs');
});
