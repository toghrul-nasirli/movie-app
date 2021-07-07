<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;

class TVShowsViewModel extends ViewModel
{
    public $popularTVShows, $topRatedTVShows, $genres;

    public function __construct($popularTVShows, $topRatedTVShows, $genres)
    {
        $this->popularTVShows = $popularTVShows;
        $this->topRatedTVShows = $topRatedTVShows;
        $this->genres = $genres;
    }

    public function popularTVShows()
    {
        return $this->formatTVShows($this->popularTVShows);
    }

    public function topRatedTVShows()
    {
        return $this->formatTVShows($this->topRatedTVShows);
    }

    private function genres()
    {
        return collect($this->genres)->mapWithKeys(function ($genre) {
            return [$genre['id'] => $genre['name']];
        });
    }

    private function formatTVShows($tvShow)
    {
        return collect($tvShow)->map(function ($tvShow) {
            $genres = collect($tvShow['genre_ids'])->mapWithKeys(
                fn ($genreId) => [$genreId => $this->genres()->get($genreId)]
            )->implode(', ');

            return collect($tvShow)->merge([
                'poster_path' => $tvShow['poster_path'] ? 'https://image.tmdb.org/t/p/w500/' . $tvShow['poster_path'] : asset('img/no-poster.png'),
                'vote_average' => $tvShow['vote_average'] ? $tvShow['vote_average'] * 10 . '%' : null,
                'first_air_date' => isset($tvShow['first_air_date']) ? Carbon::parse($tvShow['first_air_date'])->format('M d, Y') : 'Upcoming',
                'genres' => $genres,
            ])->only(['id', 'poster_path', 'name', 'vote_average', 'first_air_date', 'genres']);
        });
    }
}
