<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UserActivity;
use Illuminate\Http\Request;

class UserActivityController extends Controller
{
    /**
     * Get activities for a specific user
     * Grouped as 'today' and 'others'
     */
    public function getActivities($userId)
    {
        // Fetch all activities for the user
        $activities = UserActivity::where('user_id', $userId)
            ->orderBy('created_at', 'desc')
            ->get();

        $today = now()->toDateString(); // YYYY-MM-DD

        $grouped = [
            'today' => [],
            'others' => [],
        ];

        foreach ($activities as $activity) {
            $activityData = $activity->toArray(); // convert to array

            if ($activity->created_at->toDateString() === $today) {
                $grouped['today'][] = $activityData;
            } else {
                $grouped['others'][] = $activityData;
            }
        }

        return response()->json($grouped);
    }
}
