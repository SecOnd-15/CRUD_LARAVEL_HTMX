<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::get('/dashboard', [EventController::class, 'dashboard'])->name('dashboard');


Route::middleware('auth')->group(function () {
Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('events.destroy');

    Route::resource('events', EventController::class)
    ->only(['index','create','store','edit','update','destroy']);
});

require __DIR__.'/auth.php';
