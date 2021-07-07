<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;

class MoviesViewModel extends ViewModel
{
    public $popularMovies, $nowPlayingMovies, $genres;

    public function __construct($popularMovies, $nowPlayingMovies, $genres)
    {
        $this->popularMovies = $popularMovies;
        $this->nowPlayingMovies = $nowPlayingMovies;
        $this->genres = $genres;
    }

    public function popularMovies()
    {
        return $this->formatMovies($this->popularMovies);
    }

    public function nowPlayingMovies()
    {
        return $this->formatMovies($this->nowPlayingMovies);
    }

    private function genres()
    {
        return collect($this->genres)->mapWithKeys(function ($genre) {
            return [$genre['id'] => $genre['name']];
        });
    }

    private function formatMovies($movies)
    {
        return collect($movies)->map(function ($movie) {
            $genres = collect($movie['genre_ids'])->mapWithKeys(
                fn ($genreId) => [$genreId => $this->genres()->get($genreId)]
            )->implode(', ');

            return collect($movie)->merge([
                'poster_path' => $movie['poster_path'] ? 'https://image.tmdb.org/t/p/w500/' . $movie['poster_path'] : asset('img/no-poster.png'),
                'vote_average' => $movie['vote_average'] ? $movie['vote_average'] * 10 . '%' : null,
                'release_date' => isset($movie['release_date']) ? Carbon::parse($movie['release_date'])->format('M d, Y') : 'Upcoming',
                'genres' => $genres,
            ])->only(['id', 'poster_path', 'title', 'vote_average', 'release_date', 'genres']);
        });
    }
}
