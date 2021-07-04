<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;

class MovieViewModel extends ViewModel
{
    public $movie;

    public function __construct($movie)
    {
        $this->movie = $movie;
    }

    public function movie()
    {
        return collect($this->movie)->merge([
            'poster_path' => $this->movie['poster_path'] ? 'https://image.tmdb.org/t/p/w500/' . $this->movie['poster_path'] : asset('img/no-poster.png'),
            'vote_average' => $this->movie['vote_average'] * 10 . '%',
            'release_date' => Carbon::parse($this->movie['release_date'])->format('M d, Y'),
            'genres' => collect($this->movie['genres'])->pluck('name')->implode(', '),
            'crew' => collect($this->movie['credits']['crew'])->map(
                fn ($crew) => collect($crew)->only(['name', 'job'])
            )->take(2),
            'cast' => collect($this->movie['credits']['cast'])->map(
                fn ($cast) => collect($cast)->merge([
                    'profile_path' => $cast['profile_path'] ? 'https://image.tmdb.org/t/p/w300/' . $cast['profile_path'] : asset('img/no-profile-image.png')
                ])->only(['profile_path', 'name', 'character'])
            )->take(5),
            'images' => collect($this->movie['images']['backdrops'])->map(
                fn ($image) => collect($image)->merge([
                    'file_path' => 'https://image.tmdb.org/t/p/w500/' . $image['file_path']
                ])->only('file_path')
            )->take(9),
            'trailer' => collect($this->movie['videos'])->map(
                fn ($video) => $video ? 'https://www.youtube.com/embed/' . $this->movie['videos']['results'][0]['key'] : null
            )->first(),
        ])->only(['poster_path', 'title', 'vote_average', 'release_date', 'genres', 'overview', 'crew', 'cast', 'trailer', 'images']);
    }
}
