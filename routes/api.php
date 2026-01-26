<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PasswordResetController;
use App\Http\Controllers\Api\ClientDossierController;
use App\Http\Controllers\Api\EquipementController;
use App\Http\Controllers\Api\AgentController;
use App\Http\Controllers\Api\UserActivityController;
use App\Http\Controllers\Api\NotificationController;

/*
|--------------------------------------------------------------------------
| PUBLIC AUTH ROUTES
|--------------------------------------------------------------------------
*/
Route::prefix('auth')->group(function () {
    Route::post('/login', [LoginController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/forgot-password', [PasswordResetController::class, 'sendResetLink']);
    Route::post('/reset-password', [PasswordResetController::class, 'reset']);
    Route::post('/email/verify/{id}/{hash}', [AuthController::class, 'verifyEmail']);
    Route::post('/email/resend', [AuthController::class, 'resendVerificationEmail']);
});

/*
|--------------------------------------------------------------------------
| PUBLIC DASHBOARD STATS
|--------------------------------------------------------------------------
*/
Route::get('/dossiers/total', [ClientDossierController::class, 'totalDossiers']);
Route::get('/agents/total', [ClientDossierController::class, 'totalAgents']);
Route::get('/equipements/total', [EquipementController::class, 'total']);

/*
|--------------------------------------------------------------------------
| PUBLIC DATA ROUTES
|--------------------------------------------------------------------------
*/
Route::get('/dossiers', [ClientDossierController::class, 'index']);
Route::get('/agents', [AgentController::class, 'index']);
Route::get('/agents/{id}/activities', [UserActivityController::class, 'getActivities']);
Route::get('/equipements/search', [EquipementController::class, 'search']);
Route::get('/equipements', [EquipementController::class, 'index']);

/*
|--------------------------------------------------------------------------
| PROTECTED ROUTES (SANCTUM TOKEN)
|--------------------------------------------------------------------------
*/
Route::middleware('auth:sanctum')->group(function () {

    /*
    |---------------- AUTH (PROTECTED) ----------------
    */
    Route::prefix('auth')->group(function () {
        Route::post('/logout', [LoginController::class, 'logout']);
        Route::post('/refresh', [AuthController::class, 'refresh']);
        Route::get('/check', [LoginController::class, 'checkAuth']);
        Route::get('/profile', [AuthController::class, 'profile']);
        Route::put('/profile', [AuthController::class, 'updateProfile']);
        Route::put('/change-password', [AuthController::class, 'changePassword']);
    });

    /*
    |---------------- CLIENT DOSSIER ----------------
    */
    Route::post('/client-dossier', [ClientDossierController::class, 'store']);

});

/*
|--------------------------------------------------------------------------
| HEALTH CHECK
|--------------------------------------------------------------------------
*/
Route::get('/health', function () {
    try {
        DB::connection()->getPdo();
        $dbStatus = 'connected';
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

/*
|--------------------------------------------------------------------------
| FALLBACK
|--------------------------------------------------------------------------
*/
Route::fallback(function () {
    return response()->json([
        'message' => 'Endpoint not found'
    ], 404);
});
