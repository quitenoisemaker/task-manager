<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [App\Http\Controllers\ProjectController::class, 'index'])->name('projects.index');
Route::get('projects', [App\Http\Controllers\ProjectController::class, 'show'])->name('projects.show');
Route::resource('tasks', App\Http\Controllers\TaskController::class);
