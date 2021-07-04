<?php

use App\Http\Controllers\Web\MovieController;
use App\Http\Controllers\Web\PersonController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/movies');
Route::get('/movies', [MovieController::class, 'index'])->name('movies.index');
Route::get('/movies/{id}', [MovieController::class, 'show'])->name('movies.show');

Route::get('/people', [PersonController::class, 'index'])->name('people.index');
Route::get('/people/{id}', [PersonController::class, 'show'])->name('people.show');
