<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserActivity;

class LoginController extends Controller
{
    // ---------------- LOGIN ----------------
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => 'Invalid credentials'
            ], 401);
        }

        $user = Auth::user();

        if (method_exists($user, 'canLogin') && !$user->canLogin()) {
            return response()->json([
                'message' => 'User is blocked or inactive'
            ], 403);
        }

        // Record login activity
        UserActivity::create([
            'user_id' => $user->id,
            'type' => 'login',
            'ip_address' => $request->ip(),       // matches migration
            'user_agent' => $request->userAgent(),
        ]);

        $token = $user->createToken('api-token')->plainTextToken;

        return response()->json([
            'token' => $token,
            'user' => [
                'first_name' => $user->first_name,
                'last_name' => $user->last_name,
                'email' => $user->email,
                'photo' => $user->avatar_url,
                'role' => $user->getRoleNames()->first() ?? 'AGENT',
            ],
            'message' => 'LOGIN_SUCCESS'
        ]);
    }

    // ---------------- LOGOUT ----------------
    public function logout(Request $request)
    {
        $user = $request->user();

        // Record logout activity
        UserActivity::create([
            'user_id' => $user->id,
            'type' => 'logout',
            'ip_address' => $request->ip(),       // matches migration
            'user_agent' => $request->userAgent(),
        ]);

        $user->tokens()->delete();

        return response()->json(['message' => 'LOGOUT_SUCCESS']);
    }
}
