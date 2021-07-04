<?php

namespace App\ViewModels;

use Spatie\ViewModels\ViewModel;

class PeopleViewModel extends ViewModel
{
    public $popularPeople;

    public function __construct($popularPeople)
    {
        $this->popularPeople = $popularPeople;
    }

    public function popularPeople()
    {
        return collect($this->popularPeople)->map(function ($person) {
            return collect($person)->merge([
                'profile_path' => $person['profile_path'] ? 'https://image.tmdb.org/t/p/w235_and_h235_face/' . $person['profile_path'] : asset('img/no-profile-image-sm.png'),
                'known_for' => collect($person['known_for'])->where('media_type', 'movie')->pluck('title')->union(
                    collect($person['known_for'])->where('media_type', 'tv')->pluck('name')
                )->implode(', '),
            ])->only(['id', 'name', 'profile_path', 'known_for']);
        });
    }
}
