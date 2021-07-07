<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;

class PersonViewModel extends ViewModel
{
    public $person, $social, $credits;

    public function __construct($person, $social, $credits)
    {
        $this->person = $person;
        $this->social = $social;
        $this->credits = $credits;
    }

    public function person()
    {
        return collect($this->person)->merge([
            'profile_path' => $this->person['profile_path'] ? 'https://image.tmdb.org/t/p/w300/' . $this->person['profile_path'] : asset('img/no-profile-image-sm.png'),
            'birthday' => Carbon::parse($this->person['birthday'])->format('M d, Y'),
            'age' => Carbon::parse($this->person['birthday'])->age,
        ])->only('biography', 'birthday', 'age', 'deathday', 'gender', 'known_for_department', 'name', 'place_of_birth', 'popularity', 'profile_path', 'homepage');
    }

    public function social()
    {
        return collect($this->social)->merge([
            'facebook' => $this->social['facebook_id'] ? 'https://www.facebook.com/' . $this->social['facebook_id'] : null,
            'instagram' => $this->social['instagram_id'] ? 'https://www.instagram.com/' . $this->social['instagram_id'] : null,
            'twitter' => $this->social['twitter_id'] ? 'https://twitter.com/' . $this->social['instagram_id'] : null,
        ]);
    }

    public function knownForTitles()
    {
        return collect(collect($this->credits)->get('cast'))->sortByDesc('popularity')->map(function ($known_for) {
            if (isset($known_for['title'])) {
                $title = $known_for['title'];
            } elseif (isset($known_for['name'])) {
                $title = $known_for['name'];
            } else {
                $title = 'Untitled';
            }

            return collect($known_for)->merge([
                'poster_path' => $known_for['poster_path'] ? 'https://image.tmdb.org/t/p/w185' . $known_for['poster_path'] : asset('img/no-poster-sm.png'),
                'title' => $title,
                'link' => isset($known_for['title']) ? route('movies.show', $known_for['id']) : route('tv-shows.show', $known_for['id']),
            ])->only('poster_path', 'title', 'link');
        })->take(5);
    }

    public function credits()
    {
        return collect(collect($this->credits)->get('cast'))->map(function ($credit) {
            if (isset($credit['release_date'])) {
                $release_date = $credit['release_date'];
            } elseif (isset($credit['first_air_date'])) {
                $release_date = $credit['first_air_date'];
            } else {
                $release_date = null;
            }

            if (isset($credit['title'])) {
                $title = $credit['title'];
            } elseif (isset($credit['name'])) {
                $title = $credit['name'];
            } else {
                $title = 'Untitled';
            }
            
            return collect($credit)->merge([
                'release_date' => $release_date,
                'release_year' => isset($release_date) ? Carbon::parse($release_date)->format('Y') : 'Upcoming',
                'title' => $title,
                'character' => isset($credit['character']) ? $credit['character'] : '',
            ])->only('id', 'release_date', 'release_year', 'title', 'character');
        })->sortByDesc('release_date');
    }
}
