<?php

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

//endpoint
Route::get('/', function(){
    return 'API';
});

//Endpoint készítés

Route::get('/instruments', [ProductController::class, 'index']);
Route::get('/instruments/{id}', [ProductController::class, 'show']);
Route::post('/instruments', [ProductController::class, 'store']);
Route::patch('/instruments/{id}', [ProductController::class, 'update']);
Route::delete('/instruments/{id}', [ProductController::class, 'destroy']);

