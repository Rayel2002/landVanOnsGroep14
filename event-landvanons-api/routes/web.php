<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/home', [HomeController::class, 'show'])->name('home');
Route::get('', [HomeController::class, 'show'])->name('home');
Route::get('event/create', [EventController::class, 'create'])->name('event.create');
Route::get('event/show', [EventController::class, 'show'])->name('event.show');
Route::post('event/store', [EventController::class, 'store'])->name('event.store');
Route::get('event/index/{event_name}', [EventController::class, 'index'])->name('event.index');
Auth::routes();