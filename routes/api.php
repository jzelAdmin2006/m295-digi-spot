<?php

use App\Http\Controllers\OrderController;
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

Route::get('/orders', [OrderController::class, 'findAll']);
Route::get('/orders/{id}', [OrderController::class, 'findById']);
Route::post('/orders', [OrderController::class, 'create']);
Route::put('/orders/{id}', [OrderController::class, 'update']);
