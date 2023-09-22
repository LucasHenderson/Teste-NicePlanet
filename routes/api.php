<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\TesteController;
use Illuminate\Support\Facades\Route;


Route::post('/login', [AuthController::class, 'auth']);

Route::middleware(['auth:sanctum'])->group(function(){
    Route::get('/teste', [TesteController::class, 'teste']);
    Route::post('/logout', [AuthController::class, 'logout']);
});

