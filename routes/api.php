<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\CadastroRural\CadastroRuralController;
use App\Http\Controllers\Api\Produtor\ProdutorController;
use App\Http\Controllers\Api\Propriedade\PropriedadeController;
use Illuminate\Support\Facades\Route;

//https://laravel.com/docs/10.x/controllers

//Rotas de login e registro
Route::post('/login', [AuthController::class, 'auth']);
Route::post('/registrar', [AuthController::class, 'store']);

Route::middleware(['auth:sanctum'])->group(function(){
    //Rotas de Produtor
    Route::get('/produtor', [ProdutorController::class, 'index']);
    Route::get('/produtor/{produtor}', [ProdutorController::class, 'show']);
    Route::post('/produtor', [ProdutorController::class, 'store']);

    //Rotas de Propriedade
    Route::get('/propriedade', [PropriedadeController::class, 'index']);
    Route::get('/propriedade/{propriedade}', [PropriedadeController::class, 'show']);
    Route::post('/propriedade', [PropriedadeController::class, 'store']);

    //Rotas de Cadastro Rural
    Route::get('/cadastrorural', [CadastroRuralController::class, 'index']);
    Route::get('/cadastrorural/produtor/{produtor}', [CadastroRuralController::class, 'showProdutor']);
    Route::get('/cadastrorural/propriedade/{propriedade}', [CadastroRuralController::class, 'showPropriedade']);
    Route::post('/cadastrorural', [CadastroRuralController::class, 'store']);

    //Rota de Logout
    Route::post('/logout', [AuthController::class, 'logout']);
});

