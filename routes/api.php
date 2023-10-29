<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\DoingController;
use App\Http\Controllers\DoneController;
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

//'todo' table
Route::get('/todos', [TodoController::class, 'index']);
Route::get('/todos/{id}', [TodoController::class, 'show']);
Route::post('/todos', [TodoController::class, 'store']);
Route::put('/todos/{id}', [TodoController::class, 'update']);
Route::delete('/todos/{id}', [TodoController::class, 'destroy']);

//'doing' table
Route::get('/doings', [DoingController::class, 'index']);
Route::get('/doings/{id}', [DoingController::class, 'show']);
Route::post('/doings', [DoingController::class, 'store']);
Route::put('/doings/{id}', [DoingController::class, 'update']);
Route::delete('/doings/{id}', [DoingController::class, 'destroy']);

//'done' table
Route::get('/dones', [DoneController::class, 'index']);
Route::get('/dones/{id}', [DoneController::class, 'show']);
Route::post('/dones', [DoneController::class, 'store']);
Route::put('/dones/{id}', [DoneController::class, 'update']);
Route::delete('/dones/{id}', [DoneController::class, 'destroy']);



//////////////////////
Route::post('register', [\App\Http\Controllers\AuthController::class, 'register']);
Route::post('login', [\App\Http\Controllers\AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('user', [\App\Http\Controllers\AuthController::class, 'user']);
    Route::post('logout', [\App\Http\Controllers\AuthController::class, 'logout']);
});

