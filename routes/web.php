<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('app');
})->name('home');

Route::post('/tasks', [TaskController::class, 'index'])->name('tasks.index');
Route::post('/task/create', [TaskController::class, 'store'])->name('task.store');
