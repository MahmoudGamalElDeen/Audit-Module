<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\UserActionLog;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Log the registration
        // $this->logAction($user->id, 'register');

        return response()->json(['message' => 'User registered successfully'], 201);
    }




    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (!Auth::attempt($credentials)) {
            return response()->json(['message' => 'Invalid login credentials'], 401);
        }

        $user = Auth::user();

        // Log the login
        // $this->logAction($user->id, 'login');

        return response()->json([
            'message' => 'User logged in successfully',
            'token' => $user->createToken('auth_token')->plainTextToken,
        ]);
    }



    
    public function logout(Request $request)
    {
        $user = Auth::user();
        $request->user()->currentAccessToken()->delete();

        // Log the logout
        // $this->logAction($user->id, 'logout');

        return response()->json(['message' => 'User logged out successfully']);
    }

    // protected function logAction($userId, $action)
    // {
    //     UserActionLog::create([
    //         'user_id' => $userId,
    //         'action' => $action,
    //         'ip_address' => request()->ip(),
    //         'user_agent' => request()->userAgent(),
    //     ]);
    // }
}
