<?php

use App\Http\Controllers\Api\LifehubController;
use App\Http\Controllers\Api\MoodController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResource('lifehub',LifehubController::class);
