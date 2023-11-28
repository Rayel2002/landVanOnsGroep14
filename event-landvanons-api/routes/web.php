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
Route::post('admin/event/store', [EventController::class, 'store'])->name('event.store');
Route::get('event/index/{event_name}', [EventController::class, 'index'])->name('event.index');
Route::get('event/edit/{event_name}',[EventController::class, 'edit'])->name('event.edit')->middleware('auth');
Route::post('event/update/{event_name}', [EventController::class, 'update'])->name('event.update')->middleware('auth');
Route::get('admin/event/adminHome',[EventController::class, 'home'])->name('event.adminHome')->middleware('auth');
Route::get('admin/event/adminform',[EventController::class, 'form'])->name('event.adminform')->middleware('auth');
Route::delete('admin/event/delete/{event_name}', [EventController::class, 'destroy'])->name('event.destroy')->middleware('auth');

Auth::routes();

