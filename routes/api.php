<?php

use App\Http\Controllers\V1\OptionController;
use App\Http\Controllers\V1\TelegramLinkController;
use App\Http\Controllers\V1\UserController;
use App\Http\Controllers\V1\UserProfileController;
use App\Http\Controllers\V1\UserWeeklyAttachmentController;
use App\Http\Controllers\V1\UserWeeklyAttachmentDetailController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('v1')->group(function() {
    Route::post('/users-registration', [UserController::class, 'store']);
});

Route::middleware(['auth:api', 'user'])->prefix('v1')->group(function() {
    Route::apiResource('/users', UserController::class);
    Route::apiResource('/user-profiles', UserProfileController::class);
    Route::apiResource('/user-weekly-attachments', UserWeeklyAttachmentController::class);
    Route::apiResource('/user-weekly-attachment-details', UserWeeklyAttachmentDetailController::class);
});

Route::middleware(['auth:api', 'admin'])->prefix('v1')->group(function() {
    Route::apiResource('/options', OptionController::class);
    Route::patch('option-update-value-by-name', [OptionController::class, 'updateValueByName']);
    Route::apiResource('/telegram-links', TelegramLinkController::class);
});