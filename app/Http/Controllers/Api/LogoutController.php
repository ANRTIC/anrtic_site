<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserActivity;

class LogoutController extends Controller
{
    public function logout(Request $request)
    {
        $user = $request->user();

        UserActivity::create([
            'user_id' => $user->id,
            'type' => 'logout',
            'ip' => $request->ip(),
        ]);

        $user->tokens()->delete();

        return response()->json(['message' => 'LOGOUT_SUCCESS']);
    }
}
