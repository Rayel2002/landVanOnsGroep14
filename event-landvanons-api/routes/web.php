<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/home', [EventController::class, 'show'])->name('event.show');
Route::get('', [EventController::class, 'show'])->name('event.show');
Route::get('admin', [AdminController::class, 'show'])->name('admin')->middleware('auth');
Route::get('admin/event/create', [EventController::class, 'create'])->name('event.create')->middleware('auth');
Route::get('event/show', [EventController::class, 'show'])->name('event.show');
Route::post('event/filter', [EventController::class, 'filter_event'])->name('event.filter');
Route::post('admin/event/store', [EventController::class, 'store'])->name('event.store');
Route::get('event/index/{event_name}', [EventController::class, 'index'])->name('event.index');
Auth::routes();
