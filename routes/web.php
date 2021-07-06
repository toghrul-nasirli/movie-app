<?php

use App\Http\Controllers\Web\MovieController;
use App\Http\Controllers\Web\PersonController;
use App\Http\Controllers\Web\TVShowController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/movies');

Route::get('/movies', [MovieController::class, 'index'])->name('movies.index');
Route::get('/movies/{id}', [MovieController::class, 'show'])->name('movies.show');

Route::get('/tv-shows', [TVShowController::class, 'index'])->name('tv-shows.index');
Route::get('/tv-shows/{id}', [TVShowController::class, 'show'])->name('tv-shows.show');

Route::get('/people/page/{page?}', [PersonController::class, 'index'])->name('people.index');
Route::get('/people/{id}', [PersonController::class, 'show'])->name('people.show');
