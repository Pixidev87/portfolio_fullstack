<?php

use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

# -----------PUBLIC API (REACT)-----------

    // A Routok igy néznek ki: http://localhost:8000/api/v1/projects
Route::prefix('v1')->group(function () {
    Route::get('/projects', [ProjectController::class, 'index']);
    Route::get('/projects/{project:slug}', [ProjectController::class, 'show']);
    # Az üzenetek küldése limitálva van, hogy ne lehessen spamelni a backend-et (3 üzenet 1 percenként)
    Route::post('/messages', [MessageController::class, 'store'])->middleware('throttle:3,1');
});

# -----------ADMIN API-----------

    // A Routok igy néznek ki: http://localhost:8000/api/admin/v1/messages
Route::prefix('admin')->middleware('auth:sanctum')->group(function () {
    Route::prefix('v1')->group(function () {
        Route::get('/messages', [MessageController::class, 'index']);
        Route::patch('/messages/{message}', [MessageController::class, 'update']);
        Route::post('/projects', [ProjectController::class, 'store']);
    });
});
