<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VideoClubController;
use App\Http\Controllers\AuthController;


use App\Models;

// Route::apiResource('videoclubs',App\Http\Controllers\VideoClubController::class);

Route::post('login', [AuthController::class, 'login']);

Route::group(['prefix' => 'video_clubs', 'middleware' => ['auth',]], function ($router){
Route::middleware('role:admin')->group(function () {
    
    Route::get('videoclubs',[videoClubController::class, 'index']);
});

Route::get('videoclubs/{id}', [videoClubController::class, 'show']);
Route::post('videoclubs', [videoClubController::class,'store']);
Route::put('videoclubs/{id}', [videoClubController::class, 'update']);
Route::delete('videoclubs/{id}', [videoClubController::class, 'destroy']);
});

Route::group(['prefix' => 'video_clubs', 'middleware' => ['auth','role:cliente']], function ($router){
    Route::get('videoclubs',[videoClubController::class, 'index']);
    Route::get('videoclubs/{id}', [videoClubController::class, 'show']);
    });