<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Produtor\ProdutorController;
use App\Http\Controllers\Api\Propriedade\PropriedadeController;
use Illuminate\Support\Facades\Route;


Route::post('/login', [AuthController::class, 'auth']);

Route::middleware(['auth:sanctum'])->group(function(){
    //Rotas de Produtor
    Route::get('/produtor', [ProdutorController::class, 'index']);
    Route::get('/produtor/{produtor}', [ProdutorController::class, 'show']);
    Route::post('/produtor', [ProdutorController::class, 'store']);

    //Rotas de Propriedade
    Route::get('/propriedade', [PropriedadeController::class, 'index']);
    Route::get('/propriedade/{propriedade}', [PropriedadeController::class, 'show']);
    Route::post('/propriedade', [PropriedadeController::class, 'store']);

    //Rota de Logout
    Route::post('/logout', [AuthController::class, 'logout']);
});

