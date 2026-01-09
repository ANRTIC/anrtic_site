<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;

class AgentController extends Controller
{
    public function index()
    {
        // Fetch all users with the 'AGENT' role using Spatie
        $agents = User::role('AGENT')->get();

        $agents = $agents->map(function ($agent) {
            return [
                'id' => $agent->id,
                'first_name' => $agent->first_name,
                'last_name' => $agent->last_name,
                'email' => $agent->email,
                'phone' => $agent->phone, // ← ADD THIS LINE
                'photo' => $agent->photo 
                    ? url('media/user_profiles/'.$agent->photo) 
                    : $agent->avatar_url, // fallback avatar
            ];
        });

        return response()->json($agents);
    }

}
