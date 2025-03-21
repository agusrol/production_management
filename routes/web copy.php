<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TimeEntryController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
Route::get('/tasks/csv', [TaskController::class, 'exportCSV'])->name('tasks.csv');


Route::get('/time-entries', [TimeEntryController::class, 'index'])->name('time_entries.index');
Route::get('/time-entries/create', [TimeEntryController::class, 'create'])->name('time_entries.create');
Route::post('/time-entries', [TimeEntryController::class, 'store'])->name('time_entries.store');