<?php

use App\Http\Controllers\ApplicationApiController;
use App\Http\Controllers\ApplicationController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/applications')->group(function () {
    Route::get('/index', [ApplicationApiController::class, 'index']);
    Route::post('/store', [ApplicationApiController::class, 'store']);
    Route::put('/update/{application}', [ApplicationApiController::class, 'update']);
});
