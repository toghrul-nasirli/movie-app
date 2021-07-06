<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;

class TVShowViewModel extends ViewModel
{
    public $tvShow;

    public function __construct($tvShow)
    {
        $this->tvShow = $tvShow;
    }

    public function tvShow()
    {
        return collect($this->tvShow)->merge([
            'poster_path' => $this->tvShow['poster_path'] ? 'https://image.tmdb.org/t/p/w500/' . $this->tvShow['poster_path'] : asset('img/no-poster.png'),
            'vote_average' => $this->tvShow['vote_average'] * 10 . '%',
            'first_air_date' => isset($this->tvShow['first_air_date']) ? Carbon::parse($this->tvShow['first_air_date'])->format('M d, Y') : 'Upcoming',
            'genres' => collect($this->tvShow['genres'])->pluck('name')->implode(', '),
            'crew' => collect($this->tvShow['credits']['crew'])->map(
                fn ($crew) => collect($crew)->only(['name', 'job'])
            )->take(2),
            'cast' => collect($this->tvShow['credits']['cast'])->map(
                fn ($cast) => collect($cast)->merge([
                    'profile_path' => $cast['profile_path'] ? 'https://image.tmdb.org/t/p/w300/' . $cast['profile_path'] : asset('img/no-profile-image.png')
                ])->only(['id', 'profile_path', 'name', 'character'])
            )->take(5),
            'images' => collect($this->tvShow['images']['backdrops'])->map(
                fn ($image) => collect($image)->merge([
                    'file_path_w500' => 'https://image.tmdb.org/t/p/w500/' . $image['file_path'],
                    'file_path_original' => 'https://image.tmdb.org/t/p/original/' . $image['file_path'],
                ])->only('file_path_w500', 'file_path_original')
            )->take(9),
            'trailer' => collect($this->tvShow['videos'])->map(
                fn ($video) => $video ? 'https://www.youtube.com/embed/' . $this->tvShow['videos']['results'][0]['key'] : null
            )->first(),
        ])->only(['poster_path', 'name', 'vote_average', 'first_air_date', 'genres', 'overview', 'crew', 'cast', 'trailer', 'images']);
    }
}
