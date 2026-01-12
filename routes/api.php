<?php

<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> origin/branch-homologation
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
<<<<<<< HEAD
=======
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PasswordResetController;
use App\Http\Controllers\Api\ClientDossierController;
use App\Http\Controllers\Api\EquipementController;
use App\Http\Controllers\Api\AgentController;
use App\Http\Controllers\Api\UserActivityController;

// ---------------- PUBLIC AUTH ROUTES ----------------
Route::prefix('auth')->group(function () {
    Route::post('/login', [LoginController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/forgot-password', [PasswordResetController::class, 'sendResetLink']);
    Route::post('/reset-password', [PasswordResetController::class, 'reset']);
    Route::post('/email/verify/{id}/{hash}', [AuthController::class, 'verifyEmail']);
    Route::post('/email/resend', [AuthController::class, 'resendVerificationEmail']);
    Route::get('/check', [LoginController::class, 'checkAuth']);
});

// ---------------- PUBLIC DASHBOARD STATS ----------------
Route::get('/dossiers/total', [ClientDossierController::class, 'totalDossiers']);
Route::get('/agents/total', [ClientDossierController::class, 'totalAgents']);
Route::get('/equipements/total', [EquipementController::class, 'total']); // Total equipment

// ---------------- PUBLIC DOSSIERS ----------------
Route::get('/dossiers', [ClientDossierController::class, 'index']); // Fetch all dossiers with photos

// ---------------- PUBLIC AGENTS ----------------
Route::get('/agents', [AgentController::class, 'index']);

// ---------------- PUBLIC AGENT ACTIVITIES ----------------
Route::get('/agents/{id}/activities', [UserActivityController::class, 'getActivities']);

// ---------------- PUBLIC EQUIPMENT ----------------
Route::get('/equipements/search', [EquipementController::class, 'search']); // Search by query
Route::get('/equipements', [EquipementController::class, 'index']); // Fetch all equipment

// ---------------- PROTECTED ROUTES (AUTH SANCTUM) ----------------
Route::middleware('auth:sanctum')->group(function () {

    // -------- AUTH PROTECTED --------
    Route::prefix('auth')->group(function () {
        Route::post('/logout', [LoginController::class, 'logout']); // logout tracking included
        Route::post('/refresh', [AuthController::class, 'refresh']); // optional token refresh

        // Profile routes
        Route::get('/profile', [AuthController::class, 'profile']);         // get profile
        Route::put('/profile', [AuthController::class, 'updateProfile']);  // update profile (name, phone, photo)
        Route::put('/change-password', [AuthController::class, 'changePassword']); // change password
    });

    // -------- CLIENT DOSSIER --------
    Route::post('/client-dossier', [ClientDossierController::class, 'store']);
});

// ---------------- HEALTH CHECK ----------------
Route::get('/health', function () {
    try {
        $dbStatus = DB::connection()->getDatabaseName() ? 'connected' : 'not connected';
    } catch (\Exception $e) {
        $dbStatus = 'not connected';
    }

    return response()->json([
        'status' => 'ok',
        'timestamp' => now(),
        'service' => 'ANRTIC API',
        'version' => '1.0.0',
        'database' => $dbStatus,
    ]);
});

// ---------------- FALLBACK ROUTE ----------------
Route::fallback(function () {
    return response()->json(['message' => 'Endpoint not found'], 404);
});
>>>>>>> main
=======
>>>>>>> origin/branch-homologation
