<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Notification;
use Illuminate\Support\Facades\Log;

class NotificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | LIST NOTIFICATIONS (with pagination & unread count)
    |--------------------------------------------------------------------------
    */
    public function index(Request $request)
    {
        $user = $request->user();
        if (!$user) {
            return response()->json(['message' => 'Unauthenticated'], 401);
        }

        try {
            $notifications = Notification::with([
                'sender:id,first_name,last_name,email'
            ])
            ->where('receiver_id', $user->id)
            ->orderByDesc('created_at')
            ->paginate(20);

            $unreadCount = Notification::where('receiver_id', $user->id)
                ->where('is_read', false)
                ->count();

            return response()->json([
                'notifications' => $notifications,
                'unread_count'  => $unreadCount,
            ], 200);

        } catch (\Exception $e) {
            Log::error('Load notifications failed', [
                'user_id' => $user->id,
                'error'   => $e->getMessage(),
            ]);

            return response()->json([
                'message' => 'Failed to load notifications'
            ], 500);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | SEND NOTIFICATION
    |--------------------------------------------------------------------------
    */
    public function send(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'message'     => 'required|string',
            'receiver_id' => 'nullable|exists:users,id',
        ]);

        $sender = $request->user();
        if (!$sender) {
            return response()->json(['message' => 'Unauthenticated'], 401);
        }

        try {
            // Determine if sender is admin
            $isAdmin = method_exists($sender, 'hasRole')
                ? $sender->hasRole('ADMIN')
                : strtoupper($sender->role ?? '') === 'ADMIN';

            // ---------------- ADMIN → SEND TO ALL AGENTS ----------------
            if ($isAdmin && empty($request->receiver_id)) {
                $agentIds = User::where('role', 'AGENT')->pluck('id');

                if ($agentIds->isEmpty()) {
                    return response()->json([
                        'message' => 'No agents found to send notifications'
                    ], 404);
                }

                $now = now();
                $notifications = $agentIds->map(fn($id) => [
                    'sender_id'   => $sender->id,
                    'receiver_id' => $id,
                    'title'       => $request->title,
                    'message'     => $request->message,
                    'is_read'     => false,
                    'created_at'  => $now,
                    'updated_at'  => $now,
                ])->toArray();

                Notification::insert($notifications);

                return response()->json([
                    'message' => 'Notification sent to all agents'
                ], 201);
            }

            // ---------------- SINGLE RECEIVER ----------------
            if (empty($request->receiver_id)) {
                return response()->json([
                    'message' => 'Receiver ID is required'
                ], 422);
            }

            $notification = Notification::create([
                'sender_id'   => $sender->id,
                'receiver_id' => $request->receiver_id,
                'title'       => $request->title,
                'message'     => $request->message,
                'is_read'     => false,
            ]);

            return response()->json([
                'message' => 'Notification sent',
                'data'    => $notification
            ], 201);

        } catch (\Exception $e) {
            Log::error('Notification send failed', [
                'sender_id' => $sender->id,
                'payload'   => $request->all(),
                'error'     => $e->getMessage(),
            ]);

            return response()->json([
                'message' => 'Failed to send notification'
            ], 500);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | MARK AS READ
    |--------------------------------------------------------------------------
    */
    public function markAsRead(Request $request, $id)
    {
        $user = $request->user();
        if (!$user) return response()->json(['message' => 'Unauthenticated'], 401);

        $notification = Notification::where('id', $id)
            ->where('receiver_id', $user->id)
            ->first();

        if (!$notification) {
            return response()->json(['message' => 'Notification not found'], 404);
        }

        $notification->update(['is_read' => true]);

        return response()->json([
            'message' => 'Notification marked as read',
            'data'    => $notification
        ], 200);
    }

    /*
    |--------------------------------------------------------------------------
    | MARK ALL AS READ
    |--------------------------------------------------------------------------
    */
    public function markAllAsRead(Request $request)
    {
        $user = $request->user();
        if (!$user) return response()->json(['message' => 'Unauthenticated'], 401);

        Notification::where('receiver_id', $user->id)
            ->where('is_read', false)
            ->update(['is_read' => true]);

        return response()->json([
            'message' => 'All notifications marked as read'
        ], 200);
    }

    /*
    |--------------------------------------------------------------------------
    | UNREAD COUNT
    |--------------------------------------------------------------------------
    */
    public function unreadCount(Request $request)
    {
        $user = $request->user();
        if (!$user) return response()->json(['message' => 'Unauthenticated'], 401);

        $count = Notification::where('receiver_id', $user->id)
            ->where('is_read', false)
            ->count();

        return response()->json(['unread_count' => $count]);
    }
}
