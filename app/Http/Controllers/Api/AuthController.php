<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Get the current authenticated user's profile
     */
    public function profile(Request $request)
    {
        $user = $request->user();

        return response()->json([
            'first_name' => $user->first_name,
            'last_name'  => $user->last_name,
            'email'      => $user->email,
            'phone'      => $user->phone ?? '',
            'photo'      => $user->avatar_url . '?t=' . time(),  // full URL + timestamp to prevent caching
            'role'       => $user->getRoleNames()->first() ?? 'AGENT',
        ]);
    }

    /**
     * Update profile (photo, name, phone)
     */
    public function updateProfile(Request $request)
    {
        $request->validate([
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'first_name' => 'nullable|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:255',
        ]);

        $user = $request->user();

        // Handle photo upload
        if ($request->hasFile('photo')) {
            // Delete old photo if exists
            if ($user->photo) {
                $oldPath = public_path('media/user_profiles/' . $user->photo);
                if (File::exists($oldPath)) {
                    File::delete($oldPath);
                }
            }

            $file = $request->file('photo');
            $filename = time() . '_' . $file->getClientOriginalName();

            $destinationPath = public_path('media/user_profiles');
            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true);
            }

            $file->move($destinationPath, $filename);

            $user->photo = $filename; // store filename in DB
        }

        // Update optional fields
        if ($request->has('first_name')) $user->first_name = $request->first_name;
        if ($request->has('last_name'))  $user->last_name  = $request->last_name;
        if ($request->has('phone'))      $user->phone      = $request->phone;

        $user->save();

        return response()->json([
            'message' => 'Profile updated successfully',
            'photo' => $user->avatar_url . '?t=' . time(),  // return full URL with cache-busting
        ]);
    }

    /**
     * Change password
     */
    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required|string',
            'password'         => 'required|string|min:8|confirmed',
        ]);

        $user = $request->user();

        if (!Hash::check($request->current_password, $user->password)) {
            return response()->json(['message' => 'Current password is incorrect'], 422);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return response()->json(['message' => 'Password changed successfully']);
    }
}
