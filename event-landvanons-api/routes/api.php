<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\EventApiController;
use App\Http\Controllers\UserController;

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

Route::middleware('auth:sanctum')->get('/users', function (Request $request) {
    return $request->user();
});

//Route::apiResource('events', [EventApiController::class]);
Route::get('/events',  [EventApiController::class, 'show_events']);
Route::get('/event/{id}',  [EventApiController::class, 'get_event']);
Route::put('/events/{id}', [EventApiController::class, 'create_event']);

