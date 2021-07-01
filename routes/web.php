<?php

use App\Http\Controllers\Web\MovieController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MovieController::class, 'index'])->name('movies.index');
Route::get('/show', [MovieController::class, 'show'])->name('movies.show');
