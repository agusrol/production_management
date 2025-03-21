<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TimeEntryController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('time_entries', TimeEntryController::class)->only(['create', 'store']);
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
Route::get('/tasks/csv', [TaskController::class, 'exportCSV'])->name('tasks.csv');


Route::get('/time-entries', [TimeEntryController::class, 'index'])->name('time_entries.index');
Route::get('/time-entries/create', [TimeEntryController::class, 'create'])->name('time_entries.create');
Route::post('/time-entries', [TimeEntryController::class, 'store'])->name('time_entries.store');

require __DIR__.'/auth.php';
