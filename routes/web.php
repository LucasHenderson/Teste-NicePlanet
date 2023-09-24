<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/semautorizacao',function () {
    return response()->json([
        'message' => "Você deve fazer o login!"
    ], 401);
})->name('semautorizacao');
